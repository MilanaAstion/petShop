<?php
namespace App\Controllers;

use Intervention\Image\ImageManager;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Helpers\Image;

class ProductController extends AdminController
{

    public function index()
    {
        $products = Product::findAll();
        // dd($products);
        $this->render("product/index", ["products" => $products]);
    }

    public function add()
    {
        $cats = Category::findAll();
        $this->render("product/add", ["cats" => $cats]);
    }

    public function view($id)
    {
        $product = Product::findOne($id);
        $this->render("product/view", ["product" => $product]);
    }

    public function create($file_name)
    {
        $v = new \Valitron\Validator($_POST);
        $v->rule('required', ['name', 'price','cat_id', 'descr']);
        $v->rule('lengthMin', 'name', 5);
        $v->rule('lengthMax', 'name', 10);
        $v->rule('integer', 'price');
        $result = $v->validate(); 
        if(!$result){
            $this->addMessageText(false, $v->errors())->redirect("admin/product/add");
        }
        // dd($v->errors()); 
        $product_id = Product::add($_POST);
        if($product_id){
            $res = ProductImage::add($file_name, $product_id);
            $this->dublicateImg($file_name);
            $this->addMessageKey(true, "add_product")->redirect("admin/product/$product_id");
        }
        else{
            $this->addMessageKey(false, "add_product")->redirect("admin/product/add");
        }
    }

   

    public function delete($id)
    {
        $result = Product::delete($id);
        if($result){
            $this->redirect("admin/product/image/delete_all/".$id);
        }
        $this->addMessageKey(false, "delete_product")->back();
    }

    public function edit($id)
    {
        $cats = Category::findAll();
        $product = Product::findOne($id);
        $this->render("product/edit", ["cats" => $cats, "product" => $product]);
    }

    public function update()
    {
        $result = Product::edit($_POST);
        $this->addMessageKey($result, "update_product")->redirect("admin/product/".$_POST["id"]);
    }

    public function popular()
    {
        $products = Product::table()->where('popular', 1)->findMany();
        $products = ProductImage::getAll($products);
        $products = Category::getAll($products);
        $this->render("product/popular", ["products" => $products]);
    }

    public function deletePopular($id)
    {
        $product = \ORM::forTable('products')->findOne($id);
        $product->popular = 0;
        $result = $product->save();
        $this->addMessageKey($result, "delete_pop")->back();
    }

    public function addPopular($id)
    {
        $product = \ORM::forTable('products')->findOne($id);
        $product->popular = 1;
        $result = $product->save();
        $this->addMessageKey($result, "add_pop")->back();
    }

    public function getInfo($id)
    {
        $product = Product::table()->where("id", $id)->findArray()[0];
        $product["photo"] = ProductImage::table()->where("prod_id", $id)->findArray();
        // dd($product);
        echo json_encode($product);
    }
}