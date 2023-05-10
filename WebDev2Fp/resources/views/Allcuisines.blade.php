@extends('layouts.app')
@section('title', 'Cuisines')
@section('css')
<link href="{{ asset('css/AllC.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="cusmain">
<div class="AllCuisines">
    
    @foreach($cuisines as $obj)
    <a href="{{Route('storeC',['id'=>$obj->id])}}">
        <div class="Cusi" style="background-image:url('{{$obj->imgsrc}}')">
            <p>{{$obj->name}}</p>
        </div>
    </a>
    @endforeach

</div>
<p> Can't seem to dicede!! Why not browse all <a href="#">Store</a>
</div>
@endsection
@section('js')
@endsection