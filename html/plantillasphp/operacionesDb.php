<?php 

$datosConexion = require_once("dbconfig.php");



function select(string $consulta, string $ejecutar){

    global $datosConexion;
    // $datosConexion = require_once("dbconfig.php");
    echo var_dump($datosConexion);

    try {

        $conexion = new PDO("mysql:host=".$datosConexion['host'].";port=3306;dbname=".$datosConexion['db'], $datosConexion['user'], $datosConexion['password']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta=$conexion->prepare($consulta);
        $consulta->execute();
        $resultados = $consulta->fetchAll();

        foreach ($resultados as $valor) {
            
            eval($ejecutar);

        }
        
    } catch (\Throwable $th) {
        


    }



}

echo select("select * from categoria","echo".$valor['nombre'].";");

?>