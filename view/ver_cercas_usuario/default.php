<?php
require("../../controller/conexiones/conexion.php");
require("../../controller/cercas_virtuales/default.php");
$user = $_REQUEST['user'];
$cercas = obtener_Cercas($user,$connection);
$nombres_cercas = obtener_Nombres_Cercas($user,$connection);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/styleVerCercas.css" />
</head>
	
<body>
	<center><h1> Seleccione una cerca para continuar... </h1></center>
<?php
	$i = 0;
foreach($cercas as $idC){
	$ruta = "../cercas_virtuales/v_default.php?user=".$user."&id=".$idC;
	$nombre = $nombres_cercas[$i];
?>
	<a href="<?php echo($ruta); ?>"> <button> Cerca: <?php echo($nombre); ?> </button> </a>

<?php
	$i = $i +1;
}
?>
</body>
</html>