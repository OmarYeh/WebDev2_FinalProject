@extends('layouts.app')
@section('css')
<link href="{{ asset('css/singularcuisine.css') }}" rel="stylesheet">
<link href="{{ asset('css/foodsearch.css') }}" rel="stylesheet">
<link href="{{ asset('css/homefoodpage.css') }}" rel="stylesheet">

<style>
    .testimage::before{
        background-image: url('{{asset($cuisine->imgsrc)}}');
    }
    
</style>
@endsection
@section('content')
<div class="allsections">
    <div class="toptopsection">
        <div class="testimage" > 
             <p class="cuisinename">{{$cuisine->name}}</p> 
        </div>       
    </div>
    <div class="bottomsection">
        <div class="filters" style="width: 224px;width: 236px;margin-left: 9px;">
                <form method="GET" action="{{ route('cuisine',['id'=>$cuisine->id]) }}" style="height: 400px;border-radius: 16px;width: 100%;background: #e55;">
                <h1 class="title" style="margin-top: 16px;color: white;font-weight: 200;text-align: center;padding-left: 0;">Search Store</h1>
                <div class="formGroup">
                    <label for="query" style="color: white;font-size: 18px;">Search by store name:</label><br>
                    <input type="text" class="formControl" name="query" id="query" value="{{ request()->query('query') }}" style="margin-top: 5px;border: none;height: 27px;" />
                </div>
                               
                <div class="formGroup">
            <label for="diet" style="color: white;font-size: 18px;">Filter by diet:</label><br>   
                    <select class="formControl" name="diet_id" id="diet" style="margin-top: 5px;border: none;height: 27px;background:white;">
                        <option value="" >All diets</option>
                        @foreach($alldiet as $diet)
                            <option value="{{ $diet->id }}" {{ (request()->query('diet') == $diet->id) ? 'selected' : '' }}>{{ $diet->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="display:flex; justify-content:center">
                <button type="submit" class="btn" style="height: 50px;background: white;font-size: 20px;font-weight: 500;">Search</button>
                </div>
            </form>
        </div>
        
        <div class="imagesthings" style="height: 100%;">
            @if (isset($storeresult) && count($storeresult) > 0)
               
                        @foreach($storeresult as $storeresult)
                            @if($storeresult->cuisine_id == $cuisine->id)
                            <div class="imagedish">
                                <a href="{{Route('store',['id'=>$storeresult->id])}}" style="text-decoration: none;color: black;font-weight: 400;">
                                    <img class="imagedishimg"src="{{asset($storeresult->logo)}}" style="width:300px; height:250px; border-radius: 18px;margin-left: 0px;" />
                                    <div class="storeinfo">
                                        <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 27px;margin-bottom: 0px;">{{$storeresult->storeName}}</p>

                                        <p style="font-size: 20px;">{{$storeresult->Location}}</p>
                                    </div>
                                </a>
                            </div>
                            @endif
                        @endforeach
            @elseif (isset($query))
                <p>No results found for '{{ $query }}'</p>
            @endif

        </div>
            
    </div>
</div>
@endsection
