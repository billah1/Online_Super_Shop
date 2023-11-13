<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        return view('backend.book.index',[
            'categories'          => Category::all(),
            'books'               => Book::all(),

        ]);
    }

    public function store(Request $request){
//        return $request->all();
         Book::storebook($request);
        return redirect()->route('book.manage')->with('sucess','book create sucessfully');
    }
    public function manage(){
        return view('backend.book.manage',[
            'books'  => Book::all()
        ]);
    }
//    public function detail($id)
//    {
//        return view('backend.book.detail', [
//            'product' => Product::find($id)
//        ]);
//    }
    public function edit($id){
        return view('backend.book.edit',[
            'categories'        => Category::all(),
            'book'           => Book::find($id)

        ]);
    }

    public function update(Request $request,$id){
        Book::updatebook($request,$id);
        return redirect()->route('book.manage')->with('sucess','book update sucessfully');
    }
    public function delete($id){
        Book::deletebook($id);
        return redirect()->route('book.manage')->with('sucess','book delete sucessfully');
    }

}
