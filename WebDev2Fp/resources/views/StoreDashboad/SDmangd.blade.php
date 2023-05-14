@extends('layouts.dashboardStore')
@section('content')   
<div class="conatiner" style="width: 100%;height: 100%;display: flex;justify-content: center;margin:0;">
    <div class="orders" style="margin-top: 45px;width: 800px;">
            
    @foreach($orderA as $obj)
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
            @if($obj->statues == "approved")
            <div style="display:flex;">
                <p style="font-size: 22px;margin-left: 13%;margin-top: 0px;">Total Quantity:</p>
                <p style="font-size: 20px;margin-left: 5px;margin-right: 34%;margin-top: 0px;margin-top: 2px;">{{$total}}</p>
                <p style="font-size: 22px;margin-top: 0px;">Total Price:</p>
                <p style="font-size: 20px;margin-left: 5px;margin-top: 0px;margin-top: 2px;">${{$total2}}</p>
            </div>
            <div style="display:flex;justify-content: center;gap: 60px;">
                <form method="post" action="{{route('updateSD',['id'=>$obj->id,'status'=>'delivering'])}}">
                    @csrf
                    @method('put')
                    <button type="submit"  style="border: none;padding: 6px;background: #470bcc;width: 88px;border-radius: 6px;color: white;cursor:pointer;">Deliver</button>
                </form>
                <form method="post" action="{{route('updateSD',['id'=>$obj->id,'status'=>'canceled'])}}">
                    @csrf
                    @method('put')
                    <button type="submit" style="border: none;padding: 6px;background: #ff1919;width: 88px;border-radius: 6px;color: white;cursor:pointer;">Cancel</button>
                </form>
            </div>

            @elseif($obj->statues == "delivering")
            <div style="display:flex;">
                <p style="font-size: 22px;margin-left: 13%;margin-top: 0px;">Total Quantity:</p>
                <p style="font-size: 20px;margin-left: 5px;margin-right: 34%;margin-top: 0px;margin-top: 2px;">{{$total}}</p>
                <p style="font-size: 22px;margin-top: 0px;">Total Price:</p>
                <p style="font-size: 20px;margin-left: 5px;margin-top: 0px;margin-top: 2px;">${{$total2}}</p>
            </div>
                <div style="display:flex;justify-content: center;align-items: center;gap: 10px;">                    
                    <p style="font-size: 23px; color:#470bcc;font-weight: 900;margin-left: 5px;margin-top:0px;margin-bottom: 0px;margin-right:10px">{{$obj->statues}}</p>
                
                <form method="post" action="{{route('updateSD',['id'=>$obj->id,'status'=>'delivered'])}}">
                    @csrf
                    @method('put')
                    <button type="submit" style="border: none;padding: 6px;background: #470bcc;width: 88px;border-radius: 6px;color: white;cursor:pointer;">Delivered</button>
                </form>
                <form method="post" action="{{route('updateSD',['id'=>$obj->id,'status'=>'canceled'])}}">
                    @csrf
                    @method('put')
                    <button type="submit" style="border: none;padding: 6px;background: #ff1919;width: 88px;border-radius: 6px;margin-right:20px;color: white;cursor:pointer;">Cancel</button>
                </form>
                </div>           
            @elseif($obj->statues == "delivered")
            <div style="display:flex;">
                <p style="font-size: 22px;margin-left: 13%;margin-top: 0px;">Total Quantity:</p>
                <p style="font-size: 20px;margin-left: 5px;margin-right: 34%;margin-top: 0px;margin-top: 2px;">{{$total}}</p>
                <p style="font-size: 22px;margin-top: 0px;">Total Price:</p>
                <p style="font-size: 20px;margin-left: 5px;margin-top: 0px;margin-top: 2px;">${{$total2}}</p>
            </div>
            <div style="display:flex;justify-content: center;align-items: center;">                 
                <img src="https://img.icons8.com/officel/40/checked-truck.png"  style="height: 35px;  margin-left:6px;"/>
                <p style="font-size: 23px; color:#05ff05;font-weight: 900;margin-left: 5px;">{{$obj->statues}}</p>
            </div>
            @elseif($obj->statues == "canceled")
            <div style="display:flex;justify-content: center;align-items: center;"> 
                <img src="https://img.icons8.com/stickers/100/close-window--v1.png"  style="height: 35px;  margin-left:6px;"/>
                <p style="font-size: 23px; color:#480606;font-weight: 900;margin-left: 5px;">{{$obj->statues}}</p> 
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
