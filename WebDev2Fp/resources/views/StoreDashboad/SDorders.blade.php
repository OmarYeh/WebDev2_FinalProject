@extends('layouts.dashboardStore')

@section('content')
<div class="conatiner" style="width: 100%;height: 100%;display: flex;justify-content: center;margin:0;">
    <div class="orders" style="margin-top: 45px;width: 800px;">
            
        @foreach($orders as $obj)
            <div style="background: #e55;border-radius: 9px;color: white;">
            <div style="display:flex;align-items:center;justify-content: center;">
                <p style="font-size:22px;margin-right: 37px;font-weight: 700;">Client: {{$obj->getUser->id}}</p>
                <p>{{ gmdate('H:i:s l, F j, Y', strtotime($obj->Dot)) }}</p>
            </div>

                            @php
                                $total = 0;                                         
                                foreach($obj->getfood as $obj1){
                                    $total= $total + $obj1->pivot->quantity;
                                }
                               
                            @endphp
                            @php 
                            $total2 = 0;                                         
                            foreach($obj->getfood as $obj2){
                                $total2 = $total2 + ($obj2->price * $obj2->pivot->quantity);
                            }
                            @endphp
            @if($obj->statues == "pending")
            <div style="display:flex;">
                <p style="font-size: 22px;margin-left: 13%;margin-top: 0px;">Total Quantity:</p>
                <p style="font-size: 20px;margin-left: 5px;margin-right: 34%;margin-top: 0px;margin-top: 2px;">{{$total}}</p>
                <p style="font-size: 22px;margin-top: 0px;">Total Price:</p>
                <p style="font-size: 20px;margin-left: 5px;margin-top: 0px;margin-top: 2px;">${{$total2}}</p>
            </div>
            <div style="display:flex;justify-content: center;gap: 53px;">
                <form method="post" action="{{route('appOr',['id'=>$obj->id])}}">
                    @csrf
                    @method('put')
                    <button type="submit" style="border: none;padding: 6px;background: #04e304;width: 88px;border-radius: 6px;color: white;cursor:pointer;">Approve</button>
                </form>
                <form method="post" action="{{route('rejOr',['id'=>$obj->id])}}">
                    @csrf
                    @method('put')
                    <button type="submit" style="border: none;padding: 6px;background: #ff1919;width: 88px;border-radius: 6px;color: white;cursor:pointer;  ">Reject</button>
                </form>
            </div>

            @elseif($obj->statues == "approved")
            <div style="display:flex;">
                <p style="font-size: 22px;margin-left: 13%;margin-top: 0px;">Total Quantity:</p>
                <p style="font-size: 20px;margin-left: 5px;margin-right: 34%;margin-top: 0px;margin-top: 2px;">{{$total}}</p>
                <p style="font-size: 22px;margin-top: 0px;">Total Price:</p>
                <p style="font-size: 20px;margin-left: 5px;margin-top: 0px;margin-top: 2px;">${{$total2}}</p>
            </div>
                <div style="display:flex;justify-content: center;align-items: center;">                 
                    <img src="https://img.icons8.com/office/40/checked--v1.png" style="margin-top: -17px;width=25px; height:25px; margin-left:6px;"/>
                    <p style="font-size: 23px; color:rgb(121, 215, 135);font-weight: 900;margin-left: 5px;margin-top:0px">{{$obj->statues}}</p>
                </div>           
            @elseif($obj->statues == "rejected")
            <div style="display:flex;">
                <p style="font-size: 22px;margin-left: 13%;margin-top: 0px;">Total Quantity:</p>
                <p style="font-size: 20px;margin-left: 5px;margin-right: 34%;margin-top: 0px;margin-top: 2px;">{{$total}}</p>
                <p style="font-size: 22px;margin-top: 0px;">Total Price:</p>
                <p style="font-size: 20px;margin-left: 5px;margin-top: 0px;margin-top: 2px;">${{$total2}}</p>
            </div>
            <div style="display:flex;justify-content: center;align-items: center;">                 
                <img src="https://img.icons8.com/fluency/48/stop-sign.png"  style="margin-top: -17px;height: 35px; margin-left:6px;"/>
                <p style="font-size: 23px; color:rgb(249, 196, 196);font-weight: 900;margin-left: 5px;margin-top:0px">{{$obj->statues}}</p>
            </div>
            @endif
                <div style="display:flex;justify-content:center;margin-top:30px;margin-bottom:20px">
                    <div style="background:white;width: 90%;margin-bottom: 31px;border-radius: 12px;padding: 7px;">
                        @foreach($obj->getfood as $food)
                        <div style="display:flex">
                            <img src="{{asset($food->imgsrc)}}" style="width:50px;height:50px;border-radius: 5px;"/>
                            <p style="color:black;margin-left:20px;">{{$food->name}}</p>
                            <p style="color:black;margin-left: 20%;">Quantity: {{$food->pivot->quantity}}</p>
                            <p style="color:black;margin-left: 20%;">Price: ${{$food->price}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>  
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
