<?php
require("../../controller/conexiones/conexion.php");
require("../../controller/util/util.php");
require("../../controller/rastreo_general/util_rastreo.php");
?>

<!DOCTYPE html >
 <html>
  <head>
   <link rel="stylesheet" type="text/css" href="../../css/styleVistaGeneral.css"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Tech Brain</title>
  
  </head>

  <body>
    <div id="map"></div>

    <script>
		function redirigir(ruta){
			location.href=ruta;
		}
		var icons = new Map();
		icons.set("container", "../../resources/icons/container.png");
		icons.set("mascota", "../../resources/icons/mascota.png");
		icons.set("vehiculo", "../../resources/icons/carro.png");
		icons.set("familia", "../../resources/icons/familia.png");
		icons.set("vendedor", "../../resources/icons/vendedor.png");
		icons.set("administrador", "../../resources/icons/admin.png");


      var customLabel = {
        container: {
            icon: 'C'
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
		
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
			var url = "../../controller/rastreo_general/crear_XML.php";
			var url = url + "?user="+ user;

          downloadUrl(url, function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
				var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
				var idgps = markerElem.getAttribute('idgps');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
			  

              var text_p = "";
				var infowincontent = document.createElement('div');
				var h1 = document.createElement('h1');
				h1.textContent = "Información del GPS";
				infowincontent.appendChild(h1);
				
				var strong = document.createElement('strong');
				strong.textContent = "Nombre: ";
				text_p = document.createElement('t');
				text_p.textContent = name;
				infowincontent.appendChild(strong);
				infowincontent.appendChild(text_p);
				infowincontent.appendChild(document.createElement('br'));
				infowincontent.appendChild(document.createElement('br'));
				
				var strong = document.createElement('strong');
				strong.textContent = "Es un: ";
				text_p = document.createElement('t');
				text_p.textContent = type;
				infowincontent.appendChild(strong);
				infowincontent.appendChild(text_p);
				infowincontent.appendChild(document.createElement('br'));
				infowincontent.appendChild(document.createElement('br'));
				
				var strong = document.createElement('strong');
				strong.textContent = "ID del GPS: ";
				text_p = document.createElement('t');
				text_p.textContent = idgps;
				infowincontent.appendChild(strong);
				infowincontent.appendChild(text_p);
				infowincontent.appendChild(document.createElement('br'));
				infowincontent.appendChild(document.createElement('br'));
				
				var center = document.createElement('center');
				var button = document.createElement('button');
				button.textContent = "Ver Ruta";
				button.onclick = function(){redirigir("../ruta_alterna/test.php?id="+id);};
				center.appendChild(button);
				infowincontent.appendChild(center);
				
              //var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
				icon: icons.get(type)
				  
                //label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
				/*location.href ="https://es.stackoverflow.com/questions/18119/como-redireccionar-a-una-p%C3%A1gina-seg%C3%BAn-la-respuesta-recibida-de-php-en-ajax";  */
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
  </body>
</html>