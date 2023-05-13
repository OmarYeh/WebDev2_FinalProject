@extends('layouts.dashboardStore')
@section('content')
<div class="conatiner">
<div class="allfoods">
<p>{{ auth()->user()->getStore->storeName }}</p>
<div class="Allplat">
    <h1>Plat De jour</h1>
    @foreach($foodP as $obj)
    <img src="{{asset($obj->imgsrc)}}"/>
    {{$obj}}
    <form method="post" action="{{route('deletePlat',['id'=>$obj->id])}}">
            @csrf
            @method('put')
            <button type="submit">delete</button>
    </form>
    @endforeach
</div>
<div class="AddFood">
    @foreach($store->getMenu->getFood as $obj)
    @if($obj->platdujour == 0)
        <img src="{{asset($obj->imgsrc)}}" />    
    {{$obj}}
    <form method="post" action="{{route('addPlat',['id'=>$obj->id])}}">
            @csrf
            @method('put')
            <button type="submit">add</button>
    </form>
    <form method="post" action="{{route('deletePlat',['id'=>$obj->id])}}">
            @csrf
            @method('put')
            <button type="submit">delete</button>
    </form>
    @endif
    @endforeach
</div>

</div>
<script>
$(document).ready(function() {
  var currentPage = window.location.pathname.split('/').pop();
  $('.sd').each(function() {
    if ($(this).data('page') === currentPage) {
      $(this).addClass('clicked');
    }
  });
});
    history.pushState(null, null, '/Store/Dashboard');

    </script>
</div>
@endsection