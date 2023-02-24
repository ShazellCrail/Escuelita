<?php
	session_start();
	include("conectar_bd.php");
	$id = $_GET["id"];
	$consulta="SELECT * FROM usuario WHERE correo='$id'";
	$resultado=mysqli_query($conexion, $consulta);
	$filas = mysqli_fetch_array($resultado);
	$dato1 = $filas['nombre'];
	$dato2 = $filas['apellidos'];
	$dato3 = $filas['fecha_nac'];
	$dato4 = $filas['contrasenia'];
	$dato5 = $filas['correo'];
	$dato6 = $filas['rol'];
?>
<!DOCTYPE html>
<html>
	<head>
        		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
		<form action="modificar_usuario.php" method="post" align="center">
	       		<h1><u>EDITAR USUARIO</u></h1><br><br>
			<font face="Arial">
				<table align="center">
					<tr>
						<td><label>NOMBRE(S):</label></td>
						<td><input type="text" name="nombre" title="Solo el(los) nombre(s), sin apellidos" value="<?php echo $dato1;?>" required></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><label>APELLIDOS:</label></td>
	       					<td><input type="text" name="apellidos" title="Primero el apellido paterno, seguido del apellido materno" value="<?php echo $dato2;?>" required></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><label>FECHA DE NACIMIENTO:</label></td>
						<td><input type="date" name="fecha_nac" value="<?php echo $dato3;?>" required></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><label>CORREO ELECTR&Oacute;NICO:</label></td>
	       					<td><input type="email" name="correo" title="No puedes modificar el correo" value="<?php echo $dato5;?>" readonly></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><label>ROL:</label></td>
						<td>
							<?php
								if($dato6 == 2){
							?>
									<select name="rol" size="1" required>
  										<option value="2">Profesor</option>
						  			 </select>
								<?php }else{ ?>
									<select name="rol" size="1" required>
  										<option value="3">Estudiante</option>
						  			</select>
								<?php } ?>
						</td>
					</tr>
				</table>
			</font>
			<br><br><input type="submit" name="enviar" value="GUARDAR CAMBIOS">
        	</form>
    	</body>
</html>

<?php
	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>