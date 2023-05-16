@extends('layouts.app')
@section('title', $cuisine->name)
@section('css')
<link href="{{ asset('css/singularcuisine.css') }}" rel="stylesheet">
<link href="{{ asset('css/foodsearch.css') }}" rel="stylesheet">
<link href="{{ asset('css/homefoodpage.css') }}" rel="stylesheet">

<style>
    .testimage::before{
        background-image: url('{{asset($cuisine->imgsrc)}}');
    }
    #map{
		position:fixed;
		display:none;
		left:10%;
		z-index:1;
	}
	#getllA{
		position:fixed;
		display:none;
		right:0;
		z-index:1;
	}
	#close{
		display:none;
	}
</style>
@endsection
@section('content')
<div class="allsections">
<div id="map" style="width: 75%; height: 600px;margin-top:100px"></div>
		<button id="close" onclick="" style="border:none;padding:9px;background:white;width:150px;height:50px;font-size:20px;border-radius:5px;left:76%;position: fixed;margin-top: 47px;">Close Map</button>    
    <div class="toptopsection">
        <div class="testimage" > 
             <p class="cuisinename">{{$cuisine->name}}</p> 
        </div>       
    </div>
    <div class="bottomsection">
        <input type="text" id="cuid" value="{{$cuisine->id}}"style="display:none"/>
        <div class="filters" style="width: 224px;width: 236px;margin-left: 9px;">
                <form method="GET" action="{{ route('cuisine',['id'=>$cuisine->id]) }}" style="height: 400px;border-radius: 16px;width: 100%;background: #e55;">
                <h1 class="title" style="margin-top: 16px;color: white;font-weight: 200;text-align: center;padding-left: 0;">Search Store</h1>
                <div class="formGroup">
                    <label for="query" style="color: white;font-size: 18px;">Search by store name:</label><br>
                    <input type="text" class="formControl" name="query" id="query" value="{{ request()->query('query') }}" style="margin-top: 5px;border: none;height: 27px;" />
                </div>
                               
             
                <div style="display:flex; justify-content:center">
                <button type="submit" class="btn" style="height: 50px;background: white;font-size: 20px;font-weight: 500;">Search</button>
                </div>
            </form>
            <input type="text" id="lat" name="lat" style="display:none"/>
            <input type="text" id="lng" name="lng" style="display:none"/>
            <label for="Location">Location</label>
            <input type="text" id="Location" name="Location" value="{{old('Location')}}" placeholder="Downtown , Beirut Lebanon" />
            <button id="gl" onclick="getLocation()" style="margin-right:30px;border: none;padding: 9px;width: 174px;height: 36px;font-size: 15px;color: white;background: rgb(142, 134, 134);border-radius: 9px;font-weight: 600;">Get Current Location</button>
			<button id="show" onclick="initMap()" style="border: none;padding: 9px;width: 174px;height: 36px;font-size: 15px;color: white;background: rgb(142, 134, 134);border-radius: 9px;font-weight: 600;">Show Map</button>
            <button onclick="filter()">show near</button>
        </div>
        
        <div class="imagesthings" style="height: 100%;">
            @if (isset($storeresult) && count($storeresult) > 0)
               
                        @foreach($storeresult as $storeresult)
                            @if($storeresult->cuisine_id == $cuisine->id)
                            <div class="imagedish">
                                <a href="{{Route('store',['id'=>$storeresult->id])}}" style="text-decoration: none;color: black;font-weight: 400;">
                                    <img class="imagedishimg"src="{{asset($storeresult->logo)}}" style="width:300px; height:250px; border-radius: 18px;margin-left: 0px;" />
                                    <div class="storeinfo">
                                        <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 27px;margin-bottom: 0px;">{{$storeresult->storeName}}</p>

                                        <p style="font-size: 20px;">{{$storeresult->Location}}</p>
                                    </div>
                                </a>
                            </div>
                            @endif
                        @endforeach
            @elseif (isset($query))
                <p>No results found for '{{ $query }}'</p>
            @endif

        </div>
            
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/ol/dist/ol.js"></script>
<script>
function getAddress() {
  var address = document.getElementById("add").value;
  Promise.all([getCoordinatesFromAddress(address)])
    .then(function(results) {
		console.log(results)
      var lng = results[0].lng;
      var lat = results[0].lat;
      document.getElementById("lng").value = lng;
      document.getElementById("lat").value = lat;
	  Promise.all([getAddressFromCoordinates(lat, lng)])
			.then(function(results) {
			var current_address = results[0];
			console.log(current_address);
			document.getElementById("Location").value = current_address;
			});

    });
}

 function initMap() {
	$("#map").show();
	$("#show").hide();
	$("#close").show()
	$("#getllA").show()
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([0, 0]),
          zoom: 2
        })
      });

		$("#close").click(function(){
			$("#map").hide();
			$("#show").show();
			$("#close").hide();
			$("#getllA").hide()
		$('#formll').submit(function(event) {
				event.preventDefault();
			});
		})

	  navigator.geolocation.getCurrentPosition(function(position) {
        var lonLat = [position.coords.longitude, position.coords.latitude];
        map.getView().setCenter(ol.proj.fromLonLat(lonLat));
        map.getView().setZoom(15);
      });
	  
      map.on('click', function(event) {
        var coordinate = event.coordinate;
        var lonLat = ol.proj.toLonLat(coordinate);
        var lat = lonLat[1];
  		var lng = lonLat[0];
       
		Promise.all([getAddressFromCoordinates(lat, lng)])
			.then(function(results) {
			var current_address = results[0];
			
			document.getElementById("lng").value = lng;
			document.getElementById("lat").value = lat;
			document.getElementById("Location").value = current_address;
            console.log(document.getElementById("lat"));
			});
      });

      map.on('mousewheel', function(event) {
        var delta = event.originalEvent.deltaY;
        var zoom = map.getView().getZoom();
        if (delta > 0) {
          zoom--;
        } else {
          zoom++;
        }
        map.getView().setZoom(zoom);
      });
    }

    // Call the initMap function after the OpenLayers library has loaded
    

		function getLocation() {
		  if ("geolocation" in navigator) {
			navigator.geolocation.getCurrentPosition(function(position) {
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
  
  Promise.all([getAddressFromCoordinates(lat, lng)])
    .then(function(results) {
      var current_address = results[0];
      console.log(current_address);
      document.getElementById("lng").value = lng;
      document.getElementById("lat").value = lat;
      document.getElementById("Location").value = current_address;
    });
});

		  } else {
		    document.getElementById("location").innerHTML = "Geolocation is not supported by this browser.";
		  }
		}

		function  getAddressFromCoordinates(lat, lng) {
		  const url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;
		  var current_address;
		  return fetch(url)
    .then(response => response.json())
    .then(data => {
      const address = data.display_name;
      return address;
    })
    .catch(error => console.error(error));
		}

		function getCoordinatesFromAddress(address) {
  const url = `https://nominatim.openstreetmap.org/search?q=${address}&format=json`;
  return fetch(url)
    .then(response => response.json())
    .then(data => {
      const lat = data[0].lat;
      const lng = data[0].lon;
      return { lat, lng };
    })
    .catch(error => console.error(error));
}

function filter(){
    $.ajax({
      type: 'POST',
      url: '/nearlocation',
      data: { 
        lat: document.getElementById("lng").value,
        lng: document.getElementById("lat").value,
        address: document.getElementById("Location").value,
        id:document.getElementById("cuid").value,
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(result) {
        console.log(result);
        var $content = $(result).find('.imagesthings');
        $('.imagesthings').html($content.html());
      },
      error: function(error) {
        console.log(error);
      }
    });
}
</script>
@endsection
