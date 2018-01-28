<?php

$user = $_REQUEST['user'];
$porciones = explode('"', $user);
$latU = $_REQUEST['lat'];
$lngU = $_REQUEST['lng'];
$nombre = $_REQUEST['name'];
echo("<script> var user = $user; </script>");
actualizar_Posicion_Administrador($latU,$lngU,$porciones[1],$connection,$nombre);

?>