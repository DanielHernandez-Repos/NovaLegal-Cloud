<?php

// importamos la conexion de la base de datos
// dir representa la carpeta del archivo actual
require_once __DIR__ . '/../config/database.php';

class Usuario
{
    // representa la conexion a la base de datos
    // private por que solo se puede ocupar dentro de la clase
    private $conexion;

    // variable que guarda el error 
    private $error;

    // contructor 
    public function __construct($conexion)
    {
        // guarda en la propiedad conexion la conexion que viene de datosbase
        $this->conexion = $conexion;
    }

    // funcion registar usuario
    public function registrar($nombre, $email, $password, $rol)
    {
        // genera un has seguro y PASSWORD_DEFAULT es un algoritmo por defecto
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // generamos el sql para agregar
        $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (?,?,?,?)";

        // perparamos una consulta para despues proporcionar valores
        $preparesql = $this->conexion->prepare($sql);

        if(!$preparesql){
            $this->error = $preparesql->error;
            return false;
        }


        // le mandamos los valores a la sentencia preparada
        $preparesql->bind_param("ssss", $nombre, $email, $passwordHash, $rol);


        $resultado = $preparesql->execute();

        // cachamos el error 
        if($resultado){
            $this->error = $preparesql->error;
        }

        // cerramos la consulta
        $preparesql->close();

        // devolvemos el resultado
        return $resultado;
    }


    // metodo para consultar el error
    public function getError(){
        return $this->error;
    }
}









?>