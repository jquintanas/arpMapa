<?php
$username="admin";
$password="admin";
$database="arpproyecto";
$servidor ="sql302.mipropia.com";
?>

<?php
$connection = new mysqli("localhost",$username,$password,$database) or die ("Conexion erronea");
?>