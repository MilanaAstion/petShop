<?php

namespace App\Models;


class ProductComment extends Model
{
    public static function getTable()
    {
        return "products_comments";
    }
}