<?php
namespace App\Controllers;

use App\Models\Product;
use App\Models\CountryRegion;
use App\Models\Discont;
use App\Helpers\Cart;

class CartController extends AdminController
{
    public function add($prod_id)
    {
        // dd($prod_id);
        $cart = new Cart;
        $cart->add($prod_id);
        $this->back();
    }

    public function delete($prod_id)
    {
        $cart = new Cart;
        $cart->deleteProduct($prod_id);
        $this->back();
    }

    public function clearCart()
    {
        $cart = new Cart;
        $cart->clear();
        $this->redirect();
    }

    public function update()
    {
        $cart = new Cart;
        $cart->update($_POST);
        $this->back();
    }

    public function getShipping($state_id)
    {
        $state = CountryRegion::findOne($state_id);
        // dd($state);
        $_SESSION["shipping"] = $state->price;
        $this->redirect("main/cart/".$state->country_id."/".$state->id);
    }

    public function getDiscont()
    {
        if($_POST["code"]){
            $_SESSION["discont"] = $_POST["code"];
        }
        $this->back();
    }

    
}