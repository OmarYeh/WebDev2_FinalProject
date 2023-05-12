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

    public function index()
    {  
        $user = Auth::user();
        $basket = basket::where('user_id',$user->id)->first();
        $food= $basket->getFood;
        $orderedfood=$food->groupBy('menu_id');

        return view('basket')->with(["basket"=>$basket,"orderedfood"=>$orderedfood]);
    }

    public function createbasket(Request $request)
    {       
        $user = Auth::user();
        $food = food::where('name', $request->input('food_name'))->first();
        $basket=basket::where('user_id',$user->id)->first();
        $order=order::where('user_id',$user->id)->first();
        $basketitems=basketItems::where('food_id',$food->id)->where('basket_id',$basket->id)->first();
        if($basketitems == null)
        {
            $data = new basketItems();
            $data->quantity=$request->input('Quantity');
            $data->food_id = $food->id;
            $data->basket_id=$basket->id;           
            $data->save();
        }
        else{
            $basketitems->quantity =$basketitems->quantity + $request->input('Quantity');
            $basketitems->save();
        }


        return Redirect::route('basket');
    }

    public function clearbasketitem()
    {
        return "ok";
    }

    public function updatebasket($id,Request $request)
    {    
        $user= Auth::user();
        $basket = basket::where('user_id',$user->id)->first();
        $basketitems=basketItems::where('food_id',$id)->where('basket_id',$basket->id)->first();
        $basketitems->quantity =  $request->input('Quantity') ;
        $basketitems->save();
        return Redirect::route('basket');
    }
}
