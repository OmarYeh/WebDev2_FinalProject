<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\food;
use App\Models\diet;
use App\Models\cuisine;
use App\Models\store;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
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

    public function searchStoresNearby(Request $request){
       
        $cuisine = Cuisine::all();
    $alldiet = Diet::all();
    $lat = floatval($request->lat);
    $lng = floatval($request->lng);
    $radius = 10;

    $stores = Store::selectRaw('*, X(point) as longitude, Y(point) as latitude')
        ->where('cuisine_id', $request->id)
        ->get();

        function distanceCalculation($lat1, $lon1, $lat2, $lon2, $decimals = 2)
        {
            $earthRadius = 6371; // Radius of the Earth in kilometers
    
            $lat1Rad = deg2rad($lat1);
            $lon1Rad = deg2rad($lon1);
            $lat2Rad = deg2rad($lat2);
            $lon2Rad = deg2rad($lon2);
    
            $deltaLon = $lon2Rad - $lon1Rad;
    
            $numerator1 = cos($lat2Rad) * sin($deltaLon);
            $numerator2 = cos($lat1Rad) * sin($lat2Rad) - sin($lat1Rad) * cos($lat2Rad) * cos($deltaLon);
            $numerator = sqrt($numerator1 * $numerator1 + $numerator2 * $numerator2);
    
            $denominator = sin($lat1Rad) * sin($lat2Rad) + cos($lat1Rad) * cos($lat2Rad) * cos($deltaLon);
    
            $centralAngle = atan2($numerator, $denominator);
    
            $distance = $earthRadius * $centralAngle;
    
            return round($distance, $decimals);
        }
    
        $nearstore = new Collection();
        foreach ($stores as $obj) {
            $storeLat = floatval($obj->latitude);
            $storeLng = floatval($obj->longitude);
            $distance = distanceCalculation($lat, $lng, $storeLat, $storeLng);
    
            if ($distance <= $radius) {
                $nearstore->push($obj);
            }
        }
    

       

        /*$results = $stores->filter(function ($store) use ($lat, $lng, $radius) {
            $storeLat = $store->latitude;
            $storeLng = $store->longitude;
            $distance = distanceCalculation($storeLat, $storeLng, $lat, $lng);
            
            return $distance <=  $radius;
        });*/
        $store=store::all();
        $cuisine=cuisine::find($request->id);
        return view('cuisine')->with(["store"=>$store,"cuisine"=>$cuisine,'storeresult'=>$nearstore,'alldiet'=>$alldiet]);


    }


   
}
