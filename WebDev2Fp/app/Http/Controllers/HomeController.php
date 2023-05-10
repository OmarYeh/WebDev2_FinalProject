<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food;
use App\Models\store;
use App\Models\cuisine;
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
        $food=food::with('getMenu.getstore')->get();
        $cuisine=cuisine::all();
        $store=store::all();
        return view('home')->with(["food"=>$food,"cuisine"=>$cuisine,"store"=>$store]);
    }

    public function search(Request $request){
        $food = food::where('name', 'LIKE', '%'.$request->search.'%')->get();
        $store = store::where('name', 'LIKE', '%'.$request->search.'%')->get();
        return view('search')->with(["food"=>$food,"store"=>$store]);
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
