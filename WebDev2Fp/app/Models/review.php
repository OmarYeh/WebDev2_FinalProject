<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    public function getStore(){
        return $this->belongsTo(store::class,'store_id','id');
    }
    public function getUser(){
        return$this->belongsTo(User::class,'user_id','id');
    }
}
