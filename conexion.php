<?php 

try{


$conexion = new PDO('mysql:host=localhost;dbname=web','root','');

}catch(PDOException $e){
    echo "Error".$e->getMessage();
}
    


?>