<?php
namespace App\Controllers;

use Intervention\Image\ImageManager;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Helpers\Image;

class ProductImageController extends AdminController
{

    public function add($prod_id)
    {
        $this->render("product_image/add", ["prod_id" => $prod_id]);
    }

    public function create()
    {
        $file_name = $this->uploadFile();
        $res = ProductImage::add($file_name, $_POST["prod_id"]);
        $this->dublicateImg($file_name);
        $this->addMessageKey(true, "add_prod_image")->redirect("admin/product/".$_POST["prod_id"]);
    }

    public function uploadFile()
    {
        $storage = new \Upload\Storage\FileSystem('assets/img/product/original');
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

    public function dublicateImg($file_name)
    {
        $manager = new ImageManager(['driver' => 'gd']); 
        $img = $manager->make('assets/img/product/original/'.$file_name);
        $img->resize(600, 650); 
        $img->save('assets/img/product/big/'.$file_name);
        $img->resize(270, 260); 
        $img->save('assets/img/product/card/'.$file_name);
        $img->resize(140, 135); 
        $img->save('assets/img/product/min/'.$file_name);
    }

    public function delete($img_id)
    {
        $image = ProductImage::findOne($img_id);
        $this->deleteFiles($image->image);
        $result = ProductImage::delete($img_id);
        $this->addMessageKey($result, "delete_image_prod")->back();
    }

    public function deleteAll($prod_id)
    {
        $images = ProductImage::get($prod_id);
        if($images){
            ProductImage::deleteAll($images);
            foreach($images as $image){
                $this->deleteFiles($image->image);
            }
        }
        $this->addMessageKey(true, "delete_product")->redirect("admin/products");;
    }

    public function deleteFiles($file_name)
    {
        if(file_exists("assets/img/product/original/".$file_name)){
            unlink("assets/img/product/original/".$file_name);
        }
        if(file_exists("assets/img/product/big/".$file_name)){
            unlink("assets/img/product/big/".$file_name);
        }
        if(file_exists("assets/img/product/card/".$file_name)){
            unlink("assets/img/product/card/".$file_name);
        }
        if(file_exists("assets/img/product/min/".$file_name)){
            unlink("assets/img/product/min/".$file_name);
        }
    }
}