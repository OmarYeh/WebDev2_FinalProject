<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\review;
use Illuminate\Support\Facades\Auth;
use App\Models\store;
use Illuminate\Support\Facades\Redirect;
class ReviewController extends Controller
{
    
    public function review(Request $request){
        $user_id = Auth::id();
        $store_id = $request->input('store_id');
        $store = 
        $review =  new review();
        $review->title = $request->input('title');
        $review->content = $request->input('content');
        $review->rating = $request->input('rating');
        $review->user_id = $user_id;
        $review->store_id = $store_id;

        $review->save();

        return Redirect::route('store',['id'=> $store_id] );
    }
}
