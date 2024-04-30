<?php
namespace App\Core;

class View 
{
    public static function render($template, $data, $layout)
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/views');
        $twig = new \Twig\Environment($loader);
        include 'app/views/layouts/' . $layout. '.php';
    }
}