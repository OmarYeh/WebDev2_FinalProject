<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\food;
use App\Models\store;
use App\Models\cuisine;
use App\Models\menu;
use App\Models\User; 
use App\Models\basket;
use App\Models\offer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $menu=menu::all();
        $food=food::all();
        $cuisine=cuisine::all();
        $store=store::all();
        $offer=offer::all();      
        return view('home')->with(["food"=>$food,"cuisine"=>$cuisine,"store"=>$store,"menu"=>$menu,"offer"=>$offer]);
    }

   

    public function foodinfo($id){
        $data=food::find($id);
        $alldata=food::all();
        $cuisine = cuisine::find($data->cuisine_id);
        $store=store::find($data->store_id);
        $userId = auth()->id();
        $offer=offer::all();
        return view('food')->with(["food"=>$data,"cuisine"=>$cuisine,"alldata"=>$alldata,"store"=>$store,"userId"=>$userId,"offer"=>$offer]);
    }

    
    public function storeinfo($id){
        $data=store::find($id);
        return view('store')->with("store",$data);
    }

}
