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

                    if ($tipo == "recogido") {

                        if ($fila["fecharecogida"] != null) {

                            array_push($_SESSION["filtrado"],$fila);

                        }
    
                    } elseif ($tipo == "pendiente") {
                        
                        if ($fila["fecharecogida"] == null) {

                            array_push($_SESSION["filtrado"],$fila);
                            
                        }

                    } elseif ($tipo == "finalizado") {
                        
                        if ($fila["fechafin"] == null) {

                            array_push($_SESSION["filtrado"],$fila);
                            
                        }

                    }
    
                } 

            } 

        }

        $_SESSION["mantenerFiltrado"] = true;

        $_SESSION["filtradoPrimeraVez"] = true;

    } elseif (isset($_GET["fechaInicio"]) && isset($_GET["fechaFin"]) && isset($_GET["BuscarFecha"])) {

        $_SESSION["filtrado"] = array();
        
        foreach ($_SESSION["filas"] as $fila) {

            if ($_GET["ordenarPor"] == "fechainicio") {
                
                if ($fila["fechainicio"] >= $_GET["fechaInicio"] && $fila["fechainicio"] <= $_GET["fechaFin"]) {
                
                    array_push($_SESSION["filtrado"],$fila);
    
                }

            } elseif ($_GET["ordenarPor"] == "fecharecogida") {

                if ($fila[$_GET["ordenarPor"]] >= $_GET["fechaInicio"] && $fila[$_GET["ordenarPor"]] <= $_GET["fechaFin"]) {
                
                    array_push($_SESSION["filtrado"],$fila);
    
                }
                
            } elseif ($_GET["ordenarPor"] == "fechafin") {

                if ($fila[$_GET["ordenarPor"]] >= $_GET["fechaInicio"] && $fila[$_GET["ordenarPor"]] <= $_GET["fechaFin"]) {
                
                    array_push($_SESSION["filtrado"],$fila);
    
                }

            }

        }

        $_SESSION["mantenerFiltrado"] = true;

        $_SESSION["filtradoPrimeraVez"] = true;

    }


    // echo var_dump($_SESSION["filtrado"]);

    redireccionar("../adminRealizadosAlquileres.php");

?>