<?php

namespace App\Models;

class Model
{
    public static function findOne($id) 
    {
        $table = static::getTable();
        return \ORM::forTable($table)->findOne($id);
    }
    
    public static function findAll() 
    {
        $table = static::getTable();
        return \ORM::forTable($table)->findMany();
    }

    public static function connect()
    {
        \ORM::configure('mysql:host=localhost;dbname=marten');
        \ORM::configure('username', 'root');
        \ORM::configure('password', '');
    }

    public static function delete($id){
        $table = static::getTable();
        $obj = \ORM::for_table($table)->find_one($id);
        return $obj->delete();
    }

    public static function table() 
    {
        $table = static::getTable();
        return \ORM::forTable($table);
    }
}