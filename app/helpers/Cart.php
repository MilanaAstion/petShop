<?php
namespace App\Helpers;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Discont;

class Cart
{
    public function add($prod_id)
    {
        if(array_key_exists($prod_id, $_SESSION["cart"])){
            $_SESSION["cart"][$prod_id]++;
        }
        else{
            $_SESSION["cart"][$prod_id] = 1;
        }
    }

    public function getProducts()
    {
        if(empty($_SESSION["cart"])) return false;
        foreach($_SESSION["cart"] as $prod_id => $qty){
            $product = Product::findOne($prod_id);
            $product->photo = ProductImage::get($prod_id)[0];
            $product->qty = $qty;
            $product->total_price = $qty * $product->price;
            $products[] = $product;
        }
        return $products;
    }

    public function calcTotalQty()
    {
        $count = 0;
        if($_SESSION["cart"]){
            foreach($_SESSION["cart"] as $qty){
                $count += $qty;
            }
        }
        return $count;
    }

    public function calcTotalPrice($products)
    {
        $price = 0;
        if($products){
            foreach($products as $product){
                $price += $product->total_price;
            }
        }
        return $price;
    }

    public function deleteProduct($prod_id)
    {
        if($_SESSION["cart"]){
            unset($_SESSION["cart"][$prod_id]);
        }
    }

    public function clear()
    {
        unset($_SESSION["cart"]);
    }

    public function update($data)
    {
        foreach($data as $prod_id => $qty){
            if($_SESSION["cart"][$prod_id]){
                $_SESSION["cart"][$prod_id] = $qty;
            }
        }
    }

    public function calcDiscont($code, $totalPrice)
    {
        $discont = Discont::table()->where("code", $code)->findOne();
        if(empty($discont)){
           return false;
        }
        $date_now = time();
        $date_end = strtotime($discont->date);
        if($date_now > $date_end){
            return false;
        }
        return ($totalPrice * $discont->value) / 100;
    }
}