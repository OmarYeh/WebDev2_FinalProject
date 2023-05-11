@extends('layouts.app')
@section('title', 'Basket')
@section('css')
<link href="{{ asset('css/basket.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="backbackgroundarea">
    <div class="backgroundarea">
        <p class="baskettitle">Your Basket:</p>
        <div class="basketitemsborder">
            <div class="basketitems">
                
            </div>
        </div>
    </div>
</div>

@endsection