@extends('layouts.dashboardStore')

@section('content')
    <div class="conatiner" style="display:flex;flex-direction:column;gap:25px;">
<div class="alloffers" style="display:flex;flex-direction:column;padding:10px;gap:10px;">
<div class="addOffer" style="display:flex;flex-direction:column;padding:10px;gap:10px;width:1100px;">
<p style="font-size:25px;font-weight:700">Offers:</p>
    @foreach($store->getOffer as $obj)
    <div class="offer" style="display:flex;flex-direction:row;gap:25px;justify-content:space-between;align-items:center;border:2px solid lightgray;background-color:#f8f8ff;border-radius:15px;padding:20px;">
    <img src="{{asset($obj->getfood->imgsrc)}}" width="100px" height="75px"/>  
    <p> {{$obj->getfood->name}}</p>
      <p>Old Price: {{$obj->oldprice}}</p>
      <p>New Price:{{$obj->getfood->price}}</p>
      <a href="{{route('deleteOffer',['id'=>$obj->getfood->id])}}" style="text-decoration:none;color:white;background:#e55;border-radius:12px;cursor:pointer;padding:10px;">delete</a>
</div>
    @endforeach
</div>

<div class="addFoodOffer" >
  <p style="font-size:25px;font-weight:700" >Add Offer</p>
    <div class="food" style="background:none;display:flex;flex-direction:column;padding:10px;gap:10px;width:1100px;">
        @foreach($store->getMenu->getFood as $obj)
        @if(!$obj->getOffer)
        <form method="post"action="{{route('addoffer',['id'=> $obj->id])}}" style="display:flex;flex-direction:row;gap:25px;justify-content:space-between;align-items:center;border:2px solid lightgray;background-color:#f8f8ff;border-radius:15px;padding:20px;">
           @csrf
            <img src="{{asset($obj->imgsrc)}}" width="100px" heigth="75px" />
            <p>{{$obj->name}}</p>
            <p>Price: {{$obj->price}}</p>
            <p>Discount:</p>
            <input type="text" name="newPrice" style="width:200px" placeholder="Ex: 20%"/> 
            <button style="color:white;background:#e55;border-radius:12px;cursor:pointer;padding:10px;outline:none;border:none;">Add offer</button>
        </form>
        @endif
        @endforeach
    </div> 

    


</div>

</div>
<script>
    
$(document).ready(function() {
  var currentPage = window.location.pathname.split('/').pop().toLowerCase();
    history.pushState(null, null, '/Store/Dashboard');
  $('.sd').each(function() {
   
    var textWithoutSpaces = $(this).text().replace(/\s+/g, '').toLowerCase();
    console.log(currentPage,textWithoutSpaces)
    if (textWithoutSpaces === currentPage) {
      $('.sd').each(function() {
        $(this).removeClass('clicked');
      });
      $(this).addClass('clicked');
    }
  });

 /* $('#afo').click(function(event) {
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
  });*/

       

});
   

    </script>
</div>
@endsection
