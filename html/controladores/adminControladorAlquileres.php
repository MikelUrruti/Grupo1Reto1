<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();

    if (count($_POST["registrosSeleccionados"]) > 0) {
        
        $solicitudes = $_POST["registrosSeleccionados"];

        if (isset($_POST["Rechazar"])) {

            $parametrosComprobacionAceptado = array();

            $consultaComprobarAceptado = "select id from Alquiler where fecharecogida is not null and fechafin is not null and id in (";

            $contador = 0;

            foreach ($solicitudes as $solicitud) {

                if (count($solicitudes)-1 == $contador) {

                    $consultaComprobarAceptado .= "?);";

                } else {

                    $consultaComprobarAceptado .= "?, ";

                }
            
                array_push($parametrosComprobacionAceptado,$solicitud);

                $contador++;
            
            }

            $consultaComprobarAceptado = consultarDatoBD($consultaComprobarAceptado,$parametrosComprobacionAceptado);

            if (count($consultaComprobarAceptado) > 0) {

                $_SESSION["errorAccion"] = "No se pueden rechazar alquileres que hayan sido recogidos o finalizados";

            } else {
                
                $parametrosEliminar = array();

                $parametrosActualizar = array();

                $consultaEliminar = "delete from Alquiler where id in (";

                $consultaActualizar = "update Solicitud set estado = 'rechazada' where id in (select idsolicitud from Alquiler where id in (";

                $contador = 0;

                foreach ($solicitudes as $solicitud) {
    
                    array_push($parametrosEliminar,$solicitud);
    
                    array_push($parametrosActualizar,$solicitud);
    
                    if (count($solicitudes)-1 == $contador) {
 
                        $consultaActualizar .= "?));";

                        echo $consultaActualizar;
    
                        $consultaActualizar = manipularDatoBD($consultaActualizar,$parametrosActualizar);

                        $consultaEliminar .= "?);";
    
                        $consultaEliminar = manipularDatoBD($consultaEliminar,$parametrosEliminar);
    
                    } else {
    
                        $consultaEliminar .= "?, ";
    
                        $consultaActualizar .= "?, ";
    
                    }

                    $contador++;

                }

            }
            
        } elseif (isset($_POST["Recoger"])) {

            

            
        
        } elseif (isset($_POST["Finalizar"])) {
            
            $parametrosComprobacionRecogido = array();

            $consultaComprobarRecogido = "select id from Alquiler where fecharecogida is null and id in (";

            $contador = 0;

            foreach ($solicitudes as $solicitud) {

                if (count($solicitudes)-1 == $contador) {

                    $consultaComprobarRecogido .= "?);";

                } else {

                    $consultaComprobarRecogido .= "?, ";

                }
            
                array_push($parametrosComprobacionRecogido,$solicitud);

                $contador++;
            
            }

            $consultaComprobarRecogido = consultarDatoBD($consultaComprobarRecogido,$parametrosComprobacionRecogido);

            if (count($consultaComprobarRecogido) > 0) {
                
                $_SESSION["errorAccion"] = "No se pueden finalizar alquileres que aun no hayan sido recogidos";

            } else {
                
                $parametrosFinalizar = array();

                $consultaFinalizar = "update Solicitud set estado = 'rechazada' where id in (select idsolicitud from Alquiler where id in (";

                $contador = 0;

                foreach ($solicitudes as $solicitud) {
    
                    array_push($parametrosFinalizar,$solicitud);
    
                    if (count($solicitudes)-1 == $contador) {
 
                        $consultaActualizar .= "?));";

                        echo $consultaActualizar;
    
                        $consultaActualizar = manipularDatoBD($consultaActualizar,$parametrosFinalizar);
    
                    } else {
    
                        $consultaEliminar .= "?, ";
    
                        $consultaActualizar .= "?, ";
    
                    }

                    $contador++;

                }

            }

        }

    } else {
        redireccionar("../adminRealizadosAlquileres.php");
    }

?>