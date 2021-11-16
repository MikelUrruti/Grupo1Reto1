<?php 

require("../plantillasphp/redirecciones.php");

session_start();

$_SESSION["checkActivos"] = array();

    if (isset($_GET["buscarCategoria"]) || isset($_GET["buscarFabricante"])) {

        $_SESSION["filtrado"] = array();

        foreach ($_SESSION["filas"] as $fila) {

            if (isset($_GET["buscarCategoria"])) {

                foreach ($_GET["buscarCategoria"] as $tipo) {

                    if (!in_array($tipo,$_SESSION["checkActivos"])) {

                        array_push($_SESSION["checkActivos"],$tipo);

                    }
                
                    echo $fila["categoria"]." : ".$tipo."<br>";
                    // echo $tipo;

                    if (strtolower($fila["categoria"]) == strtolower($tipo)) {
                        
                        // echo " hola ";
                        array_push($_SESSION["filtrado"],$fila);
                        break;
    
                    }
    
                } 

            } if (isset($_GET["buscarFabricante"])) {
                
                foreach ($_GET["buscarFabricante"] as $estado) {

                    if (!in_array($estado,$_SESSION["checkActivos"])) {
                        
                        array_push($_SESSION["checkActivos"],$estado);

                    }
                
                    if (strtolower($fila["fabricante"]) == strtolower($estado)) {
                        
                        if (!in_array($fila,$_SESSION["filtrado"])) {

                            array_push($_SESSION["filtrado"],$fila);
                            break;
                        
                        }
    
                    }
    
                }

            } if (isset($_GET["buscarEstado"])) {
                
                foreach ($_GET["buscarEstado"] as $estado) {

                    if (!in_array($estado,$_SESSION["checkActivos"])) {
                        
                        array_push($_SESSION["checkActivos"],$estado);

                    }
                
                    if (strtolower($fila["estado"]) == strtolower($estado)) {
                        
                        if (!in_array($fila,$_SESSION["filtrado"])) {

                            array_push($_SESSION["filtrado"],$fila);
                            break;
                        
                        }
    
                    }
    
                }

            }

        }

        $_SESSION["mantenerFiltrado"] = true;

        $_SESSION["filtradoPrimeraVez"] = true;

        

    }

    redireccionar("../adminHerramientasAlmacen.php");

?>