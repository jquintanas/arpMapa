<?php
require("../../controller/conexiones/conexion.php");
$user = $_REQUEST['user'];
$id = $_REQUEST['id'];
$ruta = "../../controller/cercas_virtuales/crear_XML.php?user=$user&id=$id";
echo("<script> var url= '$ruta'; </script>");
$query1 = "SELECT lat1, lat3, lng1, lng2 FROM id_cercas WHERE id='$id' AND user='$user'";
	$respuesta = $connection->query($query1);
	$row1 = $respuesta->fetch_assoc();
	$lat1=$row1['lat1'];
	$lng1=$row1['lng1'];
	$lat2=$row1['lat3'];
	$lng2=$row1['lng2'];
echo("<script> var norte= '$lat1'; </script>");
echo("<script> var sur= '$lat2'; </script>");
echo("<script> var este= '$lng1'; </script>");
echo("<script> var oeste= '$lng2'; </script>");

?>

<!DOCTYPE html >
 <html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Tech Brain</title>
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
    </style>
  </head>

  <body>
    <div id="map"></div>

    <script>
		
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-2.117346, -79.903944),
          zoom: 12
        });
		var rectangle = new google.maps.Rectangle({
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35,
          map: map,
          bounds: {
            north: norte,
            south: sur,
            east: este,
            west: oeste
          }
        });
		/*var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);*/
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl(url,
					  function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
				var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
			  

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));
			

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
				
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
				  alert(id);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
		
    </script>
     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvU4DntWhJTFoZvhVV2L84QsTtZfiSBgM&callback=initMap"
  type="text/javascript">
		 
	  </script>
	  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvU4DntWhJTFoZvhVV2L84QsTtZfiSBgM&callback=initMap">
    </script>
  </body>
</html>