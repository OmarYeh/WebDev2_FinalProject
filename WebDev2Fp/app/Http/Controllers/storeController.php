<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cuisine;
use App\Models\store;
use App\Models\menu;
use Illuminate\Support\Facades\Auth;
class storeController extends Controller
{
    public function index($id){
        $store = store::find($id);
        return view('store')->with('store',$store);
    }

    public function RegisterStore(){
        $allcuisines = cuisine::all();
        return view('RegisterStore')->with('allcuisine',$allcuisines);
    }

    public function store(Request $request){
        $request->validate([
            'storeName'=>'required|min:4',
            'Location'=>'required|min:6',
            'Description'=>'required|min:120|max:1200',
            'phone_number'=>'required|numeric|min:11',
            'opened'=>'required|integer|min:4',
            'imgsrc'=>'required',
            'cuisine'=>'required'
        ]);

        $store =  new store();
        $store->storeName =$request->storeName;
        $store->Location =$request->Location;
        $store->Description =$request->Description;
        $store->phone_number =$request->phone_number;
        $store->opened =$request->opened;
        $filename= time().'.'.$request->file('imgsrc')->getClientOriginalExtension();
        $request->file('imgsrc')->storeAs('public/images',$filename);
        $tosave= 'storage/images/'.$filename;
        $store->imgsrc=$tosave;
        $store->user_id=Auth::id();
        $store->cuisine_id=$request->cuisine;
        $store->save();
        $menu = new menu();
        $menu->store_id = $store->id;
        $menu->save();
        return "ok";
    }
}
