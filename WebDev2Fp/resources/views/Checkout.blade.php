@extends('layouts.app')
@section('css')
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

<div>
	<form method="post" id="formll" action="{{route('placeorder')}}">
		@csrf
		<label for="lng"></label>
		<input type="text" id="lng" name="lng" placeholder="lng:33.22" disabled/>
		<label for="lat"></label>
		<input type="text" id="lat" name="lat" placeholder="lat:33.22" disabled />
		<label for="address"></label>
		<input type="text" id="address" name="address" placeholder="address" disabled/>
		<button type="submit">place Order</button>
	</form>
	<button id="gl" onclick="getLocation()">Get Current loaction</button>
	<button id="show" onclick="initMap()">show map</button>
		<button id="close" onclick="">close map</button>
		<div id="map" style="width: 75%; height: 600px;"></div>
		<div id="getllA">
			<input type="text" id="add" placeholder="Address..."/>
			<button onclick="getAddress()">getAddress</button>
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
	$('#formll').submit(function(event) {
				event.preventDefault();
			});
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
			$('#formll').submit(function(event) {
				event.preventDefault();
			});
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