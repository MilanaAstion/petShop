<?php
namespace App\Controllers;

use App\Models\Product;
use App\Models\ProductComment;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Country;
use App\Models\BestProduct;
use App\Models\Blog;
use App\Core\View;

class MainController extends PublicController
{
    public function index()
    {
        $this->layout = "home_layout";
        $products = Product::table()->where('popular', 1)->findMany();
        $products = ProductImage::getAll($products);
        $best = BestProduct::get();
        $blogs = Blog::table()->orderByDesc("id")->limit(3)->findMany();
        // dd($blogs);
        // dd($best->product);
        $this->render("main/index/index", compact("products", "best", "blogs"));
    }

    public function contact($id)
    {
        
        // echo __METHOD__;
        $recipes = Recipe::findAll();
        // dd($recipe);
        $this->render("main/contact", ["recipes" => $recipes]);
    }

    public function product($id)
    {
        $product = Product::findOne($id);
        $comments = ProductComment::table()->where("prod_id", $id)->findMany();
        $product->rating = Product::countRating($comments);
        $product->countComments = count($comments);
        return $this->render('main/product/index', ['product' => $product, 'comments' => $comments]);
    }

    public function shop($cat_id)
    {
        $products = Product::getForCategory($cat_id);
        $cat = Category::findOne($cat_id);
        $this->render("main/shop/index", ["products" => $products, "cat" => $cat]);
    }

    public function cart($country_id = null, $state_id = null)
    {
        $countries = Country::findAll();
        if($country_id){
            $regions = Country::getRegions($country_id);
            // dd($regions);
        }
        $this->render("main/cart", compact("countries", "regions", "country_id", "state_id"));
    }

    public function search()
    {
        $search = "%" . $_POST["search"] . "%";
        $products = Product::table()->whereLike("name", $search)->findMany();
        $products = ProductImage::getAll($products);
        $this->render("main/search", compact("products"));
    }

    public function addRating()
    {
        $_POST["date"] = time();
        ProductComment::table()->create()->set($_POST)->save();
        $this->back();
    }
}