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
use App\Models\order;
use App\Models\User;
use App\Models\role;
use App\Models\userroles;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


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
        $category = category::All();
        $cuisine = cuisine::all();
        $diet = diet::all();
        return view('StoreDashboad.SDmenu')->with(['store'=>$store,'cuisine'=>$cuisine,'diet'=>$diet,'category'=>$category]);
    }
    public function getStores(){
        $stores=store::all();
        return view('StoreDashboad.SDAdminControl')->with('stores',$stores);
    }
      public function approveStatus(Request $request, $id){
           
           $store = store::find($id);
           $store->status = 'approved';
           $store->approved_at = Carbon::now();
           $store->save();

        return redirect()->back();
      }

      public function rejectStatus(Request $request){
        $store_id = $request->input('id');
        $store = store::find($store_id);
        $store->status = 'Rejected';
        $store->save();

     return redirect()->back();
      }
      
      public function deleteStore($id){

        $data= store::find($id);
        $data->delete();
        return redirect()->route('controls');

      }

      public function userControls(){
        $users = User::All();
        return view('StoreDashboad.SDAdminUserControl')->with('users',$users);
      }
      public function deleteUser($id){

        $data= user::find($id);
        $data->delete();
        return redirect()->route('userControls');

      }
      public function editpage($id){
        $user = User::find($id);
        $allroles = role::All();
        return view('StoreDashboad.SDAdminUserDetails')->with('user' , $user)->with('allroles' , $allroles);
      }
     public function editUser(Request $request, $id){
        
         $user = User::find($id);
         $user->fill($request->all());
         if($user->isClean()){
             return ('userControls');
         }
         $user->name = $request->input('name');
         $user->email = $request->input('mail');
         $user->gender = $request->input('gender');
         $user->password = $request->input('password');

         $userrole = new userroles();
         $userrole->user_id = $id;
         $userrole->role_id = $request->input('role');

         $user->save();
         $userrole->save();
         return redirect()->route('userControls');
     }
    public function platdejour(){
        $userid = Auth::id();
        $store = store::where(['user_id'=>$userid])->first();
        $foodP = $store->getMenu->getfood->where('platdujour',1);
        return view('StoreDashboad.SDPlatdejur')->with(['store'=>$store,'foodP'=>$foodP]);
    }
    public function addplat($id){
        $food= food::find($id);
        $food->platdujour = 1;
        $food->save();
        return redirect()->route('sdplatdujour');
    }

    public function deleteplat($id){
        $food= food::find($id);
        $food->platdujour = 0;
        $food->save();
        return redirect()->route('sdplatdujour');
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
        if($request->platdujour){
            $food->platdujour = $request->platdujour;
        }
        $food->save();
        return redirect()->route('sdindexMenu');
    }

    public function deleteItem($id){
        $food = food::where('id',$id)->first();
        $food->delete();
        return redirect()->route('sdindexMenu');
    }
    public function updateItem($id){
        $store = store::where(['user_id'=>Auth::id()])->first();
        $food = food::find($id);
        $category = category::all();
        $cuisine = cuisine::all();
        $diet = diet::all();
        return view('StoreDashboad.updateItem')->with(['store'=>$store,'food'=>$food,'cuisine'=>$cuisine,'diet'=>$diet,'category'=>$category]);
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
            return redirect()->route('updateItem',['id'=>$id])->withErrors($validator);
        }
        
        $food = food::find($id);
        $food->name = $request->name ;
        $food->price = $request->price ;
        $food->cuisine_id = $request->cuisine ;
        $food->diet_id = $request->diet ;
        $food->category_id = $request->category ;
        $filename= time().'.'.$request->file('imgsrc')->getClientOriginalExtension();
        $request->file('imgsrc')->storeAs('public/images',$filename);
        $tosave= 'storage/images/'.$filename;
        $food->imgsrc=$tosave;
        if($request->platdujour){
            $food->platdujour = $request->platdujour;
        }
        else{
            $food->platdujour = 0;
        }
        $food->save();
        return redirect()->route('sdindexMenu');
    }

    public function deleteOffer($id){
        $offer = offer::find($id);
        $offer->delete();
        return redirect()->route('sdindexOffers');
    }

    public function order(){
        $userid = Auth::id();
        $store = store::where(['user_id'=>$userid])->first();
        $dorder = $store->getOrders()->where('statues','approved')
        ->orwhere('statues','pending')
        ->orwhere('statues','rejected')
        ->get();
        return view('StoreDashboad.SDorders')->with(['store'=>$store,'orders'=>$dorder]);
    }

    public function approve($id){
        $order = order::find($id);
        $order->statues = 'approved';
        $order->save();
        return redirect()->route('sdindexOrders');
    }

    public function reject($id){
        $order = order::find($id);
        $order->statues = 'rejected';
        $order->save();
        return redirect()->route('sdindexOrders');
    }

    public function Delivery(){
        $userid = Auth::id();
        $store = store::where(['user_id'=>$userid])->first();
        $dorder = $store->getOrders()->where('statues','approved')
        ->orwhere('statues','delivering')
        ->orwhere('statues','delivered')
        ->orwhere('statues','canceled')
        ->get();;
        return view('StoreDashboad.SDmangd')->with(['store'=>$store,'orderA'=>$dorder]);
    }

    public function UpdateStatus($id,$status){
        $order = order::find($id);
        $order->statues = $status;
        $order->save();
        return redirect()->route('sdindexManageDe');
    }

}
