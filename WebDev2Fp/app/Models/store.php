<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;

    
    public function getmenu()
    {
        return $this->hasOne(menu::class);
    }

    public function getReviews(){
        return $this->hasMany(review::class);
    }

    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getCuisine(){
        return $this->belongsTo(cuisine::class,'cuisine_id','id');
    }

    public function getFoods(){
        return $this->hasMany(food::class);
    }

}
