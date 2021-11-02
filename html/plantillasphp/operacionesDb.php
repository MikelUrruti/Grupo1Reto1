<?php 

$datosConexion = require_once("dbconfig.php");

function manipularDatoBD(string $consulta, array $parametros) {

    global $datosConexion;

    try {
        
           $conexion = new PDO("mysql:host=".$datosConexion['host'].";port=3306;dbname=".$datosConexion['db'], $datosConexion['user'], $datosConexion['password']);
           $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $consulta=$conexion->prepare($consulta);

           $contador=1;

           foreach ($parametros as $parametro) {

                $consulta->bindValue($contador,$parametro);
                $contador++;

           }

           $consulta->execute();
           
           if ($consulta->rowCount() > 0) {

                return true;

           } else {
               
                return 0;

           }

    } catch (PDOException $th) {

        return $th->errorInfo[1];

    }

}

function consultarDatoBD(string $consulta, array $parametros = array()) {

    global $datosConexion;

    try {
        
        $conexion = new PDO("mysql:host=".$datosConexion['host'].";port=3306;dbname=".$datosConexion['db'], $datosConexion['user'], $datosConexion['password']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta=$conexion->prepare($consulta);

        
        $contador=1;

        foreach ($parametros as $parametro) {
            
            $consulta->bindValue($contador,$parametro);
            $contador++;

        }

        $consulta->execute();

        $filas=$consulta->fetchAll();

        return $filas;


    } catch (PDOException $th) {

        return procesarErroresComunes($th->errorInfo[1]);

    }

}

function procesarErroresComunes($codigoError) {
    
    if ($codigoError == 2002) {
        
        return "Error de conexion a la base de datos, comprueba que el servidor de base de datos al que se conecta la aplicacion esté bien configurado.";

    } elseif ($codigoError == 1049) {
        
        return "La base de datos indicada no existe.";

    } elseif ($codigoError == 1045) {

        return "Las credenciales del usuario con el que se conecta a la base de datos son incorrectas.";

    } elseif ($codigoError == 1146 || $codigoError == 1064 || $codigoError == 1136 || $codigoError == 1054) {
    
        return "La operacion a realizar no puede llevarse a cabo debido a que la misma esta mal configurada, por favor, contacte con el administrador del sitio web para resolver este problema.";

    } else {

        return "Se ha producido el siguiente error a la hora de trabajar con la base de datos: ".$codigoError.". Por favor, contacta con el administrador del sitio web para que resuelva este problema";

    }

}

function erroresInsertar($codigoError, array $unicos) {

    if ($codigoError == 1062) {
        
        $error = "Alguno de los siguientes campos puede que esten siendo utilizados por otro usuario: ";

        for ($i=0; $i < count($unicos); $i++) { 
            
            if ($i == count($unicos)-1) {
                
                $error .= " o ".$unicos[$i];

            } else {
                
                $error .= $unicos[$i].", ";

            }

        }

        $error .= ".";

        return $error;

    } else {

        return procesarErroresComunes($codigoError);

    }

}

// echo 
// echo manipularDatoBD("insert into Categoria values ('peter2','peter','peter');");
// echo manipularDatoBD("delete from Categoria where nombre='peter2';");

?>