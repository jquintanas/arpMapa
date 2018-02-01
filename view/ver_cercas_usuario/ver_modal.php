<?php
$id=$_REQUEST['id'];
$user = $_REQUEST['user'];
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>

<body>
<div class="container">
	<center><h2>Elija que hacer para continuar</h2></center>
  <!-- Trigger the modal with a button -->
	<center><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ver opciones</button></center>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Que hacer</h4>
        </div>
        <div class="modal-body">
         <center>
         <?php
			 $ruta = "../cercas_virtuales/v_default.php?user=".$user."&id=".$id;
			 ?>
         <a href="<?php echo($ruta); ?>">
          <button type="button" class="btn btn-success">Ver</button>
			</a>
          <br>
          <br>
          <?php
		  $ruta= "delete_cerca.php?id=".$id."&user=".$user;
		  ?>
          <a href="<?php echo($ruta); ?>">
			  <button type="button" class="btn btn-danger">Eliminar</button></a>
			</center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</body>
</html>