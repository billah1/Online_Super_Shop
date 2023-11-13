<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home.index',[
            'categories' => Category::all(),
            'books'  => Book::orderBy('id','desc')->take('8')->get(['id','category_id','name','author','qty','image']),
        ]);
    }
    public function category($id){
        return view('frontend.category.index',[
            'books' => Book::where('category_id',$id)->orderBy('id','desc')->get()
        ]);
    }
    public function detail($id){
        return view('frontend.detail.index',[
            'book' => Book::find($id)
        ]);
    }
}
