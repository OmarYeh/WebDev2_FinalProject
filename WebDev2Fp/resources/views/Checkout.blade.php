@extends('layouts.app')
@section('css')
<link href="{{ asset('css/basket.css') }}" rel="stylesheet">

<style>
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

<div class="backbackgroundarea">
    <div class="backgroundarea">
		<div id="map" style="width: 75%; height: 600px;margin-top:100px"></div>
		<button id="close" onclick="" style="border:none;padding:9px;background:white;width:150px;height:50px;font-size:20px;border-radius:5px;left:76%;position: fixed;margin-top: 47px;">Close Map</button>    
		<div id="getllA" style="right: 70%;margin-top: 60px;">
			<input type="text" id="add" placeholder="Address..." style="margin-left: 5px;width: 184px;height: 28px;padding: 6px;border: medium none;border-radius: 4px;"/>
			<button onclick="getAddress()" style="border: none;padding: 6px;margin-left: 10px;border-radius: 4px;background: #e55;color: white;font-size: 17px;">getAddress</button>
		</div> 
        <div class="imgiconthing">
            <img src="https://img.icons8.com/bubbles/100/purchase-order.png"  alt="shopping-basket-2" style="width: 100px;height: 100px;margin-top: 54px;"/>
        </div> 

        <p class="baskettitle" style="text-align: center;font-style: normal;font-size: 57px;font-weight: 500;color: white;letter-spacing: 4px;text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);">Location for Delivery:</p>
		<div style="display:flex; justify-content:center;margin-bottom: 63px;">
		<div class="sdkhjfgb" style="width:50%;height:70%;background:white;padding: 20px;border-radius: 9px;">
		

		<form  id="formll" method="post" action="{{Route('placeorder')}}" >
		@csrf
		<div >
			<div style="padding-left: 16px;">
		<label for="lng" style="font-size: 21px;">Longitude:</label>
		<input type="text" id="lng" name="lng" placeholder="lng:33.22"  style="margin-left:5px;width: 155px;height: 28px;padding: 6px;"/>
		<label for="lat" style="font-size: 21px;margin-left:20px;">Latitude:</label>
		<input type="text" id="lat" name="lat" placeholder="lat:33.22"  style="margin-left:5px;width: 155px;height: 28px;padding: 6px;"/>
		</div>
		<div style="padding-left: 16px;">
		<label for="address" style="font-size: 21px;margin-top:20px">Address</label>
		</div>
		<input type="text" id="address" name="address" placeholder="Address"  style="margin-left: 16px;margin-top:5px;width: 280px;height: 28px;padding: 6px; margin-bottom:30px;"/>
		
		</div>
		
		<button type="submit" style="border: none;padding: 9px;width: 288px;height: 51px;font-size: 20px;color: white;background: #e55;border-radius: 9px;font-weight: 600;">Place Order</button>
		
	</form>
		<div style="display: flex;justify-content: flex-end;margin-top: 42px;">
			<button id="gl" onclick="getLocation()" style="margin-right:30px;border: none;padding: 9px;width: 174px;height: 36px;font-size: 15px;color: white;background: rgb(142, 134, 134);border-radius: 9px;font-weight: 600;">Get Current Location</button>
			<button id="show" onclick="initMap()" style="border: none;padding: 9px;width: 174px;height: 36px;font-size: 15px;color: white;background: rgb(142, 134, 134);border-radius: 9px;font-weight: 600;">Show Map</button>
		</div>
	
	</div>
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
			document.getElementById("address").value = current_address;
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
			console.log(current_address);
			document.getElementById("lng").value = lng;
			document.getElementById("lat").value = lat;
			document.getElementById("address").value = current_address;
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
      document.getElementById("address").value = current_address;
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

	</script>
@endsection