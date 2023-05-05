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
}
