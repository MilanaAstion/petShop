<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\Category;

class AdminController extends BaseController
{
    public $layout = "admin_layout";
    
    public function render($template, $data = [])
    {
        View::render($template, $data, $this->layout);
    }

   
}