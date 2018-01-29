<?php
require("../conexiones/conexion.php");
require("../cercas_virtuales/default.php");
$id_cerca = $_REQUEST['id'];
$gps1 = $_REQUEST['g1'];
$gps2 = $_REQUEST['g2'];
$gps3 = $_REQUEST['g3'];
$gps4 = $_REQUEST['g4'];
$gps5 = $_REQUEST['g5'];
$id_gps = array();
array_push($id_gps,$gps1,$gps2,$gps3,$gps4,$gps5);

asignar_gps_cerca($id_cerca,$id_gps,$connection);

?>