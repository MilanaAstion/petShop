<?php

namespace App\Models;

class BestProduct extends Model
{

    public static function getTable()
    {
        return "best";
    }

    public static function get()
    {
        $best = self::findAll()[0];
        $best->product = Product::findOne($best->prod_id);
        return $best;
    }

    public static function edit($params, $file_name)
    {
        $best = self::findAll()[0];
        $best->time = $params['time'];
        $best->descr = $params['descr'];
        if($file_name){
            $best->img = $file_name;
        }
        return $best->save();
    }

    public static function add($params, $file_name)
    {
        $best = self::table()->create();
        $best->time = $params['time'];
        $best->descr = $params['descr'];
        $best->prod_id = $params['prod_id'];
        if($file_name){
            $best->img = $file_name;
        }
        return $best->save();
    }

    public static function deleteRow()
    {
        $best = BestProduct::findAll()[0];
        if($best){
            $best->delete();
        }
    }
}