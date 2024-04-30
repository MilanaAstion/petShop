<?php

namespace App\Models;

class Category extends Model
{
    const PARENT_ID_MAIN_CAT = 0;

    public static function getTable()
    {
        return "categories";
    }

    public static function findAll() 
    {
        $table = self::getTable();
        $cats = \ORM::forTable($table)->where('parent_id', self::PARENT_ID_MAIN_CAT)->findMany();
        foreach($cats as $cat){
            $cat->sub = \ORM::forTable($table)->where('parent_id', $cat->id)->findMany();
        }
        return $cats;
    }

    public static function findOne($id)
    {
        $cat = parent::findOne($id);
        if($cat->parent_id){
            $cat->parent = \ORM::forTable(self::getTable())->findOne($cat->parent_id);
            $cat->parent->sub = \ORM::forTable(self::getTable())->where('parent_id', $cat->parent_id)->findMany();
        }
        else{
            $cat->sub = \ORM::forTable(self::getTable())->where('parent_id', $cat->id)->findMany();
        }
        return $cat;
    }

    public static function add($data)
    {
        $cat = \ORM::for_table(self::getTable())->create();
        $cat->name = $data['name'];
        $cat->parent_id = $data['parent_id'];
        return $cat->save();
    }

    public static function edit($data)
    {
        $cat = parent::findOne($data["id"]);
        $cat->name = $data['name'];
        return $cat->save();
    }

    public static function getAll($products)
    {
        foreach($products as $product){
            $product->cat = self::findOne($product->cat_id);
        }
        return $products;
    }
}