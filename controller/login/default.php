<?php
require("../conexiones/conexion.php");
$usuario = $_REQUEST['user'];
$pass = $_REQUEST['pass'];
$query = "SELECT * FROM user WHERE user=$usuario AND pass=$pass";
$respuesta = $connection->query($query)->fetch_assoc();

if($respuesta){
	
	$mensaje = $respuesta['admin'] . ", ". $respuesta['name']." ," . $respuesta['user']." ,".$respuesta['pass']." ," ;
	$mensaje  = $mensaje . $respuesta['type']. " ,". $respuesta['gps'];
	echo($mensaje);
}
else{
	echo("0");
}


?>