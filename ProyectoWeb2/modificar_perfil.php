<?php
	$conexion = mysqli_connect("localhost", "root", "", "web");
	if(!$conexion){
		echo 'Error al conectar a la base de datos';
	}

	session_start();

	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$fecha_nac = $_POST["fecha_nac"];
	$correo = $_POST["correo"];
	$rol = $_POST["rol"];
	$nuevaContrasenia = $_POST["nuevaContrasenia"];
	$contrasenia = $_POST["contrasenia"];
	
	$consulta="SELECT * FROM usuario WHERE correo='$correo' and contrasenia='$contrasenia'";
	$resultadoContrasenia=mysqli_query($conexion, $consulta);
	$filas=mysqli_fetch_array($resultadoContrasenia);
	if($filas['contrasenia'] != $contrasenia){
		echo '<script>
    				alert("Contrase\361a incorrecta");
				history.back();
    			</script>';
		die();
	}else{
		if($nuevaContrasenia != ""){
			$contrasenia = $nuevaContrasenia;
		}

		$modificar = "UPDATE usuario SET nombre='$nombre', apellidos='$apellidos', fecha_nac='$fecha_nac', contrasenia='$contrasenia', rol='$rol' WHERE correo='$correo'";

		$resultado = mysqli_query($conexion, $modificar); 
		if(!$resultado){
			echo 'Error al modificar los datos';
			history.back();
		}
		else{
			echo "<script>
    			alert('Se ha modificado correctamente');
    				window.location= 'cuenta.php'
    			</script>";
		}
	}
	mysqli_free_result($resultadoContrasenia);
	mysqli_close($conexion);
?>