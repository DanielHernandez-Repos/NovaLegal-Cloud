<?php

// definimos las variables a ocupar
$host = "localhost";
$usuario = "root";
$password = "";
$db = "novalegal_cloud";

// Realizamos la conexion 
$conexion = new mysqli($host, $usuario, $password, $db);


// verificamos si existe un error
if($conexion->connect_error){
    echo $conexion->connect_error;
}


$conexion->set_charset("utf8mb4");

?>