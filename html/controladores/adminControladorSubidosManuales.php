<?php
require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();

    if (count($_POST["registrosSeleccionados"]) > 0) {
        
        if (isset($_POST["Modificar"])) {

            if (count($_POST["registrosSeleccionados"]) == 1) {
                
                redireccionar("../formularioModificarManual.php");

            } else {

                redireccionar("../adminSubidosManuales.php");
                
            }

        } elseif (isset($_POST["Eliminar"])) {
            
            $manuales = $_POST["registrosSeleccionados"];

            $consulta = "delete from Manual where titulo in (";
            $parametros = array();
            $contador = 0;
    
            foreach ($manuales as $manual) {
                
                array_push($parametros,$manual);
    
                if ($contador == count($manuales)-1) {
                    
                    $consulta .= "?);";
    
                } else {
                    
                    $consulta .= "?, ";
    
                }
    
                $contador++;
    
            }

            $consulta = manipularDatoBD($consulta,$parametros);

            echo $consulta;

        }

        redireccionar("../adminSubidosManuales.php");

    } else {
        redireccionar("../adminSubidosManuales.php");
    }

?>