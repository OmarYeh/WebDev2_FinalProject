<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food;
use App\Models\store;
use App\Models\cuisine;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request){
        $query = $request->input('query');
        $food = food::where('name', 'LIKE', '%'.$query.'%')->get();
        $store = store::where('name', 'LIKE', '%'.$query.'%')->get();
        return view('search', compact('food', 'store'));
    }

    public function GetCuisines($id,Request $request){
        $query = $request->
        $cuisine = cuisine::where('name', 'LIKE', '%'.$query.'%')->get();
    }
}
