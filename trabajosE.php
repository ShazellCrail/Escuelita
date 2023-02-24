<?php

    $conexion = new mysqli("localhost", "root", "", "web");
    
    if($conexion->connect_errno){
        die('Lo siento hubo un problema con el servidor');
    }else{
        $sql = 'SELECT * FROM Cuestionario;';
        $statement = $conexion->prepare($sql);
        $statement->execute();
        $resultado = $statement->get_result();
        $respuesta = [];

        while($fila = $resultado->fetch_assoc()){
            $usuario = [
                'id' => $fila['idCuestionario'],
                'Profesor' => $fila['Profesor'],
                'Titulo' => $fila['Titulo'] ];

                array_push($respuesta,$usuario);
        }
        echo json_encode($respuesta);
    }
?>