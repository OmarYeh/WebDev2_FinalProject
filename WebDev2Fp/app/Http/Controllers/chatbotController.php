<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\offer;
use App\Models\store;
use App\Models\food;
use App\Models\cuisine;
use App\Models\menu;
use Illuminate\Support\Facades\Auth;
class chatbotController extends Controller
{
    public function orderstatue($userid, $orderId)
    {
        if (Auth::check() && Auth::id() == $userid) {
            $order = Order::find($orderId);
            $status = $order->statues;
            return response()->json(["status" => $status]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

  public function offers(){
    $offers = offer::all();
    $cuisine = cuisine::all();
    $menu = menu::all();
    $response = [];
    foreach($offers as $obj){
        $id=$obj->getfood->id;
        $name=$obj->getfood->name;
        $store= $obj->getStore->storeName;
        $price = $obj->getfood->price;
        $oldprice= $obj->oldprice;
        $response[] = [
            'id' => $id,
            'name' => $name,
            'store' => $store,
            'price' => $price,
            'oldprice' => $oldprice
        ];
    }
   $cuisines= [];
    foreach($cuisine as $c){
        $id= $c->id;
        $name = $c->name;
        $Description = $c->Description;
        $cuisines[] = [
            'id'=> $id,
            'name'=> $name,
            'Description'=> $Description,
        ];
    }
  $menuAverage= [];

  foreach ($menu as $m) {
    $foodItems = $m->getFood;
    $totalPrice = $foodItems->sum('price');
    $totalCount = $foodItems->count();
    $average = $totalPrice / $totalCount;
    $store = $m->getstore;
    $id = $m->id;
    $menuAverage[] = [
        'id' => $id,
        'average' => $average,
        'store_id' => $store->id,
        'store_name' => $store->storeName
    ];
}


    return response()->json(['offers' => $response , 'cuisines'=>$cuisines , 'menuAverage'=>$menuAverage]);
   
}
}
