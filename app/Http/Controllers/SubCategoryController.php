<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        return view('backend.subcategory.index',['categories' => Category::all()]);
    }

    public function store(Request $request){
     SubCategory::storeSubCategory($request);
     return redirect()->route('sub-category.manage')->with('sucess', 'subcategory create sucessfully');
    }
    public function manage(){
        return view('backend.subcategory.manage',[
            'subcategories'  => SubCategory::all()
        ]);
    }
    public function edit($id){
    return view('backend.subcategory.edit',[
        'categories' => Category::all(),
        'subcategory' => SubCategory::find($id),
    ]);
    }
    public function update(Request $request,$id){
        SubCategory::updateSubCategory($request,$id);
        return redirect()->route('sub-category.manage')->with('sucess', 'subcategory update sucessfully');

    }
   public function delete($id){
        SubCategory::deletesubcategory($id);
       return redirect()->route('sub-category.manage')->with('sucess', 'subcategory delete sucessfully');
   }
}
