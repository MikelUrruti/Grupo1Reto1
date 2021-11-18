<?php

    require_once("../plantillasphp/redirecciones.php");
    require_once("../plantillasphp/operacionesDb.php");

    session_start();

    if (isset($_GET["Buscar"])) {

        $parametros = array();

        for ($i=0; $i < 4; $i++) { 
            
            array_push($parametros,"%".$_GET["Buscar"]."%");
    
        }
    
        $_SESSION["filtrado"] = consultarDatoBD("select Alquiler.id, idsolicitud, usuariosolicitante, herramientasolicitada, fechainicio, fecharecogida, fechafin from Alquiler join Solicitud on Alquiler.idsolicitud = Solicitud.id where Alquiler.id like ? or idsolicitud like ? or usuariosolicitante like ? or herramientasolicitada like ?;",$parametros);

        $_SESSION["mantenerFiltrado"] = true;

        $_SESSION["filtradoPrimeraVez"] = true;

        redireccionar("../adminRealizadosAlquileres.php");

    }

?>