<?php
//require("../conexiones/conexion.php");
//obtiene los gps asociados a un usuario
function obtener_Gps($user,$connection){
	$query = "SELECT idgps FROM markers WHERE user='$user'";
	$resultado = $connection->query($query);
	$array_SQL = array();
	while ($row = $resultado->fetch_assoc()){
		array_push($array_SQL,$row);
	}
	$array_SQL_Elementos_Repetidos = array();
	foreach($array_SQL as $row1){
		array_push($array_SQL_Elementos_Repetidos,$row1['idgps']);
	}
	$array_SQL_Sin_Elementos_repetidos = array_unique($array_SQL_Elementos_Repetidos);
	
	return($array_SQL_Sin_Elementos_repetidos);
}


//inserta o actualiza la posicion del usuario administrador
function actualizar_Posicion_Administrador($lat,$lng,$user,$connection,$nombre){
	$query = "SELECT * FROM markers WHERE user='$user' AND type='administrador'";
	$resultado = $connection->query($query);
	$array_SQL = array();
	while ($row = $resultado->fetch_assoc()){
		array_push($array_SQL,$row);
	}
	if(count($array_SQL) > 0){
		$query = "UPDATE markers SET lat='$lat', lng='$lng', name='$nombre' WHERE user='$user' AND type='administrador'";
		$resultado = $connection->query($query);
		//aqui un update
	}
	else{
		$query = "INSERT INTO markers(name,lat,lng,type,user,idgps) VALUES('$nombre','$lat','$lng','administrador','$user','0')";
		$resultado = $connection->query($query);
		//aqui un insert
	}
}

//inserta datos del gps a la base de datos para els sitema de rastro

function insertar_Datos_del_Gps($user,$nombre,$lat,$lng,$type,$idGps,$connection){
	$query = "INSERT INTO markers(name,lat,lng,type,user,idgps) VALUES('$nombre','$lat','$lng','$type','$user','$idGps')";
	$resultado = $connection->query($query);
	
}

?>