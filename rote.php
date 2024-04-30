<?php

// include "app/controllers/MainController.php";
// include "vendor/autoload.php";

// use App\Controllers\MainController;

// $controller = new MainController;
// $controller->index();

use Pecee\SimpleRouter\SimpleRouter;
/* this will render the index */

SimpleRouter::get('/contact/{id}', 'MainController@contact');
// SimpleRouter::get('/product', 'MainController@product');
SimpleRouter::get('/product/{id}', 'MainController@product');
SimpleRouter::get('/shop/{cat_id}', 'MainController@shop');
SimpleRouter::get('/', 'MainController@index');
SimpleRouter::get('/main/cart/{country_id?}/{state_id?}', 'MainController@cart');
SimpleRouter::post('/rating/add', 'MainController@addRating');
// search
SimpleRouter::post('/search', 'MainController@search');
// cart
SimpleRouter::get('/cart/add/{prod_id}', 'CartController@add');
SimpleRouter::get('/cart/delete/{prod_id}', 'CartController@delete');
SimpleRouter::get('/cart/clear', 'CartController@clearCart');
SimpleRouter::get('/cart/shipping/{state_id}', 'CartController@getShipping');
SimpleRouter::post('/cart/update', 'CartController@update');
SimpleRouter::post('/cart/discont', 'CartController@getDiscont');

// country
SimpleRouter::get('/country/region/{country_id}', 'CountryController@getRegions');

// admin
SimpleRouter::get('/admin/products', 'ProductController@index');
SimpleRouter::get('/admin/product/{id}', 'ProductController@view')->where(['id'=>'[0-9]+']);
SimpleRouter::get('/admin/product/add', 'ProductController@add');
SimpleRouter::get('/admin/product/delete/{id}', 'ProductController@delete');
SimpleRouter::get('/admin/product/edit/{id}', 'ProductController@edit');
SimpleRouter::post('/admin/product/edit', 'ProductController@update');
SimpleRouter::get('/product/info/{prod_id}', 'ProductController@getInfo');
//popular
SimpleRouter::get('/admin/popular', 'ProductController@popular');
SimpleRouter::get('/admin/popular/delete/{id}', 'ProductController@deletePopular');
SimpleRouter::get('/admin/popular/add/{id}', 'ProductController@addPopular');
//best
SimpleRouter::get('/admin/best', 'BestProductController@view');
SimpleRouter::get('/admin/best/edit', 'BestProductController@edit');
SimpleRouter::post('/admin/best/edit', 'BestProductController@update');
SimpleRouter::get('/admin/best/add/{prod_id}', 'BestProductController@add');
SimpleRouter::post('/admin/best/add', 'BestProductController@create');
// disconts
SimpleRouter::get('/admin/disconts', 'DiscontController@index');
SimpleRouter::get('/admin/discont/add', 'DiscontController@add');
SimpleRouter::get('/admin/discont/delete/{id}', 'DiscontController@delete');
SimpleRouter::get('/admin/discont/edit/{id}', 'DiscontController@edit');
SimpleRouter::post('/admin/discont/add', 'DiscontController@create');
SimpleRouter::post('/admin/discont/edit', 'DiscontController@update');

// blog
SimpleRouter::get('/blog/{id}', 'BlogController@single');
SimpleRouter::get('/blogs/list', 'BlogController@list');
SimpleRouter::post('/blog/comment/add/{id}', 'BlogController@addComment');

// blog admin
SimpleRouter::get('/admin/blog', 'BlogAdminController@index');
SimpleRouter::get('/admin/blog/add', 'BlogAdminController@add');
SimpleRouter::post('/admin/blog/add', 'BlogAdminController@create');
SimpleRouter::get('/admin/blog/delete/{id}', 'BlogAdminController@delete');
SimpleRouter::get('/admin/blog/edit/{id}', 'BlogAdminController@edit');
SimpleRouter::post('/admin/blog/edit', 'BlogAdminController@update');

// comments
SimpleRouter::get('/admin/comments', 'BlogCommentAdminController@comments');
SimpleRouter::get('/admin/comment/delete/{id}', 'BlogCommentAdminController@delete');
SimpleRouter::get('/admin/comment/edit/{id}', 'BlogCommentAdminController@edit');
SimpleRouter::post('/admin/comment/edit', 'BlogCommentAdminController@update');

SimpleRouter::post('/admin/product/add', function(){
    $controller = new  App\Controllers\ProductController; 
    try{
        $storage = new \Upload\Storage\FileSystem('assets/img/product/original');
        $file = new \Upload\File('img', $storage);
        $new_filename = uniqid(); 
        $file->setName($new_filename);
        $types_arr = ['image/png', 'image/gif', 'image/jpeg', 'image/jpg'];
        $valid_types = new \Upload\Validation\Mimetype($types_arr); 
        $max_size = new \Upload\Validation\Size('5M'); 
        $rules = [$valid_types, $max_size]; 
        $file->addValidations($rules);
        $file->upload();
        $controller->create($file->getNameWithExtension());
    }
    catch(\Exception $e){
        $controller->addMessageText(false, $file->getErrors(), false)->redirect("admin/product/add/");
    }
});
// Category
SimpleRouter::get('/admin/categories', 'CategoryController@index');
SimpleRouter::get('/admin/category/{id}', 'CategoryController@parent')->where(['id'=>'[0-9]+']);
SimpleRouter::get('/admin/category/add/{parent_id}', 'CategoryController@add');
SimpleRouter::get('/admin/category/delete/{id}', 'CategoryController@delete');
SimpleRouter::get('/admin/category/edit/{id}', 'CategoryController@edit');
SimpleRouter::post('/admin/category/edit', 'CategoryController@update');
SimpleRouter::post('/admin/category/add', function (){
    $v = new \Valitron\Validator($_POST);
    $v->rule('required', ['name', 'parent_id']);
    $v->rule('lengthMin', 'name', 5);
    $v->rule('lengthMax', 'name', 10);
    $result = $v->validate(); 
    $controller = new App\Controllers\CategoryController;
    if($result){
        $controller->create();
    }
    else{
        $controller->addMessageText(false, $v->errors())->redirect("admin/category/add/".$_POST["parent_id"]);
    }
});

// Image
SimpleRouter::get('/admin/product/image/add/{prod_id}', 'ProductImageController@add');
SimpleRouter::post('/admin/product/image/add', 'ProductImageController@create');
SimpleRouter::get('/admin/product/image/delete/{img_id}', 'ProductImageController@delete');
SimpleRouter::get('/admin/product/image/delete_all/{prod_id}', 'ProductImageController@deleteAll');

// namespace
SimpleRouter::setDefaultNamespace('App\Controllers');
// Start the routing
SimpleRouter::start();