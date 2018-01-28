<?php

$id = $_REQUEST['id'];
$query = "SELECT lat, lng, user FROM markers WHERE id='$id'";
$resultado = $connection->query($query);
$row = $resultado->fetch_assoc();
$lat_id = $row['lat'];
$lng_id = $row['lng'];
$user = $row['user'];
echo("<script>");
echo("var lat_id = $lat_id;");
echo("var lng_id = $lng_id;");
echo("</script>");
$query = "SELECT lat, lng FROM markers WHERE user='$user' AND type='administrador'";
$resultado = $connection->query($query);
$row = $resultado->fetch_assoc();
$lat_id = $row['lat'];
$lng_id = $row['lng'];
echo("<script>");
echo("var lat_admin = $lat_id;");
echo("var lng_admin = $lng_id;");
echo("</script>");

?>
