<?php
session_start();
include 'conexion.php';
$id =  $_SESSION['id'];
if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
    $titulo = $_POST['titulo'];
    $statement = $conexion->prepare('INSERT INTO Cuestionario values (null,:usuarios,:pass)');
     $statement->execute(array(
         ':usuarios'=> $id,
         ':pass'=> $titulo
     ));
    }

$sentencia = $conexion->prepare('select  max(idCuestionario) from Cuestionario;');
$sentencia->execute();

$resultado = $sentencia->fetch();
$numcuest = $resultado['0'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'sections/header.php'?>
    <title>Preguntas</title>
</head>
<body>

    <?php include 'sections/navdentro.php'?>

    <div class="container">
    <form method="POST" action="cuestionario.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Pregunta</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="pregunta" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Respuesta</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="respuesta">
    <input type="hidden" value= <?php echo $numcuest?> name="cuestionario">
  </div>
  <button type="submit" class="btn btn-primary" id="enviar">Agregar </button>
</form>
<button id="terminar">Terminar formulario</button>
    </div>

        


        <script>

            console.log('Entra')
            var terminar = document.getElementById("terminar")

        terminar.addEventListener("click", function(){
            console.log("Terminar")
                window.location="profesor.php";
        }
       
        );

        </script>

    <?php include 'sections/scripts.php'?>
</body>
</html>