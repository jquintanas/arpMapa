<?php
require("../util/util.php");
require("../conexiones/conexion.php");
$user = $_REQUEST['user'];
$lat = $_REQUEST['lat'];
$lng = $_REQUEST['lng'];
$nombre = $_REQUEST['name'];
$tipo = $_REQUEST['type'];
$idGps = $_REQUEST['gps'];

insertar_Datos_del_Gps($user,$nombre,$lat,$lng,$tipo,$idGps,$connection);



?>