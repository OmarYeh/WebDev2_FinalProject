@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="storeContainer">
    <div class="AllStores">
        @foreach($stores as $obj)
            
        @endforeach

    </div>
</div>
@endsection
@section('js')
@endsection