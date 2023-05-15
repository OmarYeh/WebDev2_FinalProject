<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\food;
use App\Models\diet;
use App\Models\cuisine;
use App\Models\store;
class CuisineController extends Controller
{
    public function AllCuisines(){

        $cuisines= cuisine::all();
        return view('Allcuisines')->with('cuisines',$cuisines);
    }
    public function cuisineinfo($id,Request $request){     
        $alldiet = diet::All();
        $query = $request->input('query');
        $diet_id = $request->input('diet_id');
        
        $stores = store::where('storeName', 'like', '%' . $query . '%');
    
        
        
        if ($diet_id) {
            $stores->getMenu->getFood->where('cuisine_id', $cuisine_id);

        }
        
        $storeresult = $stores->get();

        $cuisine=cuisine::find($id);
        $store=store::all();
        return view('cuisine')->with(["store"=>$store,"cuisine"=>$cuisine,'storeresult'=>$storeresult,'alldiet'=>$alldiet]);
    }
   
}
