<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use ShoppingCart;

class CartController extends Controller
{
    protected $product;
    public function index(Request $request,$id){
        $this->product =Product::find($id);
        ShoppingCart::add($this->product->id, $this->product->name, $request->qty, $this->product->product_price, ['image' => $this->product->image]);
        return redirect('/show-cart');

    }
    public function show(){
        return view('frontend.cart.index',['cart_products' =>  ShoppingCart::all()]);
    }
    public function update( Request $request,$id){
        ShoppingCart::update($id, $request->qty);
        return redirect('/show-cart')->with('succes','cart product update succesfully');

    }
    public function remove($id){
        ShoppingCart::remove($id);
        return redirect('/show-cart')->with('succes','cart product remove succesfully');

    }

}
