@extends('layouts.app')
@section('title', 'Register Store')
@section('css')
<link href="{{ asset('css/StoreInput.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="Ricontainer" >
    <div class="astext">
    <p id="headt">Unlock a new revenue stream</p>
    <p>foodies’s global platform gives you the flexibility, visibility and customer insights you need to connect with more customers. Partner with us today.</p>
    </div>
    <div class="formRs">
    <form id="storeregform" method="post" action="{{Route('storeCook')}}" enctype="multipart/form-data">
        @csrf
        <input type="text" id="lat" name="lat" style="display:none"/>
        <input type="text" id="lng" name="lng" style="display:none"/>
        <label for="StoreName">Store Name</label>
        <input type="text" id="StoreName" name="storeName"   value="{{old('storeName')}}" placeholder="Ex: TempoBeats" />
        @if ($errors->has('storeName'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('storeName') }}</strong>
                 </span>
                @endif
        <label for="Location">Location</label>
        <input type="text" id="Location" name="Location" value="{{old('Location')}}" placeholder="Downtown , Beirut Lebanon" />
        @if ($errors->has('Location'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('Location') }}</strong>
                 </span>
                @endif
        <label for="Description">Description</label>
        <textarea id="Description" name="Description" ></textarea>
        @if ($errors->has('Description'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('Description') }}</strong>
                 </span>
                @endif
        <label for="phone_number">Store Phone Number</label>
        <input type="text" name="phone_number" value="{{old('phone_number')}}" placeholder="Ex: 01247152">
        @if ($errors->has('phone_number'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('phone_number') }}</strong>
                 </span>
                @endif
        <label for="opened">Opened Since</label>
        <input type="text" id="opened" name="opened" placeholder="Ex: 1991" value="{{old('opened')}}"/>
        @if ($errors->has('opened'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('opened') }}</strong>
                 </span>
                @endif
        <label for="cus">What cusine will you serve?</label>
        <select id="cus" name="cuisine">
        <option value="" selected>Choose a cuisine</option>
            @foreach($allcuisine as $obj)
                <option value="{{$obj->id}}">{{$obj->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('cuisine'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('cuisine') }}</strong>
                 </span>
                @endif
                <label for="logo">Store's Logo</label>
        <input type="file" id="logo" name="logo" placeholder="Enter Image" size="60" />
        @if ($errors->has('logo'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('logo') }}</strong>
                 </span>
                @endif
        <label for="imgsrc">Store's Image</label>
        <input type="file" id="imgsrc" name="imgsrc" placeholder="Enter Image" size="60" />
        @if ($errors->has('imgsrc'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('imgsrc') }}</strong>
                 </span>
                @endif
        <button onclick="getlocation()" class="buttoninput">Register Store</button>
    </form>
    @if ($errors->has('uniqueAcc'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('uniqueAcc') }}</strong>
                 </span>
                @endif

 
</div>
</div>
@endsection

@section('js')
@section('js')
<script>
         
                        
                function getlocation(){
                        $('#storeregform').on('submit',function(event){
                                event.preventDefault();
                        })
                        console.log(document.getElementById("Location").value);
                Promise.all([getCoordinatesFromAddress(document.getElementById("Location").value)])
                .then(function(results) {
                        var lng = results[0].lng;
                        var lat = results[0].lat;

                        // Set the values of the hidden input fields
                        document.getElementById("lng").value = lng;
                        document.getElementById("lat").value = lat;

                       
                        $('#storeregform').off('submit').submit();
                });
                }
    function getCoordinatesFromAddress(address) {
        const url = `https://nominatim.openstreetmap.org/search?q=${address}&format=json`;
        return fetch(url)
            .then(response => response.json())
            .then(data => {
                const lat = data[0].lat;
                const lng = data[0].lon;
                return {
                    lat,
                    lng
                };
            })
            .catch(error => console.error(error));
    }
</script>
@endsection

@endsection