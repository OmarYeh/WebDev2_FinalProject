<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    use HasFactory;

    public function getStore(){
        return $this->belongsTo(store::class,'store_id','id');
    }

    public function getfood()
    {
        return $this->belongsToMany(food::class,'offerfoods','offer_id','food_id');
        
    }
}
