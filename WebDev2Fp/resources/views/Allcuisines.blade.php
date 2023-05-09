@extends('layouts.app')
@section('title', 'Cuisines')
@section('css')
<link href="{{ asset('css/AllC.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="AllCuisines">
    
    @foreach($cuisines as $obj)
        <div class="Cusi" style="background-image:url('{{$obj->imgsrc}}')">
            <p>{{$obj->name}}</p>
        </div>
    @endforeach
</div>
@endsection
@section('js')
@endsection