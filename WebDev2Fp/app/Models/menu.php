<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    public function getstore()
    {
        return $this->belongsTo(store::class);
    }

    public function getFood(){
        return $this->hasMany(food::class);
    }
}
