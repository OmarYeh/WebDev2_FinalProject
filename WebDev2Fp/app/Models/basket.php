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
    
    public function getbasketItem(){
        return $this->hasMany(basketItem::class);
    }
}
