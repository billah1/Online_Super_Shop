<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('backend.category.index');

    }
    public function store(Request $request){
//        return $request->all();
        Category::storeCategory($request);
        return redirect()->route('category.manage')->with('sucess','category create sucess');



    }
    public function manage(){
        return view('backend.category.manage',[
            'categories' =>Category::all()
        ]);
    }
    public function edit($id){
        return view('backend.category.edit', [
            'category' => Category::find($id)
        ]);
    }
    public function update(Request $request,$id){
        Category::updateCategory($request,$id);
        return redirect()->route('category.manage')->with('sucess','category update Sucessfully');
    }


    public function delete($id){
        Category::deleteCategory($id);
        return redirect()->route('category.manage')->with('sucess','category delete sucessfully');
    }

}
