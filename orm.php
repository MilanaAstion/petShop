<?php
include "vendor/autoload.php";

ORM::configure('mysql:host=localhost;dbname=recipes');
ORM::configure('username', 'root');
ORM::configure('password', '');

// $recipe = ORM::forTable('recipes')->where('id', '2')->findOne();
// $recipe = ORM::forTable('recipes')->findOne(2);
// $recipes = ORM::for_table('recipes')->find_many();
// $recipes = ORM::for_table('recipes')->where(['id'=> '2', 'name' => "kvs"])->find_many();

// $recipe = ORM::for_table('recipes')->create();
// $recipe->name = 'Joe Bloggs';
// $recipe->desc = 'mcbkfgvkbf';
// $recipe->img = '1img.png';
// $recipe->cook = 10;
// $recipe->price = 200;
// $recipe->weight =400;

// $recipe = ORM::for_table('recipes')->findOne(17);
// $recipe->name = 'gggggggdf';
// $count = ORM::for_table('recipes')->count();
// $res = $recipe->save();
// $res = $recipe->delete();
// $id = $recipe->id();

dd($count);
