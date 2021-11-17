<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");
    require("../plantillasphp/funcionesCorreos.php");

    session_start();

    if (isset($_POST["registrosSeleccionados"])) {
        
        if (isset($_POST["Aprobar"])) {

            $manuales = $_POST["registrosSeleccionados"];

            $consulta = "update Manual set usuarioaprueba = ? where titulo in (";

            $consultaMandarCorreos = "select email, usuariosube, titulo, fichero, portada from Manual join Usuario on Manual.usuariosube=Usuario.usuario where titulo in (";

            $parametros = array($_SESSION["usuario"]);

            $parametrosMandarCorreos = array();

            $contador = 0;
    
            foreach ($manuales as $manual) {
                
                array_push($parametros,$manual);
                array_push($parametrosMandarCorreos,$manual);
    
                if ($contador == count($manuales)-1) {
                    
                    $consultaMandarCorreos .= "?);";

                    $consulta .= "?);";
    
                } else {
                    
                    $consultaMandarCorreos .= "?, ";

                    $consulta .= "?, ";
    
                }
    
                $contador++;
    
            }

            $consulta = manipularDatoBD($consulta,$parametros);

            $correos = consultarDatoBD($consultaMandarCorreos,$parametrosMandarCorreos);

            $enviado = false;

            $usuario = "";

            foreach ($correos as $correo) {

                $enviado = true;
                $usuario = $correo["usuariosube"];

                enviarCorreoManuales(
                    "[FixPoint] Solicitud de alquiler rechazada",
                    $correo["email"],
                    "
                    <style>
                    
                        p {
            
                            font-size: 2em;
            
                        }
                    
                    </style>
                    <p>Buenas <span style='font-weight:bold'>".$correo["usuariosube"]."</span>,</p>
                    <p>Su manual con titulo <span style='font-weight:bold'>".$correo["titulo"]."</span> ha sido publicado en el sitio web.</p>
                    <p>Puedes comprobarlo buscando en la pagina de Manuales.</p>
                    <p style='white-space:pre-line'>Un saludo,
                    FixPoint
                    </p>
                    <img src='cid:imagen1' style='width: 200px; heigth:100px;'/>",
                    "",
                    array("../img/logo.png"),
                    array($correo["fichero"]),
                    array($correo["portada"])
                );

            }

            
        } elseif (isset($_POST["Rechazar"])) {
            
            $manuales = $_POST["registrosSeleccionados"];

            $consulta = "delete from Manual where titulo in (";

            $consultaMandarCorreos = "select email, usuariosube, titulo, fichero, portada from Manual join Usuario on Manual.usuariosube=Usuario.usuario where titulo in (";

            $parametros = array();

            $parametrosMandarCorreos = array();

            $contador = 0;
    
            foreach ($manuales as $manual) {
                
                array_push($parametros,$manual);
                array_push($parametrosMandarCorreos,$manual);
    
                if ($contador == count($manuales)-1) {
                    
                    $consulta .= "?);";
                    $consultaMandarCorreos .= "?);";
    
                } else {
                    
                    $consulta .= "?, ";
                    $consultaMandarCorreos .= "?, ";
    
                }
    
                $contador++;
    
            }

            $correos = consultarDatoBD($consultaMandarCorreos,$parametrosMandarCorreos);

            $enviado = false;

            $usuario = "";

            foreach ($correos as $correo) {

                $enviado = true;
                $usuario = $correo["usuariosube"];

                enviarCorreoManuales(
                    "[FixPoint] Solicitud de alquiler rechazada",
                    $correo["email"],
                    "
                    <style>
                    
                        p {
            
                            font-size: 2em;
            
                        }
                    
                    </style>
                    <p>Buenas <span style='font-weight:bold'>".$correo["usuariosube"]."</span>,</p>
                    <p>Su manual con titulo <span style='font-weight:bold'>".$correo["titulo"]."</span> ha sido rechazado.</p>
                    <p>Mejora tu manual para adaptarlo a las normas del sitio web.</p>
                    <p style='white-space:pre-line'>Un saludo,
                    FixPoint
                    </p>
                    <img src='cid:imagen1' style='width: 200px; heigth:100px;'/>",
                    "",
                    array("../img/logo.png"),
                    array($correo["fichero"]),
                    array($correo["portada"])
                );

            }

            $consulta = manipularDatoBD($consulta,$parametros);

            

        }

        redireccionar("../adminSolicitudesManuales.php");

    } else {
        redireccionar("../adminSolicitudesManuales.php");
    }

?>