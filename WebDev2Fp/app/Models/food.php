<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    use HasFactory;
    
    public function getMenu(){
        return $this->belongsTo(menu::class,'menu_id','id');
    }


    public function getCuisine(){
        return $this->belongsTo(cuisine::class,'cuisine_id','id');
    }


    public function getDiet(){
        return $this->belongsTo(diet::class,'diet_id','id');
    }

    public function getStore(){
        return $this->belongsTo(store::class,'store_id','id');
    }

    public function getBakestItem(){
        return $this->hasMany(basketItem::class);
    }


}
