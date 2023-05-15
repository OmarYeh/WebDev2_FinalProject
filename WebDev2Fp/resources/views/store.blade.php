@extends('layouts.app')
@section('title','store-details')
@section('css')
<link href="{{ asset('css/storedetails.css') }}" rel="stylesheet">
<link href="{{ asset('css/homefoodpage.css') }}" rel="stylesheet">

<style>
  .imgcont{
   
    background-image:url('{{asset($store->imgsrc)}}')
  }
</style>
@endsection
@section('content')
<div class="imgcont" style="">
    <div class="blackbg"><div class="appear-from-top"><p class="storename">{{ $store->storeName }}</p>
        <p class="storedesc"> {{ $store->Description }}</p>
        <div class="btns">
            <a id="menulink" href="#menu">Order Now</a>
            <a id="contactlink" href="#reviewForm">Comment</a>
        </div>
    </div>
</div>
</div>
<div class="fjdsaf" style="margin-top: 30px;margin-left: 100px;">
  <p style="margin-bottom:0;font-size: 47px;letter-spacing: 4px;font-weight: 700;">Current Offers</p>
  <div class="gnkdfb" style="display:flex;gap: 55px;margin-top: 12px;">
  <div style="display: flex;overflow-x: hidden;">
    <button class="left-button3">&#8249;</button>
    <div class="dishesrow3" style="padding-left: 25px;min-width:1200px">
    @foreach($store->getOffer as $obj)
    <div style="">
        <a href="{{Route('food',['id'=>$obj->getfood->id])}}" style="color: black;font-weight: 400;text-decoration: none; ">
            <img  src="{{asset($obj->getfood->imgsrc)}}" width="350" height="200" />
            <div class="productinfo" style="gap: 5px;justify-content: center;display: flex;align-items: center;">
                <p style="text-align:center;font-weight: 700;color: rgb(56, 56, 56);font-size: 20px;  max-height: 157px;}">{{ $obj->getfood->name }}</p>
                <p style="font-size: 17px; color:red;text-decoration: line-through;margin-left: 3px;margin-right: 5px;">${{$obj->oldprice}}</p>                               
                 <p style="font-size: 17px; color:green">${{$obj->getfood->price}}</p>
            
            </div>
         </a>
     </div>             

    @endforeach
    </div>
    <button class="right-button3">&#8250;</button>
  </div>
  </div>
</div>
<div class="fdgdfgd" style="margin-top: 30px;margin-left: 100px;">
  <p style="margin-bottom: 0px;font-size: 47px;letter-spacing: 4px;font-weight: 700;">Plat Du Jour</p>
  <div style="display:flex;margin-top: 20px;gap: 20px;">
    @foreach($foodP as $obj)
      <div style="">
      <a href="{{Route('food',['id'=>$obj->id])}}" style="color: black;text-decoration: none;">
        <img src="{{asset($obj->imgsrc)}}" style="width: 200px;height: 200px;margin-bottom: 10px;"/>
        <div style="display:flex;justify-content: center;gap: 40px">
          <p style="font-size: 28px;font-weight: 500;">{{$obj->name}}</p>
          <p style="font-size: 28px;">${{$obj->price}}</p>
        </div>
    </a>
      </div>
    @endforeach
  </div>
</div>

