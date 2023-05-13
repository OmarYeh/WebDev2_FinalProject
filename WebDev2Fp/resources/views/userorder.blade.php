@extends('layouts.app')
@section('title', 'Orders')
@section('css')
    <link href="{{ asset('css/basket.css') }}" rel="stylesheet">
    <style>
     .custom-loader {
            width: 25px;
            height: 25px;
            display: grid;
        }
        .custom-loader::before,
        .custom-loader::after {    
            content:"";
            grid-area: 1/1;
            --c: radial-gradient(farthest-side,#766DF4 92%,#0000);
            background: 
            var(--c) 50%  0, 
            var(--c) 50%  100%, 
            var(--c) 100% 50%, 
            var(--c) 0    50%;
            background-size: 6px 6px;
            background-repeat: no-repeat;
            animation: s2 1s infinite;
        }
        .custom-loader::before {
        margin:2px;
        filter:hue-rotate(45deg);
        background-size: 4px 4px;
        animation-timing-function: linear
        }

        @keyframes s2{ 
        100%{transform: rotate(.5turn)}
        }

        .loop-wrapper {
        margin: 0 auto;
        position: relative;
        display: block;
        width: 119px;
        height: 35px;
        overflow: hidden;
        border-bottom: 3px solid #fff;
        color: #fff;
        }
        .mountain {
        position: absolute;
        right: -900px;
        bottom: -20px;
        width: 2px;
        height: 2px;
        box-shadow: 
            0 0 0 50px #4DB6AC,
            60px 50px 0 70px #4DB6AC,
            90px 90px 0 50px #4DB6AC,
            250px 250px 0 50px #4DB6AC,
            290px 320px 0 50px #4DB6AC,
            320px 400px 0 50px #4DB6AC
            ;
        transform: rotate(130deg);
        animation: mtn 20s linear infinite;
        }
        .hill {
        position: absolute;
        right: -900px;
        bottom: -50px;
        width: 400px;
        border-radius: 50%;
        height: 20px;
        box-shadow: 
            0 0 0 50px #4DB6AC,
            -20px 0 0 20px #4DB6AC,
            -90px 0 0 50px #4DB6AC,
            250px 0 0 50px #4DB6AC,
            290px 0 0 50px #4DB6AC,
            620px 0 0 50px #4DB6AC;
        animation: hill 4s 2s linear infinite;
        }
        .tree, .tree:nth-child(2), .tree:nth-child(3) {
        position: absolute;
        height: 100px; 
        width: 35px;
        bottom: 0;
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/130015/tree.svg) no-repeat;
        }
        .rock {
        margin-top: -17%;
        height: 2%; 
        width: 2%;
        bottom: -2px;
        border-radius: 20px;
        position: absolute;
        background: #ddd;
        }
        .truck, .wheels {
        transition: all ease;
        width: 85px;
        margin-right: -60px;
        bottom: 0px;
        right: 50%;
        position: absolute;
        background: #eee;
        }
        .truck {
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/130015/truck.svg) no-repeat;
        background-size: contain;
        height: 30px;
        }
        .truck:before {
        content: " ";
        position: absolute;
        width: 25px;
        box-shadow:
            -30px 28px 0 1.5px #fff,
            -35px 18px 0 1.5px #fff;
        }
        .wheels {
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/130015/wheels.svg) no-repeat;
        height: 15px;
        margin-bottom: 0;
        }

        .tree  { animation: tree 3s 0.000s linear infinite; }
        .tree:nth-child(2)  { animation: tree2 2s 0.150s linear infinite; }
        .tree:nth-child(3)  { animation: tree3 8s 0.050s linear infinite; }
        .rock  { animation: rock 4s   -0.530s linear infinite; }
        .truck  { animation: truck 4s   0.080s ease infinite; }
        .wheels  { animation: truck 4s   0.001s ease infinite; }
        .truck:before { animation: wind 1.5s   0.000s ease infinite; }


        @keyframes tree {
        0%   { transform: translate(1350px); }
        50% {}
        100% { transform: translate(-50px); }
        }
        @keyframes tree2 {
        0%   { transform: translate(650px); }
        50% {}
        100% { transform: translate(-50px); }
        }
        @keyframes tree3 {
        0%   { transform: translate(2750px); }
        50% {}
        100% { transform: translate(-50px); }
        }

        @keyframes rock {
        0%   { right: -200px; }
        100% { right: 2000px; }
        }
        @keyframes truck {
        0%   { }
        6%   { transform: translateY(0px); }
        7%   { transform: translateY(-6px); }
        9%   { transform: translateY(0px); }
        10%   { transform: translateY(-1px); }
        11%   { transform: translateY(0px); }
        100%   { }
        }
        @keyframes wind {
        0%   {  }
        50%   { transform: translateY(3px) }
        100%   { }
        }
        @keyframes mtn {
        100% {
            transform: translateX(-2000px) rotate(130deg);
        }
        }
        @keyframes hill {
        100% {
            transform: translateX(-2000px);
        }
        }
    </style>
