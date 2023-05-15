<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\order;

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

    public function place(){
        $user = Auth::user();
        $orderfood = $user->getOrders;
        foreach($orderfood as $obj){
            dd($obj);
        }
    }
}
