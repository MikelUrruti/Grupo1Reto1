<?php 

require("../plantillasphp/redirecciones.php");

session_start();

$_SESSION["checkActivos"] = array();

    if (isset($_GET["buscarTipo"]) || isset($_GET["buscarActivos"])) {

        $_SESSION["filtrado"] = array();

        echo var_dump($_SESSION["filas"])."<br>";

        foreach ($_SESSION["filas"] as $fila) {

            if (isset($_GET["buscarTipo"])) {

                foreach ($_GET["buscarTipo"] as $tipo) {

                    if (!in_array($tipo,$_SESSION["checkActivos"])) {

                        array_push($_SESSION["checkActivos"],$tipo);

                    }
                
                    // echo $fila["tipo"]." : ".$tipo;
                    // echo $tipo;

                    if ($fila["tipo"] == strtolower($tipo)) {
                        
                        // echo " hola ";
                        array_push($_SESSION["filtrado"],$fila);
                        break;
    
                    }
    
                } 

            } if (isset($_GET["buscarActivos"])) {
                
                foreach ($_GET["buscarActivos"] as $estado) {

                    if (!in_array($estado,$_SESSION["checkActivos"])) {
                        
                        array_push($_SESSION["checkActivos"],$estado);

                    }
                
                    if ($fila["estado"] == strtolower($estado)) {
                        
                        if (!in_array($fila,$_SESSION["filtrado"])) {

                            array_push($_SESSION["filtrado"],$fila);
                            break;
                        
                        }
    
                    }
    
                }

            }

        }

    }

    // echo var_dump($_SESSION["filtrado"]);

    redireccionar("../adminUsuarios.php");

?>