@endsection

@section('content')
<div class="backbackgroundarea">
    <div class="backgroundarea">     
        <div class="imgiconthing">
            <img src="https://img.icons8.com/clouds/100/shopping-basket-2.png"  alt="shopping-basket-2" style="width: 100px;height: 100px;margin-top: 54px;"/>
        </div>    
        <p class="baskettitle" style="text-align: center;font-style: normal;font-size: 57px;font-weight: 500;color: white;letter-spacing: 4px;text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);">Your Orders:</p>

        @php
        use Carbon\Carbon;
        @endphp
        @if(count($order)==0)
        
                <p style="text-align: center;font-style: normal;font-size: 36px;font-weight: 500;color: white;letter-spacing: 4px;text-shadow: rgba(0, 0, 0, 0.6) 2px 2px 5px;">You have not made any orders recently.</p>
                <div class="searchforproduct">
                <form method="get" action="{{ Route('searchFood') }}" >  
                    <button class="searchforproductbtn">Search For Products</button>
                </form>
                </div>
        
        @else
        @isset($order)
            @foreach($order as $menu) 
                            @php
                                $total = 0;                                         
                                foreach($menu->getfood as $obj){
                                    $total= $total + $obj->pivot->quantity;
                                }
                               
                            @endphp
                            @php 
                            $total2 = 0;                                         
                            foreach($menu->getfood as $obj){
                                $total2= $total2 + $obj->price;
                            }
                            @endphp
                @foreach($menu->getfood as $obj)
                           
                    @if ($loop->first)
                    <div class="dadada" style="">
                        <div class="storeitem" style="border-radius: 10px 10px 0px 0px;">                
                                    <div class="storeinfo" style="margin-left: 10px; width:100%   ">
                                        <div style="display:flex; align-items: baseline;">
                                            <p style="font-size: 26px;font-weight: 700;margin-bottom: 0px;">Orders at: </p>
                                            <p style="font-size:20px; font-weight:400;margin-bottom: 0;margin-left: 13px;">{{ Carbon::parse($menu->Dot)->format('H:i:s l, F j, Y') }}</p>
                                        </div>
                                        <div class="quantityprice" style="display:flex;align-items:baseline;margin-top: 10px;">
                                            <p style="font-size: 25px;">Total Quantity:</p>
                                            <p style="font-size: 20px;margin-left: 5px;margin-right: 40px;">{{$total}}</p>
                                            <p style="font-size: 25px;">Total Price:</p>
                                            <p style="font-size: 20px;margin-left: 5px;">${{$total2}}</p>
                                            @if($menu->statues == "delivering")
                                            <p style="margin-bottom: 0;font-size: 28px;font-weight: 500;margin-left: 35%;">Status:</p>
                                            @else
                                            <p style="margin-bottom: 0;font-size: 28px;font-weight: 500;margin-left: 45%;">Status:</p>
                                            @endif
                                            @if($menu->statues == "pending")
                                            <div class="custom-loader" style="margin-left:6px;"></div>
                                            <p style="font-size: 23px;color: #ffc453;font-weight: 900;margin-left: 5px;">{{$menu->statues}}</p>
                                            @elseif($menu->statues == "approved")
                                            <img src="https://img.icons8.com/office/40/checked--v1.png" style="width=25px; height:25px; margin-left:6px;"/>
                                            <p style="font-size: 23px; color:rgb(121, 215, 135);font-weight: 900;margin-left: 5px;">{{$menu->statues}}</p>
                                            @elseif($menu->statues == "delivering")
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
                                            <p style="font-size: 23px; color:#c5ffb1;font-weight: 900;margin-left: 5px;">{{$menu->statues}}</p>
                                            @elseif($menu->statues == "delivered")
                                            <img src="https://img.icons8.com/officel/40/checked-truck.png"  style="height: 35px;  margin-left:6px;"/>
                                            <p style="font-size: 23px; color:#05ff05;font-weight: 900;margin-left: 5px;">{{$menu->statues}}</p> 
                                            @elseif($menu->statues == "canceled")
                                            <img src="https://img.icons8.com/stickers/100/close-window--v1.png"  style="height: 35px;  margin-left:6px;"/>
                                            <p style="font-size: 23px; color:#480606;font-weight: 900;margin-left: 5px;">{{$menu->statues}}</p>
                                            @elseif($menu->statues == "rejected")
                                            <img src="https://img.icons8.com/fluency/48/stop-sign.png"  style="height: 35px; margin-left:6px;"/>
                                            <p style="font-size: 23px; color:rgb(249, 196, 196);font-weight: 900;margin-left: 5px;">{{$menu->statues}}</p>
                                            @endif
                                            
                                        </div>
                                        
                                    </div>
                        </div>
                    </div>
                    
                    @endif
                    @if ($loop->last)
                        <div class="basbasbasbas" style="margin-bottom: 50px;">
                            <div class="basketitemsborder" style="margin-bottom: 0;border-radius: 0px 0px 10px 10px;">
                                
                            <div class="basketitems">
                                    <div class="imagedish">                              
                                            <img class="imagedishimg"src="{{asset($obj->imgsrc)}}" style="width:250px; height:200px; border-radius: 18px;margin-left: 8px;" />
                                            <div class="productinfo" style="gap: 88px;">
                                                <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 33px;">{{$obj->name}}</p>  
                                                <p style="font-size: 21px;margin-right: 21%;">${{$obj->price}}</p>
                                                <p style="font-size: 22px;">Quantity:</p>
                                                <p style="margin-left: -20%;margin-right: 14%;font-size: 19px;">{{$obj->pivot->quantity}}</p>
                                                <p style="font-size: 22px;">Store:</p>
                                                <p style="margin-left: -20%;font-size: 19px;">{{$obj->getMenu->getStore->storeName}}</p>
                                            </div>   
                                                            
                                        </div>
                                    </div>
                                    
                            </div>
                           
                        </div>
                        
                        @else
                            <div class="basbasbasbas">
                                <div class="basketitemsborder" style="margin-bottom: 0;border-radius: 0px;">
                                    
                                <div class="basketitems">
                                    <div class="imagedish">                              
                                            <img class="imagedishimg"src="{{asset($obj->imgsrc)}}" style="width:250px; height:200px; border-radius: 18px;margin-left: 8px;" />
                                            <div class="productinfo" style="gap: 88px;">
                                                <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 33px;">{{$obj->name}}</p>  
                                                <p style="font-size: 21px;margin-right: 21%;">${{$obj->price}}</p>
                                                <p style="font-size: 22px;">Quantity:</p>
                                                <p style="margin-left: -20%;margin-right: 14%;font-size: 19px;">{{$obj->pivot->quantity}}</p>
                                                <p style="font-size: 22px;">Store:</p>
                                                <p style="margin-left: -20%;font-size: 19px;">{{$obj->getMenu->getStore->storeName}}</p>
                                            </div>   
                                                            
                                        </div>
                                    </div>
                                    <hr/>
                                </div>
                               
                            </div>
                            
                    @endif  
                @endforeach
            @endforeach
        
        @endif
        @endif
@endsection