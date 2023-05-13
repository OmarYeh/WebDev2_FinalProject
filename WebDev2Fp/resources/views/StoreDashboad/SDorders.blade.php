@extends('layouts.dashboardStore')
@section('content')
<div class="conatiner">
    <div class="orders">
        @foreach($orders as $obj)
            <p>Cleint :{{$obj->getUser->id}}</p>
            <p>{{ gmdate('H:i:s l, F j, Y', strtotime($obj->Dot)) }}</p>
        @if($obj->statues == "pending")
        <form method="post" action="{{route('appOr',['id'=>$obj->id])}}">
            @csrf
            @method('put')
            <button type="submit">Approve</button>
        </form>
        <form method="post" action="{{route('rejOr',['id'=>$obj->id])}}">
            @csrf
            @method('put')
            <button type="submit">Reject</button>
        </form>
        @elseif($obj->statues == "approved")
            <p>approved</p>
            <img src="https://img.icons8.com/office/40/checked--v1.png" style="width=25px; height:25px; margin-left:6px;"/>
             <p style="font-size: 23px; color:rgb(121, 215, 135);font-weight: 900;margin-left: 5px;">{{$obj->statues}}</p>
        @elseif($obj->statues == "rejected")
            <img src="https://img.icons8.com/fluency/48/stop-sign.png"  style="height: 35px; margin-left:6px;"/>
            <p style="font-size: 23px; color:rgb(249, 196, 196);font-weight: 900;margin-left: 5px;">{{$obj->statues}}</p>
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
