<?php
	include("conectar_bd.php");
	if(!$conexion){
		echo 'Error al conectar a la base de datos';
	}

	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$fecha_nac = $_POST["fecha_nac"];
	$correo = $_POST["correo"];
	$contrasenia = $_POST["contrasenia"];
	$confirmacion = $_POST["confirmacion"];
	$rol = $_POST["rol"];

	if($contrasenia != $confirmacion){
		echo '<script>
    				alert("La contrase\361a y la confirmaci\363n de la contrase\361a son diferentes");
				history.back();
    			</script>';
		die();
	}
	
	$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo = '$correo'");
	if(mysqli_num_rows($verificar_usuario) > 0){
		echo '<script type="text/javascript">
    				alert("Este correo ya se encuentra registrado");
				history.back();
    			</script>';
		exit;
	}

	$insertar = "INSERT INTO usuario(nombre, apellidos, fecha_nac, correo, contrasenia, rol) VALUES ('$nombre', 
		'$apellidos', '$fecha_nac', '$correo', '$contrasenia', '$rol')";
	$resultado = mysqli_query($conexion, $insertar); 
	if(!$resultado){
		echo 'Error al registrarse';
	}
	else{
		echo "<script>
    			alert('Se ha registrado correctamente');
    				window.location= 'tabla_alumnos.php'
    			</script>";
	}
	mysqli_free_result($verificar_usuario);
	mysqli_close($conexion);
?>