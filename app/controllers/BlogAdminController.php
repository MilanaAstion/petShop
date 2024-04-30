<?php
namespace App\Controllers;

use App\Models\Blog;


class BlogAdminController extends AdminController
{
    public function index()
    {
        $blogs = Blog::findAll();
        $this->render("blog_admin/index", ["blogs" => $blogs]);
    }

    public function add()
    {
        $this->render("blog_admin/add");
    }

    public function create()
    {
        $this->validate();
        $_POST["img"] =$this->uploadFile();
        $result = Blog::table()->create()->set($_POST)->save();
        $this->addMessageKey($result, "add_blog");
        $result ? $this->redirect("admin/blog") : $this->back();
    }

    public function uploadFile()
    {
        $storage = new \Upload\Storage\FileSystem('assets/img/blog');
        $file = new \Upload\File('image', $storage);
        $file->setName(uniqid());
        $this->checkFile($file);
        try {
            $file->upload();
            return $file->getNameWithExtension();
        } catch (\Exception $e) {
            // $errors = $file->getErrors();

            // dd($errors);
            $this->addMessageKey(false, "add_blog_image")->back();
        }
        
    }

    public function checkFile($file)
    {
        $types_arr = ['image/png', 'image/gif', 'image/jpeg', 'image/jpg'];
        $valid_types = new \Upload\Validation\Mimetype($types_arr); 
        $max_size = new \Upload\Validation\Size('5M'); 
        $rules = [$valid_types, $max_size]; 
        $file->addValidations($rules);
    }

    public function delete($id)
    {
        $blog = Blog::findOne($id);
        if(file_exists("assets/img/blog/$blog->image")){
            unlink("assets/img/blog/$blog->image");
        }
        $result = $blog->delete($id);
        $this->addMessageKey($result, "delete_blog")->back();
    }

    public function edit($id)
    {
        $blog = Blog::findOne($id);
        $this->render("blog_admin/edit", ["blog" => $blog]);
    }

    public function update()
    {
        $this->validate();
        $result = Blog::update($_POST);
        if($_FILES["image"]["error"] == 0 && $result){
            $file_name = $this->uploadFile();
            Blog::findOne($_POST["id"])->set(["img" => $file_name])->save();
        }
        $this->addMessageKey($result, "update_blog");
        $result ? $this->redirect("admin/blog") : $this->back();
    }

    public function validate()
    {
        $v = new \Valitron\Validator($_POST);
        $v->rule('required', ['title', 'text', 'id', 'author', 'date']);
        $result = $v->validate(); 
        if(!$result){
            $this->addMessageKey(false, "blog_valid")->back();
        }
    }

    
}