<?php
namespace App\Controllers;

use App\Models\BlogComment;
use App\Models\Blog;

class BlogCommentAdminController extends AdminController
{
    public function comments()
    {
        $comments = BlogComment::table()->where("state" , BlogComment::NOT_CHECKED)->findMany();
        foreach($comments as $comment){
            $comment->blog = Blog::findOne($blog_id);
            $comment->stateName = BlogComment::getNameState($comment->state);
        }
        // dd($comments);
        $this->render("blog_comments_admin/comments", ["comments" => $comments]);
    }

    public function delete($id)
    {
        $result = BlogComment::delete($id);
        $this->addMessageKey($result, "delete_blog_comment")->back();
    }

    public function edit($id)
    {
        // $comment = BlogComment::findOne($id);
        // $this->render("blog_comments_admin/edit", ["comment" => $comment]);
        $comment = BlogComment::findOne($id);
        $comment->state = BlogComment::CHECKED;
        $result = $comment->save();
        echo $result ?  "true" : "false";
    }

    // public function update()
    // {
    //     $comment = BlogComment::findOne($_POST["id"]);
    //     $comment->state = $_POST["state"];
    //     $result = $comment->save();
    //     $this->addMessageKey($result, "edit_blog_comment");
    //     $result ? $this->redirect("admin/comments") : $this->back();
    // }
}