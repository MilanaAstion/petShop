<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\Category;
use App\Helpers\Message;

class BaseController
{
    public $layout = "main_layout";
    
    // public function render($template, $data = [])
    // {
    //     $data["cats"] = Category::findAll();
    //     View::render($template, $data, $this->layout);
    // }

    public function addMessageKey($result, $key) 
    { 
        $type = $result ? 'success' : 'error'; 
        Message::addKey($type, $key); 
        return $this; 
    }

    public function redirect($path = "")
    {
        header("location: /".$path);
        exit;
    }

    public function redirectTwo($result, $path_arr)
    {
        if($result){
            header("location: /".$path_arr["ok"]);
        }
        else{
            header("location: /".$path_arr["error"]);
        }
        exit;
    }

    public function addMessageText($result, $errors, $arr = true) 
    { 
        $type = $result ? 'success' : 'error'; 
        if($arr){
            foreach($errors as $error){
                $text = $error[0];
                break;
            }
        }
        else{
            $text = $errors[0];
        }
        Message::addText($type, $text); 
        return $this; 
    }

    public function back()
    {
        $previous_page = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
        header("location: ".$previous_page);
        exit;
    }
}