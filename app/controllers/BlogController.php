<?php
namespace App\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;

class BlogController extends PublicController
{

    public function single($id)
    {
        $blog = Blog::findOne($id);
        $this->namePage = "Blog Deteils";
        $blog->comments = BlogComment::table()->where(["blog_id" => $id, "state" => BlogComment::CHECKED])->findMany();
        $blog->countComments = count($blog->comments);
        // dd($comments);
        $this->render("blog/single", ["blog" => $blog]);
    }

    public function list()
    {
        $blogs = Blog::findAll();
        $this->namePage = "Blog";
        $this->render("blog/list", ["blogs" => $blogs]);
    }

    public function addComment($blog_id)
    {
        $result = $this->validate();
        dd($result);
        $comment = BlogComment::table()->create();
        $comment->image = "blog-comment1.png";
        $comment->date = date("F j, Y");
        $comment->blog_id = $blog_id;
        $comment->set($_POST);
        $result = $comment->save();
        $this->back();
    }

    public function validate()
    {
        $v = new \Valitron\Validator($_POST);
        $v->rule('required', ['name', 'email', 'text']);
        $result = $v->validate(); 
        if(!$result){
            $this->addMessageKey(false, "blog_comm_valid");
        }
    }
}