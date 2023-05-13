@extends('layouts.dashboardStore')
@section('content')
<div class="conatiner">
    <div class="orders">
        @foreach($orderA as $obj)
            <p>Cleint :{{$obj->getUser->id}}</p>
            <p>{{ gmdate('H:i:s l, F j, Y', strtotime($obj->Dot)) }}</p>
        @if($obj->statues == "approved")
        <form method="post" action="{{route('updateSD',['id'=>$obj->id,'status'=>'delivering'])}}">
            @csrf
            @method('put')
            <button type="submit">delivering</button>
        </form>
        <form method="post" action="{{route('updateSD',['id'=>$obj->id,'status'=>'canceled'])}}">
            @csrf
            @method('put')
            <button type="submit">canceled</button>
        </form>
        @elseif($obj->statues == "delivering")
        <div class="loop-wrapper">
                <div class="mountain"></div>
                 <div class="hill"></div>
                 <div class="tree"></div>
                 <div class="tree"></div>
                 <div class="tree"></div>
                 <div class="rock"></div>
                 <div class="truck"></div>
                 <div class="wheels" style="width: 121px;height: 8px;"></div>
                 <div class="wheels" style="height: 8px;width: 148px;"></div>
         </div> 
         <p style="font-size: 23px; color:#c5ffb1;font-weight: 900;margin-left: 5px;">{{$obj->statues}}</p>
         <form method="post" action="{{route('updateSD',['id'=>$obj->id,'status'=>'canceled'])}}">
            @csrf
            @method('put')
            <button type="submit">canceled</button>
        </form>
        <form method="post" action="{{route('updateSD',['id'=>$obj->id,'status'=>'delivered'])}}">
            @csrf
            @method('put')
            <button type="submit">delivered</button>
        </form>
         @elseif($obj->statues == "delivered")
         <img src="https://img.icons8.com/officel/40/checked-truck.png"  style="height: 35px;  margin-left:6px;"/>
         <p style="font-size: 23px; color:#05ff05;font-weight: 900;margin-left: 5px;">{{$obj->statues}}</p> 
         @elseif($obj->statues == "canceled")
           <img src="https://img.icons8.com/stickers/100/close-window--v1.png"  style="height: 35px;  margin-left:6px;"/>
        <p style="font-size: 23px; color:#480606;font-weight: 900;margin-left: 5px;">{{$obj->statues}}</p>
    @endif
        @foreach($obj->getfood as $food)
        <p>{{$food->name}}</p>
        <p>{{$food->pivot->quantity}}</p>
     
        @endforeach
        @endforeach

    </div>
</div>
<script>
     history.pushState(null, null, '/Store/Dashboard');
$(document).ready(function() {
  var currentPage = window.location.pathname.split('/').pop();
  $('.sd').each(function() {
    if ($(this).data('page') === currentPage) {
      $(this).addClass('clicked');
    }
  });
});
   

    </script>
</div>
@endsection
