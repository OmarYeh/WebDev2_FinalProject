<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\menu;
class StoreDashboardController extends Controller
{
    public function index(){
        return view('dashboardStore');
    }

    public function analysis(){
        return view('StoreDashboad.SDanalytc');
    }

    public function menu(){
        $user = Auth::user(); 
        return view('StoreDashboad.SDmenu')->with('user',$user );
    }

    public function platdejour(){
        return view('StoreDashboad.SDplat');
    }

    public function offer(){

    }
}
