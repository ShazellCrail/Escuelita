<html>
	<head>
		<link rel="stylesheet" href="css\menu.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
		<script>
			$(document).ready(function(){
				$('#cuenta').ready(function(){
					$('#contenido').load("inicio_profesor.php");
				});
			});
		</script>
		<?php include 'sections/header.php'?>
	</head>
	<body>
	<?php include 'sections/navdentro.php'?>
		<div id="contenido" align="center" width= "100%">
		</div>
		<?php include 'sections/scripts.php'?>
	</body>
</html>