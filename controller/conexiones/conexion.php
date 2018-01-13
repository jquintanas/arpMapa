<?php
$username="admin";
$password="admin";
$database="arpproyecto";
?>

<?php
$connection = new mysqli("localhost",$username,$password,$database) or die ("Conexion erronea");
?>