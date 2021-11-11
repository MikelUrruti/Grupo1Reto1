<?php 

require("../plantillasphp/redirecciones.php");
require("../plantillasphp/operacionesDb.php");

session_start();

$_SESSION["checkActivos"] = array();

    if (isset($_GET["buscarEstado"])) {

        $_SESSION["filtrado"] = array();

        foreach ($_SESSION["filas"] as $fila) {

            if (isset($_GET["buscarEstado"])) {

                foreach ($_GET["buscarEstado"] as $tipo) {

                    if (!in_array($tipo,$_SESSION["checkActivos"])) {

                        array_push($_SESSION["checkActivos"],$tipo);

                    }
                
                    // echo $fila["tipo"]." : ".$tipo;
                    // echo $tipo;

                    if ($fila["estado"] == strtolower($tipo)) {
                        
                        // echo " hola ";
                        array_push($_SESSION["filtrado"],$fila);
                        // break;
    
                    }
    
                } 

            } 

        }

        $_SESSION["mantenerFiltrado"] = true;

        $_SESSION["filtradoPrimeraVez"] = true;

    } elseif (isset($_GET["fechaInicio"]) && isset($_GET["fechaFin"]) && isset($_GET["BuscarFecha"])) {

        $_SESSION["filtrado"] = array();
        
        foreach ($_SESSION["filas"] as $fila) {
            
            if ($fila["fechasolicitud"] >= $_GET["fechaInicio"] && $fila["fechasolicitud"] <= $_GET["fechaFin"]) {
                
                array_push($_SESSION["filtrado"],$fila);

            }

        }

        $_SESSION["mantenerFiltrado"] = true;

        $_SESSION["filtradoPrimeraVez"] = true;

    }


    // echo var_dump($_SESSION["filtrado"]);

    redireccionar("../adminSolicitudesAlquileres.php");

?>