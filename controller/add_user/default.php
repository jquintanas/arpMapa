<?php
require("../conexiones/conexion.php");
$admin = $_REQUEST['admin'];
$name = $_REQUEST['name'];
$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];
$type = $_REQUEST['type'];
$gps = $_REQUEST['gps'];
$Q_admin = "SELECT admin FROM user";
$R_admin = $connection->query($Q_admin);
$usuarios = array();
while($row_admin = $R_admin->fetch_assoc()){
	array_push($usuarios,$row_admin);
}


if(in_array($admin,$usuarios)){
	$Q_user = "INSERT INTO user(admin,name,user,pass,type,gps) VALUES($admin,$name,$user,$pass,$type,$gps)";
	$connection->query($Q_user);
}
else{
	$Q_user = "INSERT INTO user(admin,name,user,pass,type,gps) VALUES($admin,$name,$admin,$pass,'admin',$gps)";
	$connection->query($Q_user);
}







?>