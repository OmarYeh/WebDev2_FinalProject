<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getfood()
    {
        return $this->belongsToMany(food::class,'orderitems','order_id','food_id');
        
    }

    public function getstore()
    {
        return $this->belongsTo(store::class,'store_id','id');
        
    }
}
