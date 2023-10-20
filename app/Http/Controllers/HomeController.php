<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home.index',[
            'categories' => Category::all(),
            'products'  => Product::orderBy('id','desc')->take('8')->get(['id','category_id','name','product_price','image']),
        ]);
    }
    public function category($id){
        return view('frontend.category.index',[
            'products' => Product::where('category_id',$id)->orderBy('id','desc')->get()
        ]);
    }
    public function detail($id){
        return view('frontend.detail.index',[
            'product' => Product::find($id)
        ]);
    }
}
