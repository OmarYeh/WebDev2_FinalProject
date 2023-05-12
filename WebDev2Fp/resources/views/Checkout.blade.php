@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Map Picker</title>
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
	<script>
		var map;

		function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
				center: {lat: 37.7749, lng: -122.4194},
				zoom: 8
			});

			map.addListener('click', function(event) {
				var lat = event.latLng.lat();
				var lng = event.latLng.lng();
				document.getElementById('lat').value = lat;
				document.getElementById('lng').value = lng;
			});
		}

		function saveLocation() {
			var lat = document.getElementById('lat').value;
			var lng = document.getElementById('lng').value;
			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'save_location.php', true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.onreadystatechange = function() {
				if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
					alert(xhr.responseText);
				}
			};
			xhr.send('lat=' + lat + '&lng=' + lng);
		}
	</script>

	<div id="map" style="height: 400px; width: 100%;"></div>
	<form>
		<input type="hidden" id="lat" name="lat">
		<input type="hidden" id="lng" name="lng">
		<button type="button" onclick="saveLocation()">Save Location</button>
	</form>

@endsection