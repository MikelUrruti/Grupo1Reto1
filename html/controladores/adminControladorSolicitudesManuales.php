<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();

    if (isset($_POST["registrosSeleccionados"])) {
        
        if (isset($_POST["Aprobar"])) {

            $manuales = $_POST["registrosSeleccionados"];

            $consulta = "update Manual set usuarioaprueba = ? where titulo in (";
            $parametros = array($_SESSION["usuario"]);
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
            
        } elseif (isset($_POST["Rechazar"])) {
            
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

        redireccionar("../adminSolicitudesManuales.php");

    } else {
        redireccionar("../adminSolicitudesManuales.php");
    }

?>