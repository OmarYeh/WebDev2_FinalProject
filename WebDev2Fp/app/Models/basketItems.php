<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class basketItems extends Model
{
    use HasFactory;
    public function getbasket(){
        return $this->belongsTo(basket::class,'basket_id','id');
    }


    public function getfood(){
        return $this->belongsTo(food::class,'food_id','id');
    }


    public function getOrder(){
        return $this->belongsTo(order::class,'order_id','id');
    }

}
