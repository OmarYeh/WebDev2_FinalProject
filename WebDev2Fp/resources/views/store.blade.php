@extends('layouts.app')
@section('title','store-details')
@section('css')
<link href="{{ asset('css/storedetails.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="imgcont">
    <div class="blackbg"><div class="appear-from-top"><p class="storename">{{ $store->storeName }}</p>
        <p class="storedesc"> {{ $store->Description }}</p>
        <div class="btns">
            <a id="menulink" href="#menu">Order Now</a>
            <a id="contactlink" href="#reviewForm">Comment</a>
        </div>
    </div>
</div>
    
    

</div>
<div id="menu">
  @php
  $menu = $store->getMenu->getFood;
  $menus = $menu->chunk(12);
  @endphp
  <h2 class="menuTitle">Menu:</h2>
  <div class="table-carousel">
    @foreach ($menus as $menui)
      <table>
        <tr class="tableRow">
          <th>Item</th>
          <th>Name</th>
          <th>Price</th>
          <th></th>
        <tr>
        @foreach ($menui as $m)
          <tr class="tableRow">
          
           
          <td><img src="https://tse1.mm.bing.net/th?id=OIP._WjnMeA1HRawZ79RotSgpQHaE8&pid=Api&P=0" class="menuImg" /></td>
            <td><a href="{{Route('food',$m->id)}}" class="name">{{ $m->name }}</a></td>
            <td>{{ $m->price}}$</td>
            <td ><form method="post" action="{{ Route('AddBasket') }}" enctype="multipart/form-data" >
          @csrf
          <input type="hidden" name="food_name" value="{{ $m->name }}">
          <input type="hidden" name="Quantity" value="1">
          <button type="submit" class="orderbtn" >Add</button>
        </form></td>
          
          </tr>
          
        @endforeach
      </table>
    @endforeach
  </div>
  <div class="carousel-nav">
    <button class="prev">&#8249;</button>
    <button class="next">&#8250;</button>
  </div>
</div>

<div class="reviews">
  
  <h1>Reviews:</h1>
  @foreach($reviews as $review)
  <div class="review">
  <div class="topReview">
    <img href="#" class="userImg" />
    <h3 class="userName">{{ $review->getUser->name }}</h3>
  </div>
  <p class="content">{{$review->Content}}</p>
  @for($i=0 ; $i<$review->rating ; $i++)
  <img class="im" src="{{asset('storage/images/burger.png')}}" >

  @endfor 
   <p class="published">Published: {{$review->created_at->format('Y-m-d')}}
    <hr /></div>
  @endforeach
  

  <form method="POST" action="/makeReview" id="reviewForm">

  @csrf
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" required>

  <label for="content">Content:</label>
  <textarea name="content" id="content" required></textarea>
  
  <label for="rating">Rating:</label>
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