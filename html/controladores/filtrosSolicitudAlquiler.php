<?php 

require("../plantillasphp/redirecciones.php");

session_start();

$_SESSION["checkActivos"] = array();

    if (isset($_GET["buscarEstado"]) || isset($_GET["buscarActivos"])) {

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

    }

    // echo var_dump($_SESSION["filtrado"]);

    redireccionar("../adminSolicitudesAlquileres.php");

?>