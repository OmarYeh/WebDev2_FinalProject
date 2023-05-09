<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cuisine;
class CuisineController extends Controller
{
    public function AllCuisines(){

        $cuisines= cuisine::all();
        return view('Allcuisines')->with('cuisines',$cuisines);
    }
}
