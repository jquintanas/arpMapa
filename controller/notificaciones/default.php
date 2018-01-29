<?php
require("../conexiones/conexion.php");
require("../cercas_virtuales/default.php");
$user = $_REQUEST['user'];
if($user == "") {
	die("Error no se estan pasando los parametros necesarios");
}
else{
	validar_Salida_Del_perimetro_Notificaciones($connection,$user);
}
?>