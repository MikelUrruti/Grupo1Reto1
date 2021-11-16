<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();

    if (isset($_POST["registrosSeleccionados"])) {
        
        $solicitudes = $_POST["registrosSeleccionados"];

        if (isset($_POST["Recoger"])) {

            $parametrosComprobarRecogido = array();

            $consultarComprobarRecogido = "select fecharecogida from Donaciones where fecharecogida is not null and id in (";

            $contador = 0;

            foreach ($solicitudes as $solicitud) {
    
                if (count($solicitudes)-1 == $contador) {

                    $consultarComprobarRecogido .= "?);";

                } else {

                    $consultarComprobarRecogido .= "?, ";

                }
            
                array_push($parametrosComprobarRecogido,$solicitud);

                $contador++;
            
            }

            $resultados = consultarDatoBD($consultarComprobarRecogido,$parametrosComprobarRecogido);

            if (count($resultados) > 0) {
                
                $_SESSION["errorAccion"] = "No se pueden recoger las donaciones ya recogidas";

            } else {
                
                $parametrosRecogerDonacion = array();

                $consultaRecogerDonacion = "update Donaciones set fecharecogida ='".date("Y-m-d")."' where id in (";
    
                $contador = 0;
    
                foreach ($solicitudes as $solicitud) {
    
                    if (count($solicitudes)-1 == $contador) {
    
                        $consultaRecogerDonacion .= "?);";
    
                    } else {
    
                        $consultaRecogerDonacion .= "?, ";
    
                    }
                
                    array_push($parametrosRecogerDonacion,$solicitud);
    
                    $contador++;
    
                }
    
                manipularDatoBD($consultaRecogerDonacion,$parametrosRecogerDonacion);
    
                $parametrosListarHerramientas = array();
    
                $consultaListarHerramientas = "select nomherramienta, sum(cantidad) cantidad from Donaciones where id in (";
    
                $contador = 0;
    
                foreach ($solicitudes as $solicitud) {
    
                    if (count($solicitudes)-1 == $contador) {
    
                        $consultaListarHerramientas .= "?) group by nomherramienta;";
    
                    } else {
    
                        $consultaListarHerramientas .= "?, ";
    
                    }
                
                    array_push($parametrosListarHerramientas,$solicitud);
    
                    $contador++;
                
                }
    
                $resultadosHerramientas = consultarDatoBD($consultaListarHerramientas,$parametrosListarHerramientas);
    
                foreach ($resultadosHerramientas as $herramienta) {
    
    
                    consultarDatoBD("update Herramienta set stock=stock + ? where nombre = ?;",array($herramienta["cantidad"],$herramienta["nomherramienta"]));
    
                }

            }

        } elseif (isset($_POST["Rechazar"])) {

            $parametrosComprobarRecogido = array();

            $consultarComprobarRecogido = "select fecharecogida from Donaciones where fecharecogida is not null and id in (";

            $contador = 0;

            foreach ($solicitudes as $solicitud) {
    
                if (count($solicitudes)-1 == $contador) {

                    $consultarComprobarRecogido .= "?);";

                } else {

                    $consultarComprobarRecogido .= "?, ";

                }
            
                array_push($parametrosComprobarRecogido,$solicitud);

                $contador++;
            
            }

            $resultados = consultarDatoBD($consultarComprobarRecogido,$parametrosComprobarRecogido);

            if (count($resultados) > 0) {

                $_SESSION["errorAccion"] = "No se pueden rechazar donaciones que ya han sido aceptadas";

            } else {

                $parametrosListarHerramientas = array();

                $consultaListarHerramientas = "select distinct(nomherramienta) nomherramienta from Donaciones where id in (";

                $contador = 0;

                foreach ($solicitudes as $solicitud) {
    
                    if (count($solicitudes)-1 == $contador) {
    
                        $consultaListarHerramientas .= "?);";
    
                    } else {
    
                        $consultaListarHerramientas .= "?, ";
    
                    }
                
                    array_push($parametrosListarHerramientas,$solicitud);
    
                    $contador++;
                
                }

                $resultadosHerramientas = consultarDatoBD($consultaListarHerramientas,$parametrosListarHerramientas);

                
                $parametrosEliminarDonacion = array();

                $consultaEliminarDonacion = "delete from Donaciones where id in (";
    
                $contador = 0;
    
                foreach ($solicitudes as $solicitud) {
    
                    if (count($solicitudes)-1 == $contador) {
    
                        $consultaEliminarDonacion .= "?);";
    
                    } else {
    
                        $consultaEliminarDonacion .= "?, ";
    
                    }
                
                    array_push($parametrosEliminarDonacion,$solicitud);
    
                    $contador++;
                
                }
    
                manipularDatoBD($consultaEliminarDonacion,$parametrosEliminarDonacion);

                $parametrosEliminarDonacion = array();
    
                $consultaEliminarHerramienta = "delete from Herramienta where estado = ? and nombre in (";

                array_unshift($parametrosEliminarDonacion,"descatalogada");
                
                $contador = 0;
    
                foreach ($resultadosHerramientas as $herramienta) {
    
                    if (count($resultadosHerramientas)-1 == $contador) {
    
                        $consultaEliminarHerramienta .= "?);";
    
                    } else {
    
                        $consultaEliminarHerramienta .= "?, ";
    
                    }
                
                    array_push($parametrosEliminarDonacion,$herramienta["nomherramienta"]);
    
                    $contador++;
                
                }
    
                $resultadoEliminarHerramienta = manipularDatoBD($consultaEliminarHerramienta,$parametrosEliminarDonacion);

                if ($resultadoEliminarHerramienta === 1451) {
                    
                    $_SESSION["errorAccion"] = "Se eliminan las donaciones pero no las herramientas debido a que estas han sido alquiladas previamente a pesar de que hayan sido descatalogadas";
    
                }
    
            }
    

        }
            
    }

    redireccionar("../adminDonaciones.php");

    

?>