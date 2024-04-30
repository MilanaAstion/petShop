<?php
namespace App\Controllers;

use App\Models\Category;
use App\Helpers\Validator;
use App\Models\Product;
// use App\Helpers\Image;

class CategoryController extends AdminController
{

    public function index()
    {
        $cats = Category::findAll();
        // dd($cats);
        $this->render("category/index", ["cats" => $cats]);
    }

    public function parent($id)
    {
        $cat = Category::findOne($id);
        // dd($cat);
        $this->render("category/parent", ["cat" => $cat]);
    }

    public function add($parent_id)
    {
        $this->render("category/add", ["parent_id" => $parent_id]);
    }

    public function create()
    {
       
        // try{
        //     Validator::make($_POST)->empty()->minStr(['name'], 5)->maxStr(['name'], 10);
        // }
        // catch(\Exception $e){
        //     $this->addMessageKey(false, $e->getMessage())->redirect("admin/category/add/".$_POST["parent_id"]);
        // }

        $result = Category::add($_POST);

        $path_arr = [
            "ok" => "admin/category/".$_POST["parent_id"],
            "error" => "admin/category/add/".$_POST["parent_id"]
        ];
        $this->addMessageKey($result, "add_cat")->redirectTwo($result, $path_arr);

    }

    public function delete($id)
    {
        $cat = Category::findOne($id);
        $products = Product::getForCategory($id);
        if($products){
            $this->addMessageKey(false, "prod_delete_category")->redirect("admin/category/".$cat->parent_id);
        }
        Category::delete($id);
        $this->addMessageKey(true, "delete_category")->redirect("admin/categories");
    }

    public function edit($id)
    {
        $cat = Category::findOne($id);
        $this->render("category/edit", ["cat" => $cat]);
    }

    public function update()
    {
        $cat = Category::findOne($_POST["id"]);
        $v = new \Valitron\Validator($_POST);
        $v->rule('required', ['name', 'id']);
        $v->rule('lengthMin', 'name', 5);
        $v->rule('lengthMax', 'name', 20);
        $result = $v->validate(); 
        if(!$result){
            $this->addMessageText(false, $v->errors())->redirect("admin/category/edit/".$cat->id);
        }
        $result = Category::edit($_POST); 
        $this->addMessageKey($result, "update_category")->redirect("admin/category/".$cat->parent_id);
    }
}