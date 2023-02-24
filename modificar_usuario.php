<?php
	include("conectar_bd.php");
	session_start();

	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$fecha_nac = $_POST["fecha_nac"];
	$correo = $_POST["correo"];
	$rol = $_POST["rol"];
	
	$modificar = "UPDATE usuario SET nombre='$nombre', apellidos='$apellidos', fecha_nac='$fecha_nac', rol='$rol' WHERE correo='$correo'";
	$resultado = mysqli_query($conexion, $modificar); 
	if(!$resultado){
		echo 'Error al modificar los datos';
		history.back();
	}
	else{
		echo "<script>
    			alert('Se ha modificado correctamente');
    				window.location= 'tabla_alumnos.php'
    			</script>";
	}
	mysqli_close($conexion);
?>