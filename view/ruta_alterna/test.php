<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
	  <div id="res"></div>
    <script>
		 var contentString = "";
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: -2.117346, lng: -79.903944}
			
        });
        directionsDisplay.setMap(map);
		  directionsDisplay.setPanel(document.getElementById('res'));
		  
  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
		  window.onload = onChangeHandler;
        /*document.getElementById('start').addEventListener('load', onChangeHandler);
        document.getElementById('end').addEventListener('load', onChangeHandler);*/
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: /*document.getElementById('start').value*/"-2.139000,-79.910004",
          destination: /*document.getElementById('end').value*/"-2.145597,-79.966148",
          travelMode: 'DRIVING',
			provideRouteAlternatives: true
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
		  
      }
		
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvU4DntWhJTFoZvhVV2L84QsTtZfiSBgM&callback=initMap">
    </script>
  </body>
</html>