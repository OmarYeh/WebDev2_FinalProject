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
    <form id="addFoodOfferForm" method="post" action="{{Route('addFoodTooffer')}}">
        @csrf
        <h1>Offers</h1>
        @foreach($store->getOffer as $obj)
        <div class="offer">
            <img src="{{asset($obj->imgsrc)}}" width="50px" heigth="50px"/>
            <p>{{$obj->name}}</p>
            <input type="radio" name="offerId" id="offers" value="{{$obj->id}}"/>
        </div>
        @endforeach

        <h1>Food</h1>
        <div class="food">
            @foreach($store->getMenu->getFood as $obj)
            <input type="checkbox" name="foodId" id="offers" value="{{$obj->id}}"/>
            <img src="{{asset($obj->imgsrc)}}" width="50px" heigth="50px"/>
            <p>{{$obj->name}}</p>
            
        </div>
        @endforeach
        <button type="submit" onclick="submitAddFoodOfferForm()">Add Food to offers</button>
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
</div>
</div>
@endsection

@section('js')
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
@endsection