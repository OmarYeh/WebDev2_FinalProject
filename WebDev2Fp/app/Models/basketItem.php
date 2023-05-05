<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class basketItem extends Model
{
    use HasFactory;
    public function getbasket(){
        return $this->belongsTo(basket::class);
    }

    public function getfood(){
        return $this->belongsTo(food::class);
    }

    public function getOrder(){
        return $this->belongsTo(order::class);
    }
}
