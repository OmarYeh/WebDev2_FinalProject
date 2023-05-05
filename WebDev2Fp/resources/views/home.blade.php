@extends('layouts.app')
@section('content')



    <div class="homeimage">
        <div class="imagebox">
            <p class="titleimagebox">Meals delivered in a fingertip.</p>
            <p class="textimagebox">From our local chefs right to your doorstep all within a day.</p>
            <form class="searchbox">
                <svg class="sc-fXoxut sc-ftEBqf bLSmTI fjClFW" aria-hidden="true" focusable="false" data-prefix="far"  role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" x="0px" y="0px" width="50" height="50"><path fill="currentColor" d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z" style="overflow: visible;box-sizing: content-box;"></path></svg>
                <input class="input" type="text" placeholder="Search for your product" value="">
                <button class="buttoninput" >Find Food</button>
            </form>
        </div>
    </div>


@endsection
