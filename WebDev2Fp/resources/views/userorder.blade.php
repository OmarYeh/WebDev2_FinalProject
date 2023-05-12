@extends('layouts.app')
@section('title', 'Orders')
@section('css')
    <link href="{{ asset('css/basket.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="backbackgroundarea">
    <div class="backgroundarea">     
        <div class="imgiconthing">
            <img src="https://img.icons8.com/clouds/100/shopping-basket-2.png"  alt="shopping-basket-2" style="width: 100px;height: 100px;margin-top: 54px;"/>
        </div>    
        <p class="baskettitle" style="text-align: center;font-style: normal;font-size: 57px;font-weight: 500;color: white;letter-spacing: 4px;text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);">Your Orders:</p>

                 
        @if($order->count() == 0)
                <p style="text-align: center;font-style: normal;font-size: 36px;font-weight: 500;color: white;letter-spacing: 4px;text-shadow: rgba(0, 0, 0, 0.6) 2px 2px 5px;">You have not made any orders recently.</p>
                <div class="searchforproduct">
                <form method="get" action="{{ Route('searchFood') }}" >  
                    <button class="searchforproductbtn">Search For Products</button>
                </form>
                </div>
        @else
            @foreach($orderedbytime as $menu)     
                @foreach($menu as $obj)
                
                
                    @if ($loop->first)
                    <div class="dadada" style="">
                        <div class="storeitem" style="border-radius: 10px 10px 0px 0px;">                
                                    <div class="storeinfo">
                                        <p style="font-size: 26px;font-weight: 700;margin-bottom: 0px;">Orders made on the: </p>
                                        <p style="font-size:20px; font-weight:400;margin-bottom: 0;">{{$obj->Dot}}</p>
                                        <p>Status:</p>
                                        <p>{{$obj->statues}}</p>
                                    </div>
                        </div>
                    </div>
                    
                    @endif
                    @if ($loop->last)
                        <div class="basbasbasbas" style="margin-bottom: 50px;">
                            <div class="basketitemsborder" style="margin-bottom: 0;border-radius: 0px 0px 10px 10px;">
                                
                                <div class="basketitems">
                                    <div class="imagedish">                              
                                            <img class="imagedishimg"src="" style="width:250px; height:200px; border-radius: 18px;margin-left: 8px;" />
                                            <div class="productinfo">
                                                <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 33px;">{{$obj->getfood->name}}</p>  
                                                <p style="font-size: 21px;">{{$obj->getfood->price}}</p>
                                                <p>quantity</p>
                                                <p>{{$obj->getfood->getMenu->getStore->storeName}}</p>
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
                                            <img class="imagedishimg"src="" style="width:250px; height:200px; border-radius: 18px;margin-left: 8px;" />
                                            <div class="productinfo">
                                                <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 33px;">{{$obj->getfood->name}}</p>  
                                                <p style="font-size: 21px;">{{$obj->getfood->price}}</p>
                                                <p>quantity</p>
                                                <p>{{$obj->getfood->getMenu->getStore->storeName}}</p>
                                            </div>   
                                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif       
                @endforeach
            @endforeach
        @endif
@endsection