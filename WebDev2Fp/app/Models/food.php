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


    public function getbaskets(){
        return $this->belongsToMany(basket::class,'basket_items','food_id','basket_id');
    }

    public function getCategory(){
        return $this->belongsTo(category::class,'category_id','id');
    }

    public function getOffers()
    {
        return $this->belongsToMany(offer::class,'offerfoods','food_id','offer_id');
        
    }
    public function getOrders()
    {
        return $this->belongsToMany(order::class,'orderitems','food_id','order_id');
        
    }



}
