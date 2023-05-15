<?php

namespace App\Http\Controllers;

use App\Models\food;
use App\Models\cuisine;
use App\Models\offer;
use App\Models\diet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FoodController extends Controller
{
    
    public function searchFood(Request $request) {
        $allcuisine = cuisine::All();
        $alldiet = diet::All();
        $offer=offer::all(); 
        $query = $request->input('query');
        $cuisine_id = $request->input('cuisine_id');
        $diet_id = $request->input('diet_id');
        $priceRange = $request->input('PriceRange');

        $foods = food::where('name', 'like', '%' . $query . '%');
        
        if ($cuisine_id) {
            $foods->where('cuisine_id', $cuisine_id);
        }
        
        if ($diet_id) {
            $foods->where('diet_id', $diet_id);
        }

        switch ($priceRange) {
            case 10:
                $foods->where('price', '<=', 10);
                break;
            case 15:
                $foods->where('price', '<=', 15);
                break;
            case 20:
                $foods->where('price', '<=', 20);
                break;
            case 25:
                $foods->where('price','<=', 25);
                break;
            case 30:
                $foods->where('price', '<=', 30);
                break;
            case 35:
                $foods->where('price', '<=', 35);
                break;
            case 40:
                $foods->where('price', '<=', 40);
                break;
            case 45:
                $foods->where('price', '<=', 45);
                break;
            case 50:
                $foods->where('price', '<=', 50);
                break;
            case 55:
                $foods->where('price', '<=', 55);
                break;
            case 60:
                $foods->where('price', '<=', 60);
                break;
            case 65:
                $foods->where('price', '<=', 65);
                break;
            case 70:
                $foods->where('price', '<=', 70);
                break;
            case 75:
                $foods->where('price', '<=', 75);
                break;
            case 80:
                $foods->where('price', '<=', 80);
                break;
            case 85:
                $foods->where('price', '<=', 85);
                break;
            case 90:
                $foods->where('price','<=', 90);
                break;
            case 95:
                $foods->where('price', '<=', 95);
                break;
            case 100:
                $foods->where('price', '>', 95);
                break;
            default:          
                break;
        }
        
        $food = $foods->get();

        return view('foodSearch')->with(['food'=>$food,'allcuisine'=>$allcuisine,'alldiet'=>$alldiet,'offer'=>$offer]);
    }
}
