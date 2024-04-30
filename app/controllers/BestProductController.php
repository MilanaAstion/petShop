<?php
namespace App\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\BestProduct;
use App\Core\View;

class BestProductController extends AdminController
{

    public function view()
    {
        $best = BestProduct::get();
        $this->render("best_product/view", ["best" => $best]);
    }

    public function edit()
    {
        $best = BestProduct::get();
        $this->render("best_product/edit", ["best" => $best]);
    }

    public function update()
    {
        $fileName = $this->uploadImage(true);
        $this->validate();
        $result = BestProduct::edit($_POST, $fileName);
        $this->addMessageKey($result, 'best_edit');
        $result ? $this->redirect("admin/best") : $this->back();
    }

    private function validate()
    {
        $v = new \Valitron\Validator($_POST);
        $v->rule('required', ['descr', 'time']);
        $result = $v->validate(); 
        if(!$result){
            $this->addMessageText(false, $v->errors())->redirect("admin/best");
        }
    }

    public function uploadImage($edit = false)
    {
        if($edit){
            if($_FILES['img']['error'] == 4 ) return false;
        }
        
        $storage = new \Upload\Storage\FileSystem('assets/img/banner');
        $file = new \Upload\File('img', $storage);
        $new_filename = uniqid(); 
        $file->setName($new_filename);
        $this->checkFile($file);
        $file->upload();
        return $file->getNameWithExtension();
    }

    public function checkFile($file)
    {
        $types_arr = ['image/png', 'image/gif', 'image/jpeg', 'image/jpg'];
        $valid_types = new \Upload\Validation\Mimetype($types_arr); 
        $max_size = new \Upload\Validation\Size('5M'); 
        $rules = [$valid_types, $max_size]; 
        $file->addValidations($rules);
    }

    public function add($prod_id)
    {
        // dd($prod_id);
        $product = Product::findOne($prod_id);
        // $best = BestProduct::get();
        $this->render("best_product/add", ["product" => $product]);
    }
    
    public function create()
    {
        $this->validate();
        BestProduct::deleteRow();
        $fileName = $this->uploadImage();
        $result = BestProduct::add($_POST, $fileName);
        $this->addMessageKey($result, 'best_add');
        $result ? $this->redirect("admin/best") : $this->back();
    }
}