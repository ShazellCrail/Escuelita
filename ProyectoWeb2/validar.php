<?php
	$correo=$_POST['correo'];
	$contrasenia = $_POST['contrasenia'];
	session_start();
	$_SESSION['correo']=$correo;
	$conexion=mysqli_connect("localhost", "root", "", "web");
	$consulta="SELECT * FROM usuario WHERE correo='$correo' and contrasenia='$contrasenia'";
	$resultado=mysqli_query($conexion, $consulta);
	$filas=mysqli_fetch_array($resultado);
	$_SESSION['id'] = $filas['id'];
	if($filas['rol']==1){
		header("location:administrador.php");
	}else
		if($filas['rol']==2){
			header("location:profesor.php");
		}else
			if($filas['rol']==3){
				header("location:estudiante.php");
			}else
			echo 'Error';
				 echo "<script>
    			 			alert('Los datos ingresados son INCORRECTOS');
    			 			history.back();
    			 		</script>";

	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
