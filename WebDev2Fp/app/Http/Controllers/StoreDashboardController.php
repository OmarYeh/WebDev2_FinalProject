<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\menu;
use App\Models\store;
use App\Models\food;
use App\Models;
class StoreDashboardController extends Controller
{
    public function index(){
        $userid = Auth::id();
        $store = store::where(['user_id'=>$userid])->first();
        $menu =$store->getMenu;
        return view('dashboardStore')->with(['store'=>$store,'menu'=>$menu]);
    }

    public function analysis(){
        $userid = Auth::id();
        $store = store::where(['user_id'=>$userid])->first();
        return view('StoreDashboad.SDanalytc')->with('store',$store);
    }

    public function menu(){
        $userid = Auth::id();
        $store = store::where(['user_id'=>$userid])->first();
        $category = category::all();
        $cuisine = cuisine::all();
        $diet = diet::all();
        return view('StoreDashboad.SDmenu')->with(['store'=>$store,'cuisine'=>$cuisine,'diet'=>$diet]);
    }

    public function platdejour(){
        return view('StoreDashboad.SDplat');
    }

    public function offer(){

    }
}
