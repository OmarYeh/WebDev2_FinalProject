<?php

namespace App\Http\Controllers;

use App\Models\food;
use App\Models\store;
use App\Models\cuisine;
use App\Models\menu;
use App\Models\order;
use App\Models\User;
use App\Models\basket;
use App\Models\basketItems;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class BasketController extends Controller
{
    public function index($id)
    {  
        
        $basket = basket::where('user_id',$id)->first();
        $basketitems=basketItems::where('basket_id',$basket->id);
        return view('basket')->with(["basket"=>$basket,"basketitems"=>$basketitems]);
    }

    public function createbasket(Request $request)
    {       
        $user = Auth::user();
        $food = food::where('name', $request->input('food_name'))->first();
        $basket=basket::where('user_id',$user->id)->first();
        $order=order::where('user_id',$user->id)->first();
        $data = new basketItems();
        $data->quantity=$request->input('Quantity');
        $data->food_id = $food->id;
        $data->basket_id=$basket->id;
        $data->order_id=$order->id;
        $data->save();

        $basket = basket::where('user_id',$user->id)->first();
        $basketitems=basketItems::where('basket_id',$basket->id);

        return Redirect::route('basket',['id' => $user->id]);

    }

    public function clearbasket()
    {

    }

    public function updatebasket()
    {

    }
}
