<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('index', ['products' => $products]);
    }

    public function categories(){
        $categories = Category::get();
        return view('categories', ['categories' => $categories]);
    }

    

    public function product($product_code = null){
        $product = Product::where('code', $product_code)->first();
        return view('product', ['product' => $product]);
    }

    public function category($code = null){
        $category = Category::where('code', $code)->first();
        return view('category', ['category' => $category]);
    }

    public function sign_in(){
        return view('signIn');
    }

    public function sign_up(){
        return view('signUp');
    }
}
