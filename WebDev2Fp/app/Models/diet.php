<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diet extends Model
{
    use HasFactory;
    
    public function getCuisine(){
        return $this->hasMany(cuisine::class);
    }

    public function getFood(){
        return $this->hasMany(food::class);
    }
}
