<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'sections/header.php'?>
	<title>Inicio de sesion</title>
</head>
<body>
<?php include 'sections/nav.php'?>
<div class="container">
<form action="validar.php" method="post">
  <div class="mb-3">
    <br><label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="contrasenia">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Recordar</label>
  </div>
  <button type="submit" class="btn btn-primary">ENVIAR</button>
</form>
</div>
<?php include 'sections/scripts.php'?>
</body>
</html>