<?php

namespace App\Models;

class Blog extends Model
{

    public static function getTable()
    {
        return "blogs";
    }

    public static function update($data)
    {
        $blog = self::findOne($data["id"]);
        unset($data["id"]);
        return $blog->set($data)->save();
    }
}