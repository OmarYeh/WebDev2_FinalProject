<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cuisine;
use App\Models\store;
use App\Models\menu;
use App\Models\User;
use App\Models\userroles;
use App\Models\role;
use App\Models\review;
use Illuminate\Support\Facades\Auth;
class storeController extends Controller
{
    public function index($id){
        $store = store::find($id);
        $user_id = Auth::id();
        $user = User::find($user_id);
        $reviews = $store->getReviews;
        $foodP = $store->getMenu->getfood->where('platdujour',1);
        return view('store')->with('store',$store)->with('reviews',$reviews)->with('foodP',$foodP)->with('user', $user);
    }
    public function AllStores(){
        $stores = store::all();
        return view('Allstores')->with('stores',$stores);
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
            'cuisine'=>'required',
            'logo'=>'required'
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

        $filenamel= time().'.'.$request->file('logo')->getClientOriginalExtension();
        $request->file('logo')->storeAs('public/images',$filenamel);
        $tosave2= 'storage/images/'.$filenamel;
        $store->logo=$tosave2;
        $store->user_id=Auth::id();
        $store->cuisine_id=$request->cuisine;
        $store->save();
        $menu = new menu();
        $menu->store_id = $store->id;
        $menu->save();
        $userroles = new userroles();
        $userroles->user_id = Auth::id();
        $role = role::where('name','Cook')->first();
        $userroles->role_id = $role->id;
        $userroles->save();
        return view('regisPending')->with('store',$store);
    }

    public function pendingS(){
        $store = Auth::user()->getstore;
        return view('pending')->with('store',$store);
    }
    public function deleteReview($id){
         $review= review::find($id);
         $review->delete();
         return back();
    }
    
}
