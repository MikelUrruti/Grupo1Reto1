<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();

    if (count($_POST["registrosSeleccionados"]) > 0) {
        
        if (isset($_POST["Aprobar"])) {

            $manuales = $_POST["registrosSeleccionados"];

            $parametros = array();
            $consulta = "update Solicitud set estado='aceptada' where id in (";
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

            $consultaInsertar = "insert into Alquiler(fechainicio, idsolicitud) values ";

            $consultaActualizar = "update Herramienta set stock=stock-1 where nombre in (select distinct(herramientasolicitada) from Solicitud where id in (";

            $contador = 0;
    
            foreach ($manuales as $manual) {

                $parametros = array();

                $consulta = "select stock, nombre from Herramienta join Solicitud on Herramienta.nombre=Solicitud.herramientasolicitada where id = ?;";

                array_push($parametros,$manual);

                $consulta = manipularDatoBD($consulta,$parametros);

                if ($consulta[0]["stock"] > 0) {

                    $parametros = array();

                    array_push($parametros,date("y-m-d"));
    
                    array_push($parametros,$manual);

                    if (count($manuales)-1 == $contador) {
                        $consultaInsertar .= "(?, ?);";
                    } else {
                        $consultaInsertar .= "(?, ?), ";

                        $consultaInsertar = manipularDatoBD($consultaInsertar,$parametros);

                        $parametros = array();
                        
                    }



                    array_push($parametros,$manual);
                    
                    if (count($manuales)-1 == $contador) {
                        $consultaActualizar = "?, ";
                    } else {
                        $consultaActualizar = "?);";
    
                        $consulta = manipularDatoBD($consultaActualizar,$parametros);

                    }

                } else {
                    
                    $_SESSION["errorAccion"] = "No se puede alquilar la herramienta (".$consulta[0]["nombre"].") por que no tiene stock disponible";

                }
    
            }

            




            
        } elseif (isset($_POST["Rechazar"])) {
            
            $manuales = $_POST["registrosSeleccionados"];

            $consulta = "update Solicitud set estado='Rechazada' where id in (";
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

        redireccionar("../adminSolicitudesAlquileres.php");

    } else {
        redireccionar("../adminSolicitudesAlquileres.php");
    }

?>