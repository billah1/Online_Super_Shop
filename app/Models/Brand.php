<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected static $brand,$imageName,$imageFile,$imageDirectory,$imageUrl;

    protected $fillable =['name','description','image','status'];

    public static function storebrand($request){
        self::$imageFile = $request->file('image');
        if (self::$imageFile){
            self::$imageName = self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'upload/brand-images/';
            self::$imageFile->move(self::$imageDirectory,self::$imageName);
            self::$imageUrl  = self::$imageDirectory.self::$imageName;
        }
        self::$brand                   = new Brand();
        self::$brand->name              = $request->name;
        self::$brand->description       = $request->description;
        self::$brand->image             = self::$imageUrl;
        self::$brand->status            = $request->status;
        self::$brand->save();

   }

   public static function updatebrand($request,$id){
        self::$brand         = Brand::find($id);

        self::$imageFile    = $request->file('image');
        if (self::$imageFile){
            if (file_exists(self::$brand->image)){
                unlink(self::$brand->image);
            }
            self::$imageName       = self::$imageFile->getClientOriginalName();
            self::$imageDirectory  ='upload/brand-images/';
            self::$imageFile->move(self::$imageDirectory,self::$imageName);
            self::$imageUrl       = self::$imageDirectory.self::$imageName;
        }else{
            self::$imageUrl      = self::$brand->image;
        }
        self::$brand->name              = $request->name;
        self::$brand->description       = $request->description;
        self::$brand->image             = self::$imageUrl;
        self::$brand->status            = $request->status;
        self::$brand->save();

   }
   public static function deletebrand($id){
        self::$brand   =Brand::find($id);
        if (file_exists(self::$brand->image)){
            unlink(self::$brand->image);
        }
        self::$brand->delete();
   }
}
