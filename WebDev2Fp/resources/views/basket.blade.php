@extends('layouts.app')
@section('title', 'Basket')
@section('css')
<link href="{{ asset('css/basket.css') }}" rel="stylesheet">
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
            <img src="https://img.icons8.com/plasticine/100/shopping-basket-2.png" alt="shopping-basket-2" style="width: 90px;height: 90px;margin-top: 54px;"/>
        </div>    
        <p class="baskettitle">Your Basket:</p>
        
        @foreach($basket->getfood()->getStore() as $obj)     
          <div class="dadada">
                    <div class="storeitem">
                                <div class="storeimg">
                                    <img src="{{asset($obj->imgsrc)}}" style="width:100px;border-radius: 14px;height:100px;">
                                </div>
                                <div class="storeinfo">
                                    <p style="font-size: 26px;font-weight: 700;margin-bottom: 0px;">{{$obj->storeName}}</p>
                                    <p style="font-size:20px; font-weight:400;margin-bottom: 0;">{{$obj->Location}}</p>
                                </div>
                    </div>
            </div>          
            @foreach($basket->getfood() as $obj2)
                        <div class="basbasbasbas">
                    <div class="basketitemsborder">
                        
                        <div class="basketitems">
                            <div class="imagedish">                              
                                    <img class="imagedishimg"src="{{asset($obj2->imgsrc)}}" style="width:250px; height:200px; border-radius: 18px;margin-left: 8px;" />
                                    <div class="productinfo">
                                        <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 33px;">{{$obj2->name}}</p>
                                        
                                        <p style="font-size: 21px;">${{$obj2->price}}</p>
                                    </div>   
                                    <form method="post" action="{{ Route('updateBasket') }}" enctype="multipart/form-data" style="display:flex;">
                                        @csrf 
                                        <div class="quantity">
                                            <p style="color:black">Quantity:</p>
                                            <div class="counter" style="border: 1px solid #e55;">
                                                <span class="down" onClick='decreaseCount(event, this)' style="color:#e55">-</span>
                                                <input type="text" name="Quantity" value="1" style="background:#e55">
                                                <span class="up" onClick='increaseCount(event, this)' style="color:#e55">+</span>
                                            </div>
                                        </div>
                                        <div class="editbutton">
                                            <button type="submit">Edit</button>
                                        </div>
                                    </form>
                                    <form method="post" action="{{ Route('updateBasket') }}" enctype="multipart/form-data">
                                    <div class="deletebutton">
                                            <button type="submit">Remove</button>
                                        </div>
                                    </form>                    
                                </div>
                            </div>
                    </div>
                </div>
                    
            
            @endforeach
        @endforeach
    </div>
</div>

@endsection