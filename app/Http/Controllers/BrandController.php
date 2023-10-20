<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('backend.brand.index');
    }
    public function  store(Request $request){
        Brand::storebrand($request);
        return redirect()->route('brand.manage')->with('sucess','brand create sucessfully');
    }
    public function manage(){
        return view('backend.brand.manage',[
            'brands' => Brand::all()
        ]);
    }
    public function edit($id){
        return view('backend.brand.edit',[
            'brand' => Brand::find($id)
        ]);
    }
    public function update(Request $request,$id){
        Brand::updatebrand($request,$id);
        return redirect()->route('brand.manage')->with('sucess','brand update sucessfully');

    }
    public function delete($id){
        Brand::deletebrand($id);
        return redirect()->route('brand.manage')->with('sucess','brand delete sucessfully');
    }
}
