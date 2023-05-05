<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    use HasFactory;

    public function getMenu(){
        return $this->belongsTo(menu::class);
    }

    public function getCuisine(){
        return $this->belongsTo(cuisine::class);
    }
    public function getBakestItem(){
        return $this->hasMany(basketItem::class);
    }
}
