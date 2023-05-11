<?php

namespace App\Http\Controllers;

use App\Models\food;
use App\Models\cuisine;
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
        $query = $request->input('query');
        $cuisine_id = $request->input('cuisine_id');
        $diet_id = $request->input('diet_id');
        
        $foods = food::where('name', 'like', '%' . $query . '%');
        
        if ($cuisine_id) {
            $foods->where('cuisine_id', $cuisine_id);
        }
        
        if ($diet_id) {
            $foods->where('diet_id', $diet_id);
        }
        
        $food = $foods->get();
        
        return view('foodSearch')->with(['food'=>$food,'allcuisine'=>$allcuisine,'alldiet'=>$alldiet]);
    }
}
