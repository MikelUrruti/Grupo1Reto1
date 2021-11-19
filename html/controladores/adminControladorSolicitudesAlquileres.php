<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");
    require("../plantillasphp/funcionesCorreos.php");

    session_start();

    if (isset($_POST["registrosSeleccionados"])) {
        
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
        
                    $parametrosActualizarSolicitud = array(); 

                    $consultaInsertar = "insert into Alquiler(fechainicio, idsolicitud) values ";
        
                    $consultaActualizarSolicitud = "update Solicitud set estado='aceptada' where id in (";

                    $consultaMandarCorreos = "select email, usuario, id, herramientasolicitada from Solicitud join Usuario on Solicitud.usuariosolicitante=Usuario.usuario where Solicitud.id in (";

                    $contador = 0;
                    
                    foreach ($solicitudes as $solicitud) {
                    
                        array_push($parametrosInsertar,date("y-m-d"));
            
                        array_push($parametrosInsertar,$solicitud);
        
                        array_push($parametrosActualizarSolicitud,$solicitud);
        
                        if (count($solicitudes)-1 == $contador) {
                            $consultaInsertar .= "(?, ?);";
        
                            $consultaInsertar = manipularDatoBD($consultaInsertar,$parametrosInsertar);
        
                            $consultaActualizarSolicitud .= "?);";
        
                            $consultaActualizarSolicitud = manipularDatoBD($consultaActualizarSolicitud,$parametrosActualizarSolicitud);

                            $consultaMandarCorreos .= "?);";

                            $correos = consultarDatoBD($consultaMandarCorreos,$parametrosActualizarSolicitud);

                            $enviado = false;

                            $usuario = "";

                            foreach ($correos as $correo) {

                                    $enviado = true;
                                    $usuario = $correo["usuario"];

                                    enviarCorreo(
                                        "[FixPoint] Solicitud de alquiler aprobada",
                                        $correo["email"],
                                        "
                                        <style>
                                        
                                            p {
                                
                                                font-size: 2em;
                                
                                            }
                                        
                                        </style>
                                        <p>Buenas <span style='font-weight:bold'>".$correo["usuario"]."</span>,</p>
                                        <p>Su pedido de la herramienta <span style='font-weight:bold'>".$correo["herramientasolicitada"]."</span> en la solicitud <span style='font-weight:bold'>Nº".$correo["id"]."</span> esta lista para recogerla.</p>
                                        <p>La direccion en la que se encuentra la herramienta a recoger es: </p>
                                        <p style='font-weight:bold; white-space: pre-wrap;'>C.I.F.P Pico Frentes
Gervasio Manrique de Lara s/n
Soria, 42004
Spain 
Telefono:
975 23 94 43</p>
                                        <p>Pasa cuando quieras a recogerla!</p>
                                        <p style='white-space:pre-line'>Un saludo,
                                        FixPoint
                                        </p>
                                        <img src='cid:imagen1' style='width: 200px; heigth:100px;'/>",
                                        "",
                                        array("../img/logo.png")
                                    );

                            }


        
                        } else {
        
                            $consultaInsertar .= "(?, ?), ";
        
                            $consultaActualizarSolicitud .= "?, ";

                            $consultaMandarCorreos .= "?, ";
        
                        }

                        $contador++;
        
                    }

                }

            }

            
        } elseif (isset($_POST["Rechazar"])) {
            
            $solicitudes = $_POST["registrosSeleccionados"];

            $consulta = "update Solicitud set estado='Rechazada' where id in (";

            $consultaMandarCorreos = "select email, usuario, id, herramientasolicitada from Solicitud join Usuario on Solicitud.usuariosolicitante=Usuario.usuario where Solicitud.id in (";

            $parametros = array();
            $contador = 0;
    
            foreach ($solicitudes as $solicitud) {
                
                array_push($parametros,$solicitud);
    
                if ($contador == count($solicitudes)-1) {

                    $consultaMandarCorreos .= "?);";
                    
                    $consulta .= "?);";
    
                } else {
                    
                    $consulta .= "?, ";

                    $consultaMandarCorreos .= "?, ";
    
                }
    
                $contador++;
    
            }

            $consulta = manipularDatoBD($consulta,$parametros);

            $correos = consultarDatoBD($consultaMandarCorreos,$parametros);

            $enviado = false;

            $usuario = "";

            foreach ($correos as $correo) {

                    $enviado = true;
                    $usuario = $correo["usuario"];

                    enviarCorreo(
                        "[FixPoint] Solicitud de alquiler rechazada",
                        $correo["email"],
                        "
                        <style>
                        
                            p {
                
                                font-size: 2em;
                
                            }
                        
                        </style>
                        <p>Buenas <span style='font-weight:bold'>".$correo["usuario"]."</span>,</p>
                        <p>Su pedido de la herramienta <span style='font-weight:bold'>".$correo["herramientasolicitada"]."</span> en la solicitud <span style='font-weight:bold'>Nº".$correo["id"]."</span> ha sido rechazado.</p>
                        <p>Prueba a pedir otra herramienta y si no, responde a este correo para averiguar lo que ha sucedido.</p>
                        <p style='white-space:pre-line'>Un saludo,
                        FixPoint
                        </p>
                        <img src='cid:imagen1' style='width: 200px; heigth:100px;'/>",
                        "",
                        array("../img/logo.png")
                    );

            }

        }

        redireccionar("../adminSolicitudesAlquileres.php");

    } else {
        redireccionar("../adminSolicitudesAlquileres.php");
    }

?>