@extends('layouts.app')
@section('title', 'Food')
@section('css')
<link href="{{ asset('css/homefoodpage.css') }}" rel="stylesheet">
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

    <div class="container my-5" >
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">

            </ol>
        </nav>
    </div>


    <div class="main-card" style="margin-left: 83px;">
        <img src="{{asset($food->imgsrc)}}" style="width: 400px;height: 400px;border-radius: 10px;"/>
        <form method="post" >
            <div class="side-card" style="margin-left: 58px;">
                <p class="title" style="  font-size: 53px;font-weight: 700;color:#e55">{{$food->name}}</p>
                <p class="price" style="color: black;">${{$food->price}}</p>
                <a href="{{Route('cuisine',['id'=>$cuisine->id])}}" style="font-size: 26px;text-decoration: none;">Cuisine: {{$cuisine->name}}</a>

                <div class="extras" style="margin-top: 24px;">

                    <div class="quantity">
                        <p style="color:black">Quantity:</p>

                        <div class="counter" style="border: 1px solid #e55;">
                            <span class="down" onClick='decreaseCount(event, this)' style="color:#e55">-</span>
                            <input type="text" name="Quntity" value="1" style="background:#e55">
                            <span class="up" onClick='increaseCount(event, this)' style="color:#e55">+</span>
                        </div>
                    </div>
                </div>
                <div class="cartdiv">
                    <button class="addtocart">
                        <div class="pretext">
                            <i class="fas fa-cart-plus"></i> ADD TO CART
                        </div>

                        <div class="pretext done" style="background:#e55">
                            <div class="posttext" style="background:#e55"><i class="fas fa-check"></i> ADDED</div>
                        </div>

                    </button>
                </div>
            </div>
        </form>
        <div class="suggested" style="margin-left: 141px;">
            <p style="margin-left: 53px; font-size: 30px;color: rgb(238, 85, 85);">Suggested Items</p>
            <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center" style="padding-top: 7px !important;">
                <div class="list-group">
                    @for($i = 0; $i < 3; $i++)
                        @if(isset($alldata[$i]))
                        <a  href="{{Route('food',['id'=>$alldata[$i]->id])}}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true" style="width: 400px;align-items: center;">
                            <img src="{{$alldata[$i]->imgsrc}}" alt="twbs" width="80" height="80" class="rounded-circle flex-shrink-0">
                            <div class="d-flex gap-2 w-100 justify-content-between" style="margin-left: 10px;">
                                <div>
                                    <h6 class="mb-0" style="font-size: 27px;">{{$alldata[$i]->name}}</h6>
                                    <p class="mb-0 opacity-75" style="font-size: 19px;">${{$alldata[$i]->price}}</p>
                                </div>

                            </div>
                        </a>
                        @else
                            @break
                        @endif
                    @endfor

                </div>
            </div>

    </div>
@endsection
