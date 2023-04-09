<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Page;
use App\Models\Banner;
use App\Models\ProductCategory;


class WebsiteController extends Controller
{
    public function homepage()
    {
        $banner = Banner::where('status', 1)->get();
        $products = Product::all();
        // $categories = Category::where('status', 1)->where('show_in_menu', 1)->get();
        return view('home', compact('products','banner'));
    }

    // public function mencologne()
    // {
    //     $products = Product::all();
    //     $categories = Category::where('status', 1)->get();
    //     return view('mencologne', compact('categories', 'products'));
    // }

    public function articleList($slug)
    {
        // echo $slug;
        // die;
        $product = Product::where('url_key', $slug)->first();
        $products = $product->categories;
        foreach($products as $_pr){
           $catname = $_pr->url_key;
        }
        $category = Category::where('url_key', $catname)->first();
        $products = $category->products;
        
        // $categories = Category::where('status', 1)->where('show_in_menu', 1)->get();
        return view('product', compact('products', 'product'));
    }


    public function categoryList($slug) 
    {
        // echo $slug;'show_in_menu'
        // die;
        //$products = Product::all();
        // $categories = Category::where('status', 1)->where('show_in_menu', 1)->get();
        $category = Category::where('url_key', $slug)->first();
        $products = $category->products;
        return view('mencologne', compact('category', 'products'));
    }

}