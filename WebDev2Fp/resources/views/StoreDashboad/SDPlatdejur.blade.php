@extends('layouts.dashboardStore')
@section('content')
<div class="conatiner" style="margin: 0;width: 100%;overflow:hidden">
<p style="text-align:center;margin-top:20px;font-size:40px;font-weight:600;margin-bottom: 62px;">Plat De jour</p>

<div class="allfoods" style="display:flex;margin-top:40px;">
  <div class="Allplat" style="width: 50%;overflow-y: scroll;max-height: 600px;">

    <div class="fooooood" style="margin-left:40px;">
    <p style="text-align:center;font-size:30px;font-weight: 500;color: black;">Items in Plat De Jour</p>
      @foreach($foodP as $obj)
      <div style="display:flex;flex-direction:column;align-items: center;">
        <img src="{{asset($obj->imgsrc)}}" style="height: 200px;width:250px; border-radius:9px;"/>
        <div style="display:flex;align-items: center;margin-top: 13px;margin-bottom: 39px;gap: 25px;">    
              <p style="color:black;font-size:25px;font-weight:500;margin-bottom:0;margin-top:0">{{$obj->name}}</p>
              @if($obj->getOffer)
                <p style=" font-size:20px;margin-bottom:0;margin-top:0;color:red;text-decoration: line-through;">${{$obj->getOffer->oldprice}}</p>
                <p style=" font-size:20px;margin-bottom:0;margin-top:0;color:green">${{$obj->price}}</p>
              @else
              <p style="color:black;font-size:20px;margin-bottom:0;margin-top:0">${{$obj->price}}</p>
              @endif
              
              <form method="post" action="{{route('deletePlat',['id'=>$obj->id])}}" style="">
                @csrf
                @method('put')
                <button type="submit" style="border:none;width:90px;padding:9px;font-size:19px;background-color:#e55;border-radius:9px;cursor:pointer;color:white;">Remove</button>
        </form>
        </div>
        
    </div>
      @endforeach
    </div>
  </div>
      <div class="AddFood" style="margin-left:40px;width: 50%;overflow-y: scroll;max-height: 600px;">
      <p style="text-align:center;font-size:30px;font-weight: 500;color: black;">Items You Can Add</p>

        @foreach($store->getMenu->getFood as $obj)
          @if($obj->platdujour == 0)
              <div style="display:flex;flex-direction:column;align-items: center;">
              <img src="{{asset($obj->imgsrc)}}" style="height: 200px;width:250px;border-radius:9px;" />
              <div style="display:flex;align-items: center;margin-top: 13px;margin-bottom: 10px; gap:30px">   
              <p style="color:black;font-size:25px;font-weight:500;margin-bottom:0;margin-top:0">{{$obj->name}}</p>
              @if($obj->getOffer)
                <p style=" font-size:20px;margin-bottom:0;margin-top:0;color:red;text-decoration: line-through;">${{$obj->getOffer->oldprice}}</p>
                <p style=" font-size:20px;margin-bottom:0;margin-top:0;color:green">${{$obj->price}}</p>
              @else
              <p style="color:black;font-size:20px;margin-bottom:0;margin-top:0">${{$obj->price}}</p>
              @endif
              
            </div>
              <div style="display:flex; gap:10px; margin-bottom:20px;">
                <form method="post" action="{{route('addPlat',['id'=>$obj->id])}}">
                        @csrf
                        @method('put')
                        <button type="submit" style="border:none;width:90px;padding:9px;font-size:19px;background-color:#e55;border-radius:9px;cursor:pointer;color:white;">Add</button>
                </form>
             
              </div>
          </div>
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