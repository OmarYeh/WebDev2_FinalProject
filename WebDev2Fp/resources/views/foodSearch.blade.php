@extends('layouts.app')
@section('title', 'SearchFood')
@section('content')
@section('css')
<link href="{{ asset('css/foodsearch.css') }}" rel="stylesheet">
@endsection
<div class="contains">

    

    <form method="GET" action="{{ route('searchFood') }}">
        <h1 class="title">Search Food</h1>
        <div class="formGroup">
            <label for="query">Search by food name:</label><br>
            <input type="text" class="formControl" name="query" id="query" value="{{ request()->query('query') }}" />
        </div>
        
        <div class="formGroup">
            <label for="cuisine">Filter by cuisine:</label><br>
            <select class="formControl" name="cuisine_id" id="cuisine">
                <option value="">All cuisines</option>
                @foreach($allcuisine as $cuisine)
                    <option value="{{ $cuisine->id }}" {{ (request()->query('cuisine') == $cuisine->id) ? 'selected' : '' }}>{{ $cuisine->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="formGroup">
    <label for="diet">Filter by diet:</label><br>   
            <select class="formControl" name="diet_id" id="diet">
                <option value="">All diets</option>
                @foreach($alldiet as $diet)
                    <option value="{{ $diet->id }}" {{ (request()->query('diet') == $diet->id) ? 'selected' : '' }}>{{ $diet->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn">Search</button>
    </form>

    <div class="searchResult">
    <h2>Search Results</h2>

    @if (isset($food) && count($food) > 0)
        <p>Showing results for '{{ request()->query('query') }}'</p>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Cuisine</th>
                    <th>Diet</th>
                </tr>
            </thead>
            <tbody>
                @foreach($food as $food_item)
                    <tr>
                        <td><a href="{{Route('food',$food_item->id)}}">{{ $food_item->name }}</td>
                        <td>{{ $food_item->getCuisine->name}}</td>
                        <td>{{ $food_item->getDiet->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif (isset($query))
        <p>No results found for '{{ $query }}'</p>
    @endif

</div>
</div>
@endsection