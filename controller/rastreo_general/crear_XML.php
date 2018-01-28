<?php
$user = $_REQUEST['user'];
require("../conexiones/conexion.php");
require("../util/util.php");

$Gps_Del_usuario = obtener_Gps($user,$connection);
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
// Start XML file, echo parent node
echo '<markers>';
foreach($Gps_Del_usuario as $gps_buscar){
	
// Opens a connection to a MySQL server

// Select all the rows in the markers table
//$query = "SELECT * FROM markers WHERE user='$user'";
	$query = "SELECT * FROM markers WHERE user=$user AND idgps='$gps_buscar' ORDER BY `id` DESC LIMIT 1";
$result = $connection->query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}





// Iterate through the rows, printing XML nodes for each
while ($row = $result->fetch_assoc()){
  // Add to XML document node
  echo '<marker ';
  echo'id="' . parseToXML($row['id']) . '" ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo 'idgps="' . $row['idgps'] . '" ';
  echo '/>';
}
}
// End XML file
echo '</markers>';

?>