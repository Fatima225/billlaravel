<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];
    protected $casts = [
        'phone' => 'array'
    ];
    
    public function getNameAttribute($value) 
    {
      return ucfirst($value);
    }// end of name attribute اسم العميل يبدا بحرف كبير 
    public function orders()
{
return $this->hasMany( Order::class);
}//end orders
}//end model
