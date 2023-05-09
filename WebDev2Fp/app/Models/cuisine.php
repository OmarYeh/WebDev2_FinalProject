<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuisine extends Model
{
    use HasFactory;
    public function getFood(){
        return $this->hasMany(food::class);
    }

    public function getDiet(){
        return $this->belongsTo(diet::class,'diet_id','id');
    }
}
