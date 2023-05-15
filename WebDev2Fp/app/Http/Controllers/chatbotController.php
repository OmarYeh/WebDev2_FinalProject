<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\offer;
use App\Models\store;
use App\Models\food;
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
    
    return response()->json(['offers' => $response]);
}
}
