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
        $orderedbytime = $order->groupBy('Dot');
       
        return view('userorder')->with(["order"=>$order,"orderedbytime"=>$orderedbytime]);
    }
}