<?php

namespace App\Models;
use App\Models\ProductImage;

class Product extends Model
{
    public static function getTable()
    {
        return "products";
    }

    public static function findAll() 
    {
        $products = parent::findAll();
        foreach($products as $product){
            $product->images = ProductImage::get($product->id);
            $product->cat = Category::findOne($product->cat_id);
        }
        return $products;
    }

    public static function findOne($id)
    {
        $product = parent::findOne($id);
        $product->images = ProductImage::get($product->id);
        $product->cat = Category::findOne($product->cat_id);
        return $product;
    } 

    public static function getForCategory($cat_id)
    {
        $products = \ORM::forTable(self::getTable())->where('cat_id', $cat_id)->findMany();
        foreach($products as $product){
            $product->images = ProductImage::get($product->id);
        }
        return $products;
    }

    public static function add($params){
        $product = \ORM::forTable(self::getTable())->create();
        $product->name = $params['name'];
        $product->price = $params['price'];
        $product->cat_id = $params['cat_id'];
        $product->descr = $params['descr'];
        $product->save();
        return $product->id();
    }

    public static function edit($params){
        $product = \ORM::forTable(self::getTable())->findOne($params["id"]);
        $product->name = $params['name'];
        $product = self::setPrice($params, $product);
        $product->cat_id = $params['cat_id'];
        $product->descr = $params['descr'];
        return $product->save();
    }

    public static function setPrice($params, $product)
    {
        
        if($params['old_price']){
            $product->price = $params['price'];
            $product->old_price = $params['old_price'];
        }
        else if($params['price'] < $product->price){

            $product->old_price = $product->price;
            $product->price = $params['price'];
            
        }
        else{
            $product->price = $params['price'];
        }
        return $product;
    }

    public static function countRating($comments)
    {
        $summ_rating = 0;
        foreach($comments as $comment){
            $summ_rating += intval($comment->rating);
        }
        $rating = $summ_rating / count($comments);
        return round($rating);
    }
}