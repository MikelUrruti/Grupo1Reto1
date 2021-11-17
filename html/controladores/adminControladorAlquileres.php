<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();

    if (isset($_POST["registrosSeleccionados"])) {
        
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

            $parametrosComprobacionFinalizado = array();

            $consultaComprobarFinalizado = "select id from Alquiler where fechafin is not null and fecharecogida is not null and id in (";

            $contador = 0;

            foreach ($solicitudes as $solicitud) {

                if (count($solicitudes)-1 == $contador) {

                    $consultaComprobarFinalizado .= "?);";

                } else {

                    $consultaComprobarFinalizado .= "?, ";

                }
            
                array_push($parametrosComprobacionFinalizado,$solicitud);

                $contador++;
            
            }

            $consultaComprobarFinalizado = consultarDatoBD($consultaComprobarFinalizado,$parametrosComprobacionFinalizado);

            if (count($consultaComprobarFinalizado) > 0) {
                
                $_SESSION["errorAccion"] = "No se puede recoger la herramienta de un alquiler cuando este ya ha sido finalizado o recogido previamente";

            } else {

                $parametrosComprobarStock = array();

                $consultaComprobarStock = "select distinct(nombre), stock from Solicitud join Herramienta on Herramienta.nombre=Solicitud.herramientasolicitada join Alquiler on Alquiler.idsolicitud = Solicitud.id where Alquiler.id in (";
                
                $contador = 0;

                foreach ($solicitudes as $solicitud) {

                    if (count($solicitudes)-1 == $contador) {

                        $consultaComprobarStock .= "?);";

                    } else {

                        $consultaComprobarStock .= "?, ";

                    }
                
                    array_push($parametrosComprobarStock,$solicitud);

                    $contador++;
                
                } 

                $consultaComprobarStock = consultarDatoBD($consultaComprobarStock,$parametrosComprobarStock);

                foreach ($consultaComprobarStock as $solicitud) {

                    if ($solicitud["stock"] == 0) {

                        $_SESSION["errorAccion"] = "No se puede alquilar la herramienta (".$solicitud["nombre"].") por que no tiene stock disponible (comprueba que todas las herramientas a alquilar tengan stock)";
                        break;
        
                    } 

                }

                if (!isset($_SESSION["errorAccion"])) {
                    
                    $parametrosFinalizar = array();

                    $consultaFinalizar = "update Alquiler set fecharecogida = '".date("Y-m-d")."' where id in (";
    
                    $contador = 0;
    
                    foreach ($solicitudes as $solicitud) {
        
                        array_push($parametrosFinalizar,$solicitud);
        
                        if (count($solicitudes)-1 == $contador) {
     
                            $consultaFinalizar .= "?);";

                            echo $consultaFinalizar."<br>";
        
                            $consultaFinalizar = manipularDatoBD($consultaFinalizar,$parametrosFinalizar);
        
                        } else {
        
                            $consultaFinalizar .= "?, ";
        
                        }
    
                        $contador++;
    
                    }

                    $parametrosRevisarNumHerramientas = array();

                    $consultaRevisarNumHerramientas = "select nombre, count(nombre) as numHerramientas from Solicitud join Herramienta on Herramienta.nombre=Solicitud.herramientasolicitada join Alquiler on Alquiler.idsolicitud = Solicitud.id where Alquiler.id in (";

                    $contador = 0;
    
                    foreach ($solicitudes as $solicitud) {

                        array_push($parametrosRevisarNumHerramientas,$solicitud);
    
                        if (count($solicitudes)-1 == $contador) {
    
                            $consultaRevisarNumHerramientas .= "?) group by nombre;";

                            $HerramientasActualizarStock = consultarDatoBD($consultaRevisarNumHerramientas,$parametrosRevisarNumHerramientas);
    
                        } else {
    
                            $consultaRevisarNumHerramientas .= "?, ";
    
                        }

    
                        $contador++;
                    
                    }

                    foreach ($HerramientasActualizarStock as $HerramientaActualizarStock) {
                        
                        $consultaActualizarStock = "update Herramienta set stock = stock-? where nombre = ?;";

                        $consultaActualizarStock=manipularDatoBD($consultaActualizarStock,array($HerramientaActualizarStock["numHerramientas"],$HerramientaActualizarStock["nombre"]));

                        echo $consultaActualizarStock;

                    }

                }



            }

            
        
        } elseif (isset($_POST["Finalizar"])) {
            
            $parametrosComprobacionRecogido = array();

            $consultaComprobarRecogido = "select id from Alquiler where (fecharecogida is null or fechafin is not null) and id in (";

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
                
                $_SESSION["errorAccion"] = "No se pueden finalizar alquileres que aun no hayan sido recogidos o hayan sido finalizados";

            } else {
                
                $parametrosFinalizar = array();

                $consultaFinalizar = "update Alquiler set fechafin = '".date("Y-m-d")."' where id in (";

                $contador = 0;

                foreach ($solicitudes as $solicitud) {
    
                    array_push($parametrosFinalizar,$solicitud);
    
                    if (count($solicitudes)-1 == $contador) {
 
                        $consultaFinalizar .= "?);";
    
                        $consultaFinalizar = manipularDatoBD($consultaFinalizar,$parametrosFinalizar);
    
                    } else {
    
                        $consultaFinalizar .= "?, ";
    
                    }

                    $contador++;

                }

                $parametrosRevisarNumHerramientas = array();

                $consultaRevisarNumHerramientas = "select nombre, count(nombre) as numHerramientas from Solicitud join Herramienta on Herramienta.nombre=Solicitud.herramientasolicitada join Alquiler on Alquiler.idsolicitud = Solicitud.id where Alquiler.id in (";

                $contador = 0;

                foreach ($solicitudes as $solicitud) {

                    array_push($parametrosRevisarNumHerramientas,$solicitud);

                    if (count($solicitudes)-1 == $contador) {

                        $consultaRevisarNumHerramientas .= "?) group by nombre;";

                        $HerramientasActualizarStock = consultarDatoBD($consultaRevisarNumHerramientas,$parametrosRevisarNumHerramientas);

                    } else {

                        $consultaRevisarNumHerramientas .= "?, ";

                    }


                    $contador++;
                
                }

                foreach ($HerramientasActualizarStock as $HerramientaActualizarStock) {
                    
                    $consultaActualizarStock = "update Herramienta set stock = stock+? where nombre = ?;";

                    $consultaActualizarStock=manipularDatoBD($consultaActualizarStock,array($HerramientaActualizarStock["numHerramientas"],$HerramientaActualizarStock["nombre"]));

                    echo $consultaActualizarStock;

                }



            }

        }

        redireccionar("../adminRealizadosAlquileres.php");

    } else {
        redireccionar("../adminRealizadosAlquileres.php");
    }

    

?>