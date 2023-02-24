<?php 
$nombre = $_POST['nombre'];
$conexion = new mysqli("localhost", "root", "", "web");
    if($conexion->connect_errno){
        die('Lo siento hubo un problema con el servidor');
    }else{
        $sql = 'SELECT * FROM preguntas;';
        $statement = $conexion->prepare($sql);
        $statement->execute();
        $resultado = $statement->get_result();
        $respuesta = [];

        while($fila = $resultado->fetch_assoc()){
            $usuario = [
                'id' => $fila['id'],
                'iPregunta' => $fila['Pregunta'],
                'idCuetionario' => $fila['idCuetionario'] ,
                'Respuesta' => $fila['Respuesta']];

                array_push($respuesta,$usuario);
        }
        echo json_encode($respuesta);
    }
?>