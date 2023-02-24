<html>
	<body>
		<h1>BIENVENIDO/A <br>ESTUDIANTE<br><br>
			<?php					
				session_start();
				$correo = $_SESSION['correo'];
				echo "$correo";
			?>
		</h1>
		<br><img src="img\estudiante.jpg" alt="Estudiantes" height="300">
	</body>
</html>