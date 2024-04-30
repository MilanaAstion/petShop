<?php

// include "app/controllers/MainController.php";
include "vendor/autoload.php";
App\Models\Model::connect();
session_start();
include "rote.php";
// use App\Controllers\MainController;

// $controller = new MainController;
// $controller->index();

// use Pecee\SimpleRouter\SimpleRouter;
/* this will render the index */
// SimpleRouter::get('/', 'MainController@index');
// SimpleRouter::get('/contact', 'MainController@contact');
// namespace
// SimpleRouter::setDefaultNamespace('App\Controllers');
// Start the routing
// SimpleRouter::start();