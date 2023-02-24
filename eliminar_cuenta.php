<?php
	include("conectar_bd.php");
	session_start();
	$correo = $_SESSION['correo'];
	$id = $_GET["id"];
	$correo = $_SESSION['correo'];
	$eliminar = "DELETE FROM usuario WHERE correo = '$id'";
	$resultado = mysqli_query($conexion, $eliminar);

	if($resultado){
		if($id == $correo){
			echo "<script>
    				alert('Se ha eliminado la cuenta');
    				window.location= 'index.php'
    				</script>";
		}else{
			echo "<script>
    				alert('Se ha eliminado la cuenta');
    				history.back();
    				</script>";
		}
	}else{
		echo "<script>
    				alert('No se ha podido eliminar la cuenta');
    				history.back();
    			</script>";
	}
	
	mysqli_close($conexion);
?>