<div id="menu">
  @php
  $menu = $store->getMenu->getFood;
  $menus = $menu->chunk(12);
  @endphp
  <h2 class="menuTitle" style="font-weight: 700;">Menu</h2>
  <div class="table-carousel">
    @foreach ($menus as $menui)
    
      <table style="width: 92%;border:none;margin: 0;margin-top: 16px;">
        <tr class="tableRow" style="background: #e55;color: white;">
          <th style="text-align:center;font-size: 27px;">Item</th>
          <th style="text-align:center;font-size: 27px;">Name</th>
          <th style="text-align:center;font-size: 27px;">Price</th>
          <th></th>
        </tr>
        @foreach ($menui as $m)
          <tr class="tableRow" style="height: 210px;">
          
           
          <td style="display: flex;width: 100%;justify-content: center;"><img src="{{asset($m->imgsrc)}}" style="border-radius: 5px;margin-top: 5px;" class="menuImg" /></td>
            <td style="text-align: center;"><a href="{{Route('food',$m->id)}}" class="name" style="font-size: 28px;">{{ $m->name }}</a></td>
            <td style="text-align: center;font-size: 28px;" >
              @if($m->getOffer)
              <div style="display:flex;flex-direction:row;margin-left:150px">
                <p style="font-size: 25px; color:red;text-decoration: line-through;margin-right: 15px;">${{$m->getOffer->oldprice}}</p>                               
                <p style="font-size: 25px; color:green">${{$m->price}}</p>
              </div>
              @else
            <p>{{ $m->price}}$</p>
            @endif
          </td>
            <td ><form method="post" action="{{ Route('AddBasket') }}" enctype="multipart/form-data" >
          @csrf
          <input type="hidden" name="food_name" value="{{ $m->name }}">
          <input type="hidden" name="Quantity" value="1">
          <button type="submit" class="orderbtn" style="width: 100px;height: 46px;margin-right: 32px;border-radius: 7px;font-size: 22px;">Add</button>
        </form></td>
          
          </tr>
          
        @endforeach
      </table>
    @endforeach
  </div>
  <div class="carousel-nav" style="margin-top: 25px;">
    <button class="prev">&#8249;</button>
    <button class="next">&#8250;</button>
  </div>
</div>

<div class="reviews" style="margin-top: 45px;margin-left: 100px;">
  
  <h1 style="font-size: 47px;letter-spacing: 4px;font-weight: 700;margin-bottom: 29px;">Reviews</h1>
  @foreach($reviews as $review)
  <div class="review" style="  margin: 0px; width:70%;">  
  <div class="topReview">
    <img src="https://img.icons8.com/ios/100/user--v1.png" class="userImg" />
    <h3 class="userName">{{ $review->getUser->name }}</h3>
  </div>
  <p class="content">{{$review->Content}}</p>
  @for($i=0 ; $i<$review->rating ; $i++)
  <img class="im" src="https://img.icons8.com/pulsar-color/96/star.png" style="width: 40px;height: 40px;" >

  @endfor 
   <p class="published">Published: {{$review->created_at->format('Y-m-d')}}
    <hr style="margin:0" /></div>
  @endforeach
  

  <p style="margin-bottom: 0;font-size: 47px;letter-spacing: 4px;font-weight: 300;">Add a Review:</p>
  <form method="POST" action="/makeReview" id="reviewForm" style="margin-top:0px">

  @csrf
  <label for="title" style="font-size: 25px;">Title:</label>
  <input type="text" name="title" id="title" required>

  <label for="content" style="font-size: 25px;">Content:</label>
  <textarea name="content" id="content" required></textarea>
  
  <label for="rating" style="font-size: 25px;">Rating:</label>
  <select name="rating" id="rater">
     <option value="5">5</option>
     <option value="4">4</option>
     <option value="3">3</option>
     <option value="2">2</option>
     <option value="1">1</option>
  </select>
  <input type="hidden" name="store_id" value="{{ $store->id }}">
  <button type="submit" id="reviewbtn">Post Review</button>

  </form>
</div>

@endsection

  <script>
  document.addEventListener('DOMContentLoaded', () => {
  const tableCarousel = document.querySelector('.table-carousel');
  const prevButton = document.querySelector('.prev');
  const nextButton = document.querySelector('.next');
  const buttons = document.querySelectorAll('.orderbtn');
  let scrollPosition = 0;
  const scrollStep = 300;
  
  /*buttons.forEach(function(button) {
  button.addEventListener('click', function() {
    button.style.width = '40px';
    button.style.height = '40px';
    button.style.borderRadius = '50%';
    button.style.transition = '0.3s';
  });
});*/

  prevButton.addEventListener('click', () => {
  
    if (scrollPosition !== 0) {
      scrollPosition -= scrollStep;
      tableCarousel.scroll({ top: 0, left: scrollPosition, behavior: 'smooth' });
    }
  });

  nextButton.addEventListener('click', () => {
   
    if (scrollPosition !== tableCarousel.scrollWidth - tableCarousel.clientWidth) {
      scrollPosition += scrollStep;
      tableCarousel.scroll({ top: 0, left: scrollPosition, behavior: 'smooth' });
    }
  });
});
</script>