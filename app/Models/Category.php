<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected static $category,$imageName,$imageDirectory,$imageFile,$imageUrl;
    protected $fillable = ['name','description','image','status'];

    public static function storeCategory($request){

        self::$imageFile = $request->file('image');
        if (self::$imageFile){
            self::$imageName = self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'upload/category-images/';
            self::$imageFile->move(self::$imageDirectory,self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;

        }


        self::$category                =  new Category();

        self::$category->name          = $request->name;
        self::$category->description   = $request->description;
        self::$category->image         = self::$imageUrl;
        self::$category->status        = $request->status;
        self::$category->save();
    }

    public static function updateCategory($request,$id){

        self::$category     = Category::find($id);
        self::$imageFile    = $request->file('image');
        if (self::$imageFile){

            if (file_exists(self::$category->image)){

                unlink(self::$category->image);
            }
            self::$imageFile = $request->file('image');
            self::$imageName = self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'upload/category-images/';
            self::$imageFile->move(self::$imageDirectory,self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }else{
            self::$imageUrl = self::$category->image;
        }
        self::$category->name              = $request->name;
        self::$category->description       = $request->description;
        self::$category->image             =self::$imageUrl;
        self::$category->status            = $request->status;
        self::$category->save();

    }
    public static function deleteCategory($id){
        self::$category = Category::find($id);
        if (file_exists(self::$category->image)){
            unlink(self::$category->image);
        }
        self::$category->delete();


    }
  public function subcategories(){
        return $this->hasMany(SubCategory::class);
  }
}
