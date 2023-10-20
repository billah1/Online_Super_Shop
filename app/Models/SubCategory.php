<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected static $subcategory,$imageName,$imageFile,$imageDirectory,$imageUrl;

    protected $fillable = ['category_id','name','description','image','status'];


    public static function storeSubCategory($request){
        self::$imageFile = $request->file('image');
        if (self::$imageFile){
            self::$imageName = self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'upload/subcategory-images/';
            self::$imageFile->move(self::$imageDirectory,self::$imageName) ;
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }

        self::$subcategory                 = new SubCategory();
        self::$subcategory->category_id    = $request->category_id;
        self::$subcategory->name           = $request->name;
        self::$subcategory->description    = $request->description;
        self::$subcategory->image          = self::$imageUrl;
        self::$subcategory->status         = $request->status;
        self::$subcategory->save();

}



public static function updateSubCategory($request,$id){
        self::$subcategory   = SubCategory::find($id);

        self::$imageFile = $request->file('image');
        if (self::$imageFile){
            if (file_exists(self::$subcategory->image)){
                unlink(self::$subcategory->image);
            }
            self::$imageName  = self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'upload/subcategory-images/';
            self::$imageFile->move(self::$imageDirectory,self::$imageName);
            self::$imageUrl   = self::$imageDirectory.self::$imageName;
        }else{
            self::$imageUrl  = self::$subcategory->image;
        }
        self::$subcategory->category_id     = $request->category_id;
        self::$subcategory->name            = $request->name;
        self::$subcategory->description     = $request->description;
        self::$subcategory->image           = self::$imageUrl;
        self::$subcategory->status          = $request->status;
        self::$subcategory->save();
   }

   public static function deletesubcategory($id){
        self::$subcategory    = SubCategory::find($id);
        if (file_exists(self::$subcategory->image)){
            unlink(self::$subcategory->image);
        }
        self::$subcategory->delete();
   }
    public function category(){
        return $this->belongsTo(Category::class);
    }

   }
