<?php 
session_start();
include 'conexion.php';

$pregunta = $_POST['pregunta'];
$respuesta = $_POST['respuesta'];
$cuestionario = $_POST['cuestionario'];

$sentencia = $conexion->prepare('INSERT INTO Preguntas VALUES (null, :pregunta,:respuesta,:cuestionario);');
$sentencia->execute(array(
    ':pregunta' => $pregunta,
    ':respuesta' => $respuesta,
    ':cuestionario' => $cuestionario
));

header('Location:subircuest.php');


?>