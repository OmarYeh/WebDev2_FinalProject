@extends('layouts.app')
@section('title', 'Basket')
@section('css')
<link href="{{ asset('css/basket.css') }}" rel="stylesheet">
<style>
.basketitemsborder{}
</style>
@endsection
@section('content')
<script type="text/javascript">
        function increaseCount(a, b) {
            var input = b.previousElementSibling;
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;
        }

        function decreaseCount(a, b) {
            var input = b.nextElementSibling;
            var value = parseInt(input.value, 10);
            if (value > 1) {
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
            }
        }

        window.onload = function (){
            const button = document.querySelector(".addtocart");
            const done = document.querySelector(".done");
            console.log(button);
            let added = false;
            button.addEventListener('click', () => {
                if (added) {
                    done.style.transform = "transform 0.3s ease ";
                    done.style.transform = "translate(-110%) skew(-40deg)";
                    added = false;
                }
                else {
                    done.style.transform = "translate(0px)";
                    added = true;
                }

            });
        };


    </script>
<div class="backbackgroundarea">
    <div class="backgroundarea">     
        <div class="imgiconthing">
            <img src="https://img.icons8.com/clouds/100/shopping-basket-2.png"  alt="shopping-basket-2" style="width: 100px;height: 100px;margin-top: 54px;"/>
        </div>    
        <p class="baskettitle" style="text-align: center;font-style: normal;font-size: 57px;font-weight: 500;color: white;letter-spacing: 4px;text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);">Your Basket:</p>
        @if($basket->getFood->count()==0)
                <div class="searchforproduct">
                <form method="get" action="{{ Route('searchFood') }}" >  
                    <button class="searchforproductbtn">Search For Products</button>
                </form>
                </div>
        @else
        @foreach($orderedfood as $menu)
            
            @foreach($menu as $obj)
            
               
                @if ($loop->first)
                <div class="dadada" style="">
                    <div class="storeitem" style="border-radius: 10px 10px 0px 0px;">
                                <div class="storeimg">
                                    <img src="{{asset($obj->getMenu->getStore->imgsrc)}}" style="width:100px;border-radius: 14px;height:100px;">
                                </div>
                                <div class="storeinfo">
                                    <p style="font-size: 26px;font-weight: 700;margin-bottom: 0px;">{{$obj->getMenu->getStore->storeName}}</p>
                                    <p style="font-size:20px; font-weight:400;margin-bottom: 0;">{{$obj->getMenu->getStore->Location}}</p>
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
                                        <div class="productinfo">
                                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 33px;">{{$obj->name}}</p>
                                            
                                            <p style="font-size: 21px;">${{$obj->price}}</p>
                                        </div>   
                                        <form method="post" action="{{ Route('updateBasket',['id'=>$obj->id]) }}" style="display:flex;">
                                            @csrf 
                                            <div class="quantity">
                                                <p style="color:black">Quantity:</p>
                                                <div class="counter" style="border: 1px solid #e55;">
                                                    <span class="down" onClick='decreaseCount(event, this)' style="color:#e55">-</span>                            
                                                    <input type="text" name="Quantity" value="{{$obj->pivot->quantity}}" style="background:#e55">
                                                    <span class="up" onClick='increaseCount(event, this)' style="color:#e55">+</span>
                                                </div>
                                            </div>
                                            <div class="editbutton">
                                                <button type="submit">Edit</button>
                                            </div>
                                        </form>
                                        <form method="post" action="{{Route('removefromBasket', ['id'=>$obj->id]) }}">
                                            @csrf
                                            <div class="deletebutton">
                                                    <button type="submit">Remove</button>
                                            </div>
                                        </form>                    
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
                                            <div class="productinfo">
                                                <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 33px;">{{$obj->name}}</p>
                                                
                                                <p style="font-size: 21px;">${{$obj->price}}</p>
                                            </div>   
                                            <form method="post" action="{{ Route('updateBasket',['id'=>$obj->id]) }}" style="display:flex;">
                                                @csrf 
                                                <div class="quantity">
                                                    <p style="color:black">Quantity:</p>
                                                    <div class="counter" style="border: 1px solid #e55;">
                                                        <span class="down" onClick='decreaseCount(event, this)' style="color:#e55">-</span>
                                                        <input type="text" name="Quantity" value="{{$obj->pivot->quantity}}" style="background:#e55">
                                                        <span class="up" onClick='increaseCount(event, this)' style="color:#e55">+</span>
                                                    </div>
                                                </div>
                                                <div class="editbutton">
                                                    <button type="submit">Edit</button>
                                                </div>
                                            </form>
                                            <form method="post" action="{{Route('removefromBasket', ['id'=>$obj->id]) }}">
                                                @csrf
                                                <div class="deletebutton">
                                                        <button type="submit">Remove</button>
                                                </div>
                                            </form>                   
                                        </div>
                                    </div>
                            </div>
                        </div>
                    @endif
                    
            
          
            @endforeach
           
        @endforeach
        
        <!--THIS HERE IS FOR CLEARING ALL ITEMS FROM BASKET-->
        <form method="post" action="{{Route('clearBasket') }}">
            @csrf
            <div class="clearbutton"><button>Clear</button></div>
        </form>

        <!--THIS HERE IS FOR CHECKOUT-->
        <form method="get" action="">
            <div class="checkoutbutton">
                    <button>Checkout</button>
            </div>
        </form>
        @endif
    </div>
</div>

@endsection