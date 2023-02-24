<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'sections/header.php'?>
    <title>Crea un cuestionario</title>
   
</head>
<body>
    <?php include 'sections/navdentro.php'?>

    <div class="container">
    <form method="POST" action="subircuest.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Nombre del cuestionario</label>
    <input type="text" class="form-control" name="titulo" aria-describedby="emailHelp">
  </div>
  
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
</div>



    <?php include 'sections/scripts.php'?>
</body>
</html>