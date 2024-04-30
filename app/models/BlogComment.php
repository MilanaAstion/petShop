<?php

namespace App\Models;

class BlogComment extends Model
{

    const CHECKED = 1;
    const NOT_CHECKED = 0;

    public static function getTable()
    {
        return "blog_comment";
    }

    public static function getNameState($state)
    {
        if($state == self::CHECKED)  return "проверено";
        return "не проверено";
    }
}