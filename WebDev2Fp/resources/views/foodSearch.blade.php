@extends('layouts.app')
@section('title', 'Browse Food')
@section('content')
@section('css')
<link href="{{ asset('css/foodsearch.css') }}" rel="stylesheet">
<link href="{{ asset('css/homefoodpage.css') }}" rel="stylesheet">

@endsection
<script>
    const foodCheckbox = document.querySelector('#foodCheckbox');
    const submitButton = document.querySelector('#submitButton');
    const offersList = document.querySelector('#offersList');
    submitButton.addEventListener('click', (event) => {
    event.preventDefault();
    const filteredOffers = Array.from(offersList.children).filter((offer) => {
        if (foodCheckbox.checked) {
        return offer.textContent.includes('food');
        } else {
        return true;
        }
    });
    offersList.innerHTML = '';
    filteredOffers.forEach((offer) => {
        offersList.appendChild(offer);
    });
    });
         $(function () {
        var CatePress;
        var priceLabels = {
            5: 'All',
            10: 'Under 10$',
            15: 'Under 15$',
            20: 'Under 20$',
            25: 'Under 25$',
            30: 'Under 30$',
            35: 'Under 35$',
            40: 'Under 40$',
            45: 'Under 45$',
            50: 'Under 50$',
            55: 'Under 55$',
            60: 'Under 60$',
            65: 'Under 65$',
            70: 'Under 70$',
            75: 'Under 75$',
            80: 'Under 80$',
            85: 'Under 85$',
            90: 'Under 90$',
            95: 'Under 95$',
            100: 'Under 100$',
        };
  // Get the value of the PriceRange query parameter from the URL
    const params = new URLSearchParams(window.location.search);
    const priceRange = params.get('PriceRange');
    // Set the value of the slider input to the priceRange variable
        $('#Ps').val(priceRange);
    
    // Trigger the input event to update the price label
        $('#Ps').trigger('input');
        
        $('#Ps').on('input', function () {
            var priceRange = parseInt($(this).val()); 
            var label = priceLabels[priceRange] || priceRange + '$';
            $('#priceLabel').text(label);
            
        });
        $('form').on('submit', function () {
            var priceRange = $('#Ps').val();
            var label = priceLabels[priceRange] || priceRange + '$';
            $('#priceLabel').text(label);
        });
       
     
    });
</script>   
<div class="contains">

    

    <form method="GET" action="{{ route('searchFood') }}">
        <h1 class="title" style="color: white;">Search Food</h1>
        <div class="formGroup">
            <label for="query" style="color: white;">Search by food name:</label><br>
            <input type="text" class="formControl" name="query" id="query" value="{{ request()->query('query') }}" />
        </div>
        
        <div class="formGroup">
            <label for="cuisine" style="color: white;">Filter by cuisine:</label><br>
            <select class="formControl" name="cuisine_id" id="cuisine">
                <option value="">All cuisines</option>
                @foreach($allcuisine as $cuisine)
                    <option value="{{ $cuisine->id }}" {{ (request()->query('cuisine') == $cuisine->id) ? 'selected' : '' }}>{{ $cuisine->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="formGroup">
    <label for="diet" style="color: white;">Filter by diet:</label><br>   
            <select class="formControl" name="diet_id" id="diet">
                <option value="">All diets</option>
                @foreach($alldiet as $diet)
                    <option value="{{ $diet->id }}" {{ (request()->query('diet') == $diet->id) ? 'selected' : '' }}>{{ $diet->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="priceSlider" style="display: flex;justify-content: center;flex-direction: column;">    
                <label for="Ps" style="font-size: 23px;font-weight: 200;margin-left: 29px;color: white;">Price: <span id="priceLabel">All</span></label><br />
                <input type="range" id="Ps" class="RangeP" name="PriceRange" min="5" max="100" step="5"  value="5" style="width: 86%;margin-left: 29px;"/> 
               
        </div>
        
        <div class="checkbox">
            <input type="checkbox" id="offers" name="offers" value="1" >
            <label for="offers" style="color: white;">Show Offers</label>
        </div>
        <div style="display:flex; justify-content:center;">
            <button type="submit" class="btn">Search</button>
        </div>
    </form>

    <div class="searchResult">
    <h2>Search Results</h2>

    @if (isset($food) && count($food) > 0)
        <p>Showing results for " {{ request()->query('query') }} "</p>
            <div class="dishescards">
            
                @foreach($food as $food)                        
                      <div class="imagedish" style="  display: flex;">
                                <a href="{{Route('food',['id'=>$food->id])}}" style="color: black;font-weight: 400; text-decoration: none;">
                                    <img class="imagedishimg" src="{{asset($food->imgsrc)}}"  />
                                    <div class="productinfo" style="gap: 10px;justify-content: center;display: flex;align-items: center;">
                                            <p style="text-align:center;font-weight: 700;color: rgb(56, 56, 56);font-size: 20px;  width: 200px;max-height: 157px;}">{{ $food->name }}</p>
                                            
                                            @if($food->getOffer)
                                            <p style="font-weight:300;font-size:18px">{{ $food->getMenu->getStore->storeName}}</p>
                                            <div style="display:flex;flex-direction:row;">
                                                <p style="font-size: 17px;color:red;text-decoration: line-through;margin-left=250px;">${{$food->getOffer->oldprice}}</p>
                                                 <p style=" font-size: 17px;color:green;margin-left: 7px;">${{$food->price}}</p>
                                            </div>
                                            @else
                                            <p style="font-weight:300;font-size:18px;position:relative;left:-25px;">{{ $food->getMenu->getStore->storeName}}</p>
                                            <p style="font-size: 24px;">${{ $food->price}}</p>
                                            @endif
                                            
                                           
                                        </div>
                                </a>
                            </div>                     
             
                @endforeach
                
            </div>
    @elseif (isset($query))
        <p>No results found for " {{ $query }} "</p>
    @endif

</div>
</div>
@endsection