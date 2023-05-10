<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food;
use App\Models\store;
use App\Models\cuisine;
use App\Models\menu;

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
        
        return view('home')->with(["food"=>$food,"cuisine"=>$cuisine,"store"=>$store,"menu"=>$menu]);
    }

    public function search(Request $request){
        $food = food::where('name', 'LIKE', '%'.$request->search.'%')->get();
        return view('search')->with(["food"=>$food]);
    }

    public function foodinfo($id){
        $data=food::find($id);
        $alldata=food::all();
        $cuisine = cuisine::find($data->cuisine_id);
        return view('food')->with(["food"=>$data,"cuisine"=>$cuisine,"alldata"=>$alldata]);
    }

    public function cuisineinfo($id){
        $data=cuisine::find($id);
        return view('cuisine')->with("cuisine",$data);
    }
    public function storeinfo($id){
        $data=store::find($id);
        return view('store')->with("store",$data);
    }

}
