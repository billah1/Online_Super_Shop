<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     protected static $product, $imageFile,$imageName,$imageDirectory,$imageUrl;


     public static function storeproduct($request){
         self::$imageFile = $request->file('image');
         if (self::$imageFile){
             self::$imageName = self::$imageFile->getClientOriginalName();
             self::$imageDirectory = 'upload/product-images/';
             self::$imageFile->move(self::$imageDirectory,self::$imageName);
             self::$imageUrl  = self::$imageDirectory.self::$imageName;
         }
         self::$product                      = new Product();
         self::$product->category_id         = $request->category_id;
         self::$product->subcategory_id     = $request->subcategory_id;
         self::$product->brand_id            = $request->brand_id;
         self::$product->unit_id             = $request->unit_id;
         self::$product->name                = $request->name;
         self::$product->code                = $request->code;
         self::$product->model               = $request->model;
         self::$product->stock_amount        = $request->stock_amount;
         self::$product->product_price	     = $request->product_price;
         self::$product->selling_price       = $request->selling_price;
         self::$product->short_description   = $request->short_description;
         self::$product->long_description    = $request->long_description;
         self::$product->image               =self::$imageUrl;
         self::$product->status              = $request->status;
         self::$product->save();
         return self::$product;

     }

     public static function updateproduct($request,$id){
         self::$product   = Product::find($id);

         self::$imageFile = $request->file('image');
         if (self::$imageFile){
             if (file_exists(self::$product->image)){
                 unlink(self::$product->image);
             }
             self::$imageName  = self::$imageFile->getClientOriginalName();
             self::$imageDirectory = 'upload/product-images/';
             self::$imageFile->move(self::$imageDirectory,self::$imageName);
             self::$imageUrl   = self::$imageDirectory.self::$imageName;
         }else{
             self::$imageUrl  = self::$product->image;
         }
         self::$product->category_id         = $request->category_id;
         self::$product->subcategory_id     = $request->subcategory_id;
         self::$product->brand_id            = $request->brand_id;
         self::$product->unit_id             = $request->unit_id;
         self::$product->name                = $request->name;
         self::$product->code                = $request->code;
         self::$product->model               = $request->model;
         self::$product->stock_amount        = $request->stock_amount;
         self::$product->product_price	     = $request->product_price;
         self::$product->selling_price       = $request->selling_price;
         self::$product->short_description   = $request->short_description;
         self::$product->long_description    = $request->long_description;
         self::$product->image               =self::$imageUrl;
         self::$product->status              = $request->status;
         self::$product->save();


     }
     public static function deleteproduct($id){
         self::$product = Product::find($id);
         if (file_exists(self::$product->image))
         {
             unlink(self::$product->image);
         }
         self::$product->delete();
     }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function otherImages()
    {
        return $this->hasMany(OtherImage::class);
    }
}
