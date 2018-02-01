<?php
require("../conexiones/conexion.php");
require("../cercas_virtuales/default.php");
$lat1 = $_REQUEST['lat1'];
$lat2 = $_REQUEST['lat2'];
$lng1 = $_REQUEST['lng1'];
$lng2 = $_REQUEST['lng2'];
$user = $_REQUEST['user'];
$name = $_REQUEST['name'];

dibujar_Cerca($lat1,$lat1,$lat2,$lat2,$lng1,$lng2,$lng2,$lng1,$connection,$user,$name);



?>