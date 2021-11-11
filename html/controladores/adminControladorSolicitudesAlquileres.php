<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();

    if (count($_POST["registrosSeleccionados"]) > 0) {
        
        if (isset($_POST["Aprobar"])) {

            $solicitudes = $_POST["registrosSeleccionados"];

            $parametrosComprobacionAceptado = array();

            $consultaComprobarAceptado = "select id from Solicitud where estado in ('rechazada','expirada') and id in (";

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

                $_SESSION["errorAccion"] = "No se pueden aprobar solicitudes que hayan sido rechazadas o expiradas";

            } else {

                $parametrosComprobacion = array();

                $consultaComprobar = "select distinct(nombre), stock from Herramienta join Solicitud on Herramienta.nombre=Solicitud.herramientasolicitada where id in (";

                $contador = 0;

                foreach ($solicitudes as $solicitud) {

                    if (count($solicitudes)-1 == $contador) {

                        $consultaComprobar .= "?);";

                    } else {

                        $consultaComprobar .= "?, ";

                    }
                
                    array_push($parametrosComprobacion,$solicitud);

                    $contador++;
                
                } 

                $consultaComprobar = consultarDatoBD($consultaComprobar,$parametrosComprobacion);

                foreach ($consultaComprobar as $solicitud) {

                    if ($solicitud["stock"] == 0) {

                        $_SESSION["errorAccion"] = "No se puede alquilar la herramienta (".$solicitud["nombre"].") por que no tiene stock disponible (comprueba que todas las herramientas a alquilar tengan stock)";
                        break;
        
                    } 

                }

                if (!isset($_SESSION["errorAccion"])) {

                    $parametrosInsertar = array();

                    $parametrosActualizar = array();
        
                    $parametrosActualizarSolicitud = array(); 

                    $consultaInsertar = "insert into Alquiler(fechainicio, idsolicitud) values ";

                    $consultaActualizar = "update Herramienta set stock=stock-? where nombre in (select distinct(herramientasolicitada) from Solicitud where id in (";
        
                    $consultaActualizarSolicitud = "update Solicitud set estado='aceptada' where id in (";

                    array_push($parametrosActualizar,count($solicitudes));

                    $contador = 0;
                    
                    foreach ($solicitudes as $solicitud) {
                    
                        array_push($parametrosInsertar,date("y-m-d"));
            
                        array_push($parametrosInsertar,$solicitud);
        
                        array_push($parametrosActualizar,$solicitud);
        
                        array_push($parametrosActualizarSolicitud,$solicitud);
        
                        if (count($solicitudes)-1 == $contador) {
                            $consultaInsertar .= "(?, ?);";
        
                            $consultaInsertar = manipularDatoBD($consultaInsertar,$parametrosInsertar);
        
                            $consultaActualizar .= "?));";
        
                            $consultaActualizar = manipularDatoBD($consultaActualizar,$parametrosActualizar);
        
                            $consultaActualizarSolicitud .= "?);";
        
                            $consultaActualizarSolicitud = manipularDatoBD($consultaActualizarSolicitud,$parametrosActualizarSolicitud);
        
                        } else {
        
                            $consultaInsertar .= "(?, ?), ";
        
                            $consultaActualizar .= "?, ";
        
                            $consultaActualizarSolicitud .= "?, ";
        
                        }

                        $contador++;
        
                    }

                }

            }

            
        } elseif (isset($_POST["Rechazar"])) {
            
            $solicitudes = $_POST["registrosSeleccionados"];

            $consulta = "update Solicitud set estado='Rechazada' where id in (";
            $parametros = array();
            $contador = 0;
    
            foreach ($solicitudes as $solicitud) {
                
                array_push($parametros,$solicitud);
    
                if ($contador == count($solicitudes)-1) {
                    
                    $consulta .= "?);";
    
                } else {
                    
                    $consulta .= "?, ";
    
                }
    
                $contador++;
    
            }

            $consulta = manipularDatoBD($consulta,$parametros);

            echo $consulta;

        }

        redireccionar("../adminSolicitudesAlquileres.php");

    } else {
        redireccionar("../adminSolicitudesAlquileres.php");
    }

?>