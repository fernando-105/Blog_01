<!DOCTYPE html>
<html lang="es">
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">

  <title>Buscador avanzado</title>
</head>
<body>
<?php 
  $servidor= "localhost";
  $usuario= "root";
  $password = "";
  $nombreBD= "login";
  $conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
  if ($conexion->connect_error) {
      die("la conexión ha fallado: " . $conexion->connect_error);
  }
  if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
?>

<div class="container mt-5">
<div class="col-12">

<form method="POST" action="index.php">
<div class="mb-3">
<label class="form-label">Palabra a buscar</label>
<input type="text" class="form-control" id="buscar" name="buscar">
</div>

<a href="agregar.php">Agregar usuario</a><br>
<a href="#">Administrar usuario</a><br>
<button type="text" class="btn btn-primary">Buscar</button>
</form>


<div class="card col-12 mt-5">
<div class="card-body">
<!-- recuerda que si no te funciona con mysql_query tienes que cambiarlo por mysqli_query -->
<?php $busqueda=mysqli_query($conexion,"SELECT * FROM registro WHERE Folio LIKE LOWER('%".$_POST["buscar"]."%')"); 
$numero = mysqli_num_rows($busqueda); ?>
<h5 class="card-tittle">Resultado (<?php echo $numero; ?>)</h5>
<?php while ($resultado = mysqli_fetch_assoc($busqueda)){ ?>
<p class="card-tittle"><?php echo $resultado["nombre"]; ?></p>
<?php } ?>
</div>
</div>


</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>

</body>
</html>