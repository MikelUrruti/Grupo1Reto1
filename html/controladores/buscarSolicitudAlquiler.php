<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();

    if (isset($_GET["Buscar"])) {

        $parametros = array();

        for ($i=0; $i < 3; $i++) { 
            
            array_push($parametros,"%".$_GET["Buscar"]."%");
    
        }
    
        $_SESSION["filtrado"] = consultarDatoBD("select Solicitud.id, fechasolicitud, estado, usuariosolicitante, herramientasolicitada from Solicitud left join Alquiler on Alquiler.idsolicitud=Solicitud.id where idsolicitud is null and (Solicitud.id like ? or usuariosolicitante like ? or herramientasolicitada like ?);",$parametros);

        $_SESSION["mantenerFiltrado"] = true;

        $_SESSION["filtradoPrimeraVez"] = true;

        redireccionar("../adminSolicitudesAlquileres.php");

    }

?>