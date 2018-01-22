<?php
require("../conexiones/conexion.php");
/*la funcion inserta los datos en una db con los puntos de las coordenadas y asigna un id a la cerca*/
function dibujar_Cerca($lat1,$lat2,$lat3,$lat4,$lng1,$lng2,$lng3,$lng4,$connection){
	$query = "INSERT INTO id_cercas(lat1, lat2, lat3, lat4, lng1, lng2, lng3, lng4) VALUES('$lat1','$lat2','$lat3','$lat4','$lng1','$lng2','$lng3','$lng4')";
	$resultado = $connection->query($query);
	return($resultado);
}

/*en base al id de una cerca la funcion asigna hasta 5 gps por cerca*/
function crear_cerca($id_cerca,$id_gps,$connection){
	if(count($id_gps) > 0){
		$query = "INSERT INTO cercas(id_cerca,gps1) VALUES('$id_cerca','$id_gps[0]')";
		$resultado = $connection->query($query);
		for($i = 1;$i < count($id_gps); $i++){
			$gps = "gps".($i+1);
			$query = "UPDATE cercas SET ".$gps;
			$id = $id_gps[$i];
			$query = $query. " =". $id." WHERE id_cerca = ".$id_cerca;
			$resultado = $connection->query($query);
		}
		return($resultado);
	}
	else{
		die("no ingreso datos");
	}
	
}

/*con el id del usuario obtiene todas las cercas que ha creado*/
function obtener_Cercas($usuario,$connection){
	$query_cercas = "SELECT id FROM id_cercas WHERE user='$usuario'";
	$resultado1 = $connection->query($query_cercas);
	$row1 = $resultado1->fetch_assoc();
	$devuelto = array();
	foreach($row1 as $row){
		array_push($devuelto,$row);
	}
	return($devuelto);
}

/*con el id de la cerca obtiene los id de los gps asociados*/
function obtener_Gps_asociados($connection,$id_cerca){
	$query = "SELECT gps1, gps2, gps3, gps4, gps5 FROM cercas WHERE id_cerca='$id_cerca'";
	$resultado = $connection->query($query);
	$row = $resultado->fetch_assoc();
	$devuelto = array();
	foreach($row as $row1){
		array_push($devuelto,$row1);
	}
	return($devuelto);
	
}


function validar_Salida_Del_Perimetro($id_cerca,$connection,$usuario){
	$query1 = "SELECT lat1, lat3, lng1, lng2 FROM id_cercas WHERE id='$id_cerca' AND user='$usuario'";
	$respuesta = $connection->query($query1);
	$row1 = $respuesta->fetch_assoc();
	$lat1=$row1['lat1'];
	$lng1=$row1['lng1'];
	$lat2=$row1['lat3'];
	$lng2=$row1['lng2'];
	function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}
	

header("Content-type: text/xml");
	echo '<markers>';

// Start XML file, echo parent node
$id_gps = obtener_Gps_asociados($connection,$id_cerca);
for($i=0;$i < count($id_gps);$i++){
	$gps = $id_gps[$i];
	$query = "SELECT * FROM markers WHERE idgps='$gps' AND user='$usuario'";
	$result = $connection->query($query);
	// Iterate through the rows, printing XML nodes for each
while ($row = $result->fetch_assoc()){
  // Add to XML document node
	
	if($row['lat'] <= $lat1 and $row['lat'] >= $lat2){
		if($row['lng'] >= $lng1 and $row['lng'] <= $lng2){
			
	}
	else{
		echo '<marker ';
			  echo'id="' . parseToXML($row['id']) . '" ';
			  echo 'name="' . parseToXML($row['name']) . '" ';
			  echo 'address="' . parseToXML($row['address']) . '" ';
			  echo 'lat="' . $row['lat'] . '" ';
			  echo 'lng="' . $row['lng'] . '" ';
			  echo 'type="' . $row['type'] . '" ';
				echo 'idgps="' . parseToXML($row['idgps']) . '" ';
			  echo '/>';
	}
}
	else{
		echo '<marker ';
			  echo'id="' . parseToXML($row['id']) . '" ';
			  echo 'name="' . parseToXML($row['name']) . '" ';
			  echo 'address="' . parseToXML($row['address']) . '" ';
			  echo 'lat="' . $row['lat'] . '" ';
			  echo 'lng="' . $row['lng'] . '" ';
			  echo 'type="' . $row['type'] . '" ';
				echo 'idgps="' . parseToXML($row['idgps']) . '" ';
			  echo '/>';
	}
}

// End XML file

	
}
echo '</markers>';
}

?>