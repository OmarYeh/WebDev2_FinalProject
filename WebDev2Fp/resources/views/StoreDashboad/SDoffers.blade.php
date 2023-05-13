@extends('layouts.dashboardStore')
@section('content')
    <div class="conatiner">
<div class="alloffers">
<p>{{ $store->storeName }}</p>
<div class="addOffer">
<form id="addOfferForm" method="post" action="{{Route('addoffer')}}" enctype="multipart/form-data">
    @csrf
    <lable for="">Name</lable>
    <input type="text" name="name" placeholder="Ex:Pizza"/>
    <lable for="newPrice">Price Discount</lable>
    <input type="text" id="newPrice" name="newPrice" placeholder="Ex:26%"/>
    <label for="imgsrc">Offer's Image</label>
    <input type="file" id="imgsrc" name="imgsrc" placeholder="Enter Image" size="60" />
    <button type="submit" onclick="submitAddOfferForm()">Add Offer</button>
</form>
@if ($errors->any())
        <div class="alert alert-dark">
             <ul>           
                 @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li>
                @endforeach        
            </ul>    
        </div>
    @endif
</div>

<div class="addFoodOffer">
<form action="">
    <h1>Offers</h1>
    <div class="offer">
    @foreach($store->getOffer as $obj)
   
        <img src="{{asset($obj->imgsrc)}}" width="50px" heigth="50px"/>
        <p>{{$obj->name}}</p>
        <input type="radio" name="offerId" id="offer{{$obj->id}}" value="{{$obj->id}}"/>
    
        <a href="{{route('deleteOffer',['id'=>$obj->id])}}">delete</a>

   
    @endforeach
    </div>
    <h1>Food</h1>

    <div class="food">
        @foreach($store->getMenu->getFood as $obj)
        <input type="checkbox" name="foodId[]" id="food{{$obj->id}}" value="{{$obj->id}}"/>
        <img src="{{asset($obj->imgsrc)}}" width="50px" heigth="50px"/>
        <p>{{$obj->name}}</p>
    
        @endforeach
    </div> 

    <button id="afo">Add Food to offers</button>
</form>

</div>
<div class="alloffersfood">
    @foreach($store->getOffer as $obj)
        {{$obj->name}}
        @foreach($obj->getfood as $food)
            {{$food->name}}
            @php
            $originalPrice = $food->price;
            $percentageIncrease = $obj->newPrice;
            $newPrice = $originalPrice * (1 - $percentageIncrease/100);
        @endphp
            {{$newPrice}}
            {{$food->price}}
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

  $('#afo').click(function(event) {
    event.preventDefault(); 
    console.log('clicked');
    var offerId = $('input[name="offerId"]:checked').val(); 
    var foodIds = [];
    $('input[name="foodId[]"]:checked').each(function() {
      foodIds.push($(this).val());
    });


    $.ajax({
      type: 'POST',
      url: '/addFoodTooffer',
      data: { 
        offerId: offerId,
        foodIds: foodIds 
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(result) {
        console.log(result);
        var $content = $(result).find('.alloffersfood');
        $('.alloffersfood').html($content.html());
      },
      error: function(error) {
        console.log(error);
      }
    });
  });

       

});
   

    </script>
</div>
@endsection
