<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(){
        return view('backend.unit.index');
    }
    public function store(Request $request){
        Unit::storeunit($request);
        return redirect()->route('unit.manage')->with('sucess','unit create sucessfully');
    }
    public function manage(){
        return view('backend.unit.manage',[
            'units'  => Unit::all()
        ]);
    }
    public function edit($id){
        return view('backend.unit.edit',[
            'unit' =>Unit::find($id)
        ]);
    }
    public function update(Request $request,$id){
        Unit::updateunit($request,$id);
        return redirect()->route('unit.manage')->with('sucess','unit update sucessfully');

    }
    public function delete($id){
        Unit::deleteunit($id);
        return redirect()->route('unit.manage')->with('sucess','unit delete sucessfully');
    }
}
