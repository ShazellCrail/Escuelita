<html>
	<body>
		<h1>BIENVENIDO/A <br>PROFESOR/A<br><br>
			<?php					
				session_start();
				$correo = $_SESSION['correo'];
				echo $correo;
			?>
		</h1>
		<img src="img\profesor.jpg" alt="Profesores" height="400">
	</body>
</html>