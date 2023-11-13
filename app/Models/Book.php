<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected static $book, $imageFile,$imageName,$imageDirectory,$imageUrl;


    public static function storebook($request){
        self::$imageFile = $request->file('image');
        if (self::$imageFile){
            self::$imageName = self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'upload/book-images/';
            self::$imageFile->move(self::$imageDirectory,self::$imageName);
            self::$imageUrl  = self::$imageDirectory.self::$imageName;
        }
        self::$book                        = new Book();
        self::$book->category_id           = $request->category_id;
        self::$book->name                  = $request->name;
        self::$book->author                = $request->author;
        self::$book->description           = $request->description;
        self::$book->qty                   = $request->qty;
        self::$book->image                 =self::$imageUrl;
        self::$book->status                = $request->status;
        self::$book->save();
        return self::$book;

    }

    public static function updatebook($request,$id){
        self::$book   = Book::find($id);

        self::$imageFile = $request->file('image');
        if (self::$imageFile){
            if (file_exists(self::$book->image)){
                unlink(self::$book->image);
            }
            self::$imageName  = self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'upload/book-images/';
            self::$imageFile->move(self::$imageDirectory,self::$imageName);
            self::$imageUrl   = self::$imageDirectory.self::$imageName;
        }else{
            self::$imageUrl  = self::$book->image;
        }
        self::$book->category_id           = $request->category_id;
        self::$book->name                  = $request->name;
        self::$book->author                = $request->author;
        self::$book->description           = $request->description;
        self::$book->qty                   = $request->qty;
        self::$book->image                 =self::$imageUrl;
        self::$book->status                = $request->status;
        self::$book->save();


    }
    public static function deletebook($id){
        self::$book = Book::find($id);
        if (file_exists(self::$book->image))
        {
            unlink(self::$book->image);
        }
        self::$book->delete();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
