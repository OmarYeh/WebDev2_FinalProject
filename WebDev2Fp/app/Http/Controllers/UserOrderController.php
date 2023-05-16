<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\order;
use App\Models\basket;
use App\Models\store;
use App\Models\food;
use App\Models\basketItems;
use App\Models\orderitem;
use App\Models\menu;
use Illuminate\Support\Facades\DB;
use datetime;
class UserOrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $order = order::where('user_id',$user->id)->get();     
        
        $total = 0; 
        
        return view('userorder')->with(["order"=>$order,"total"=>$total]);
        
        
    }

    public function checkout(){
        return view('Checkout');
    }

    public function place(Request $request)
{
    $request->validate([
        'lat'=>'required|numeric',
        'lng'=>'required|numeric',
        'address'=>'required|string'
    ]);

    $point = DB::raw("POINT($request->lng, $request->lat)");
    $user = Auth::user();
    $basket = Basket::where('user_id',$user->id)->first();
    $basketitems = $basket->getFood()->with('getMenu.getStore')->get();
    $storegrp = $basketitems->groupBy(function($item) {
        return $item->getMenu->getStore->id;
    });

    foreach ($storegrp as $store_id => $foods) {
        $order = new Order();
        $order->store_id = $store_id;
        $order->user_id = $user->id;
        $order->location = $point;
        $order->Address = $request->address;
        $order->statues = 'pending';
        $order->Dot = date('Y-m-d H:i:s');
        $order->save();
    
        foreach ($foods as $food) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->food_id = $food->id;
            $orderItem->quantity = $food->pivot->quantity;
            $orderItem->save();
            
        }
    }
    $bItems = basketItems::where('basket_id',$basket->id)->get();
    foreach($bItems as $obj){
        $obj->delete();
    }
    return redirect()->route('orders');
}

}
