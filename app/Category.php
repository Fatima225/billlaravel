<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   use \Astrotomic\Translatable\Translatable;
   protected $guarded = [];

   //name موجود في جدول الcategories 
   public $translatedAttributes = ['name'];
    

   public function products ()
   {

return $this->hasMany(Product::class);

   }//end of product
}//end of model
