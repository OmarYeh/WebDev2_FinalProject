<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\menu;
use App\Models\store;
use App\Models\food;
use App\Models\category;
use App\Models\diet;
use App\Models\cuisine;
use App\Models\offer;
use App\Models\offerfood;
use Illuminate\Support\Facades\Validator;

class StoreDashboardController extends Controller
{
    public function index(){
        $userid = Auth::id();
        $store = store::where(['user_id'=>$userid])->first();
        $menu =$store->getMenu;
        return view('StoreDashboad.SDanalytc')->with(['store'=>$store,'menu'=>$menu]);
    }

    public function analysis(){
        $userid = Auth::id();
        $store = store::where(['user_id'=>$userid])->first();
        $menu =$store->getMenu;
        return view('StoreDashboad.SDanalytc')->with(['store'=>$store,'menu'=>$menu]);
    }

    public function menu(){
        $userid = Auth::id();
        $store = store::where(['user_id'=>$userid])->first();
        $category = category::all();
        $cuisine = cuisine::all();
        $diet = diet::all();
        return view('StoreDashboad.SDmenu')->with(['store'=>$store,'cuisine'=>$cuisine,'diet'=>$diet,'category'=>$category]);
    }

    public function platdejour(){
        return view('StoreDashboad.SDplat');
    }

    public function offer(){
        $user = Auth::user();
        $store = $user->getStore;
        return view('StoreDashboad.SDoffers')->with('store',$store);
    }

    public function storeoffer(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'newPrice' => 'required|integer',
            'imgsrc' => 'required',
            
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('sdindexOffers')->withErrors($validator);
        } 
        $store = Auth::user()->getstore;
        $offer = new offer();
        $offer->name=$request->name;
        $offer->newPrice = $request->newPrice;
        $filename= time().'.'.$request->file('imgsrc')->getClientOriginalExtension();
        $request->file('imgsrc')->storeAs('public/images',$filename);
        $tosave= 'storage/images/'.$filename;
        $offer->imgsrc=$tosave;
        $offer->store_id=$store->id;
        $offer->save();
        return redirect()->route('sdindexOffers');
    }

    public function addFoodTooffer(Request $request){
        $offer = offer::find($request->offerId);
        $offerfoods = $offer->getfood;
        foreach($request->foodIds as $food){
            $found = false;
            foreach($offerfoods as $obj){
                if($obj->id == $food){
                    $found = true;
                    break;
                }
            }
            if(!$found){
                $offerfood = new offerfood();
                $offerfood->offer_id = $request->offerId;
                $offerfood->food_id = $food; 
                $offerfood->save();
            }
        }
        return redirect()->route('sdindexOffers');
    }
    public function store($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'price' => 'required|numeric',
            'imgsrc' => 'required',
            'cuisine' => 'required',
            'diet' => 'required',
            'category' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('sdindexMenu')->withErrors($validator);
        }
        
        $food = new food();
        $food->name = $request->name ;
        $food->price = $request->price ;
        $food->cuisine_id = $request->cuisine ;
        $food->diet_id = $request->diet ;
        $food->category_id = $request->category ;
        $food->menu_id = $id; 
        $filename= time().'.'.$request->file('imgsrc')->getClientOriginalExtension();
        $request->file('imgsrc')->storeAs('public/images',$filename);
        $tosave= 'storage/images/'.$filename;
        $food->imgsrc=$tosave;
        $food->save();
        return redirect()->route('sdindexMenu');
    }

    public function deleteItem($id){
        $food = food::where('id',$id)->first();
        $food->delete();
        return redirect()->route('sdindexMenu');
    }
    public function updateItem($id){
        $food = food::find($id);
        $category = category::all();
        $cuisine = cuisine::all();
        $diet = diet::all();
        return view('StoreDashboad.updateItem')->with(['food'=>$food,'cuisine'=>$cuisine,'diet'=>$diet,'category'=>$category]);
    }

    public function update($id,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'price' => 'required|numeric',
            'imgsrc' => 'required',
            'cuisine' => 'required',
            'diet' => 'required',
            'category' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('sdindexMenu')->withErrors($validator);
        }
        
        $food = new food();
        $food->name = $request->name ;
        $food->price = $request->price ;
        $food->cuisine_id = $request->cuisine ;
        $food->diet_id = $request->diet ;
        $food->category_id = $request->category ;
        $food->menu_id = $id; 
        $filename= time().'.'.$request->file('imgsrc')->getClientOriginalExtension();
        $request->file('imgsrc')->storeAs('public/images',$filename);
        $tosave= 'storage/images/'.$filename;
        $food->imgsrc=$tosave;
        $food->save();
        return redirect()->route('sdindexMenu');
    }
    public function deleteOffer($id){
        $offer = offer::find($id);
        $offer->delete();
        return redirect()->route('sdindexOffers');
    }

}
