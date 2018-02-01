<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php

$idC = $_REQUEST['id'];
	$user = $_REQUEST['user'];
require("../../controller/conexiones/conexion.php");
function eliminar_cerca($idC,$connection){
	$query ="DELETE FROM id_cercas WHERE id='$idC'";
	$respuesta = $connection->query($query);
	return ($respuesta);
}

if(eliminar_cerca($idC,$connection)){
	?>
	<div class="container">
  <div class="alert alert-success">
    <strong>Exito!</strong> La cerca fue eliminada.
     </div>
	<a href="<?php echo("default.php?user=$user"); ?>">
          <button type="button" class="btn btn-success">Volver</button>
			</a>
	
 
  <?php
	
}
	else{
		?>
		<div class="alert alert-warning">
    <strong>Alerta!</strong> Algo salio mal no se elimino la cerca.
    </div>
    <a href="<?php echo("default.php?user=$user"); ?>">
          <button type="button" class="btn btn-success">Volver</button>
			</a>
  
  <?php
		
	}
?>



</html>