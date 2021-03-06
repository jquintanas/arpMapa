<?php
require("../../controller/conexiones/conexion.php");
require("../../controller/rutas_alternas/default.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Rutas Alternas</title>
    <link rel="stylesheet" type="text/css" href="../../css/styleRutasAlternas.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  
  <body>
  
	  <center><button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Ver Rutas</button></center>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Rutas Sugeridas</h4>
        </div>
        <div class="modal-body">
          <div id="res"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
 <!-- <center><a href="#openModal"><button id="modalL"> Ver Rutas Alternas </button></a></center>
	

<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
		<h2>Rutas Sugeridas</h2>
		<div id="res"></div>
	</div>
</div>-->

 <div id="map">

 </div>
	  
	  
    <script>
		 var contentString = "";
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: -2.117346, lng: -79.903944}
			
        });
		  var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);
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
          origin: /*document.getElementById('start').value*/lat_admin+","+lng_admin,
          destination: /*document.getElementById('end').value*/lat_id+","+lng_id,
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