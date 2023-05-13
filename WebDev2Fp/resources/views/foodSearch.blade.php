@extends('layouts.app')
@section('title', 'SearchFood')
@section('content')
@section('css')
<link href="{{ asset('css/foodsearch.css') }}" rel="stylesheet">
<link href="{{ asset('css/homefoodpage.css') }}" rel="stylesheet">

@endsection
<div class="contains">

    

    <form method="GET" action="{{ route('searchFood') }}">
        <h1 class="title" style="color: white;">Search Food</h1>
        <div class="formGroup">
            <label for="query" style="color: white;">Search by food name:</label><br>
            <input type="text" class="formControl" name="query" id="query" value="{{ request()->query('query') }}" />
        </div>
        
        <div class="formGroup">
            <label for="cuisine" style="color: white;">Filter by cuisine:</label><br>
            <select class="formControl" name="cuisine_id" id="cuisine">
                <option value="">All cuisines</option>
                @foreach($allcuisine as $cuisine)
                    <option value="{{ $cuisine->id }}" {{ (request()->query('cuisine') == $cuisine->id) ? 'selected' : '' }}>{{ $cuisine->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="formGroup">
    <label for="diet" style="color: white;">Filter by diet:</label><br>   
            <select class="formControl" name="diet_id" id="diet">
                <option value="">All diets</option>
                @foreach($alldiet as $diet)
                    <option value="{{ $diet->id }}" {{ (request()->query('diet') == $diet->id) ? 'selected' : '' }}>{{ $diet->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="display:flex; justify-content:center;">
            <button type="submit" class="btn">Search</button>
        </div>
    </form>

    <div class="searchResult">
    <h2>Search Results</h2>

    @if (isset($food) && count($food) > 0)
        <p>Showing results for " {{ request()->query('query') }} "</p>
            <div class="dishescards">
                @foreach($food as $food_item)  
                      <div class="imagedish" style="  display: flex;">
                                <a href="{{Route('food',['id'=>$food_item->id])}}" style="color: black;font-weight: 400; text-decoration: none;">
                                    <img class="imagedishimg" src="{{asset($food_item->imgsrc)}}" style="" />
                                    <div class="productinfo" style="gap: 40px;justify-content: center;display: flex;align-items: center;">
                                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 27px;  max-width: 100px;max-height: 157px;}">{{ $food_item->name }}</p>
                                            <p style="font-weight:300;">{{ $food_item->getMenu->getStore->storeName}}</p>
                                            <p style="font-size: 24px;">${{ $food_item->price}}</p>
                                        </div>
                                </a>
                            </div>                     
                @endforeach
            </div>
    @elseif (isset($query))
        <p>No results found for " {{ $query }} "</p>
    @endif

</div>
</div>
@endsection