<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class basket extends Model
{
    use HasFactory;
    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    public function getfood(){
        return $this->belongsToMany(food::class,'basket_items','basket_id','food_id');
    }
}
