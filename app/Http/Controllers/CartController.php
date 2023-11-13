<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use ShoppingCart;

class CartController extends Controller
{
    protected $book;
    public function index(Request $request,$id){
        $this->book =Book::find($id);
        ShoppingCart::add($this->book->id, $this->book->name, $request->qty, $this->book->price, ['image' => $this->book->image]);
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
