<?php
	include("conectar_bd.php");
	session_start();
	$usuarios = "SELECT * FROM usuario WHERE rol=3";
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include 'sections/header.php'?>
		<meta charset="UTF-8">
		<title></title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="css\tabla.css">
	</head>
	<script type="text/javascript">
		function ConfirmDelete(){
			var respuesta = confirm("\u00bfEst\u00e1s seguro de que deseas eliminar la cuenta?");
			if(respuesta == true){	
				return true;
			}else{
				return false;
			}
		}
	</script>
	<body>
		<?php include 'sections/navdentro.php'?>
		<h1 align="center"><u>ALUMNOS</u></h1><br><br>
		<table align="center">
			<tr>
				<td class="encabezado">NOMBRE(S)</td>
				<td class="encabezado">APELLIDOS</td>
				<td class="encabezado">FECHA DE NACIMIENTO</td>
				<td class="encabezado">CONTRASE&Ntilde;A</td>
				<td class="encabezado">ACCI&Oacute;N</td>
			</tr>
			<?php $resultado = mysqli_query($conexion, $usuarios);
			while($row = mysqli_fetch_assoc($resultado)){ ?>
				<tr>
					<td> <?php echo $row["nombre"];?> </td>
					<td> <?php echo $row["apellidos"];?> </td>
					<td> <?php echo $row["fecha_nac"];?> </td>
					<td> <?php echo $row["correo"];?> </td>
					<td> <a href="editar_usuario.php?id=<?php echo $row["correo"];?>">Editar</a> | <a href="eliminar_cuenta.php?id=<?php echo $row["correo"];?>" onclick="return ConfirmDelete()">Eliminar</a></td>
				</tr>
				<?php 
			} 
				mysqli_free_result($resultado);
				?>
		</table>
		<form  align="center">
			<br><br><a href="agregar_alumno.html"><input type="button" value="AGREGAR NUEVO"></a>
		</form>
		<?php include 'sections/scripts.php'?>
	</body>
</html>