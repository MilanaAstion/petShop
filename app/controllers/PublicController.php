<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\Category;
use App\Helpers\Cart;

class PublicController extends BaseController
{
    public $layout = "main_layout";
    public $namePage;

    public function render($template, $data = [])
    {
        $data["cats"] = Category::findAll();
        $data["cart"] = $this->getDataCart();
        $data["namePage"] = $this->namePage;
        // dump($template);
        View::render($template, $data, $this->layout);
    }

   public function getDataCart()
   {
        if(empty($_SESSION["cart"])) return false;
        $cart = new Cart;
        $data["products"] = $cart->getProducts();
        $data["total_qty"] = $cart->calcTotalQty();
        $data["total_price"] = $cart->calcTotalPrice($data["products"]);
        if($_SESSION["discont"]){
            $discont = $cart->calcDiscont($_SESSION["discont"], $data["total_price"]);
            if($discont){
                $data["total_price"] = $data["total_price"] - $discont;
            }
        }
        if($_SESSION["shipping"]){
            $data["shipping"] = $_SESSION["shipping"];
            $data["grand_price"] = $data["total_price"] + $data["shipping"];
        }
        return $data;
   }


}