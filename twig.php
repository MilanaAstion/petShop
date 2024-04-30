<?php
include "vendor/autoload.php";

$loader = new \Twig\Loader\FilesystemLoader('app/views');
$twig = new \Twig\Environment($loader);
$user = ["name"=>"jfjfj", "age"=>"23"];
$numbers = [4,5,6,7];

echo $twig->render('index.html', ["user"=>$user, "nums"=>$numbers]);