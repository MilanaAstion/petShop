<?php

namespace App\Models;

class ProductImage extends Model
{
    public static function getTable()
    {
        return "product_images";
    }

    public static function get($prod_id)
    {
        return \ORM::forTable(self::getTable())->where('prod_id', $prod_id)->findMany();
    }

    public static function add($file_name, $prod_id)
    {
        $img = \ORM::forTable(self::getTable())->create();
        $img->prod_id = $prod_id;
        $img->image = $file_name;
        return $img->save();
    }

    public static function deleteAll($images)
    {
        foreach($images as $image){
            parent::delete($image->id);
        }
    }

    public static function getAll($products)
    {
        foreach($products as $product){
            $product->images = self::get($product->id);
        }
        return $products;
    }
}