<?php
require("default.php");
require("../conexiones/conexion.php");
$user = $_REQUEST['user'];
$id_cerca = $_REQUEST['id'];
if($user == "" or $id_cerca == "") {
	die("Error no se estan pasando los parametros necesarios");
}
else{
	validar_Salida_Del_Perimetro($id_cerca,$connection,$user);
}
?>