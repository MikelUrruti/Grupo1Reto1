<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();

    if (isset($_GET["Buscar"])) {

        $parametros = array();

        for ($i=0; $i < 3; $i++) { 
            
            array_push($parametros,"%".$_GET["Buscar"]."%");
    
        }
    
        $_SESSION["filtrado"] = consultarDatoBD("select titulo, descripcion, fichero, usuariosube from Manual where usuarioaprueba is null and (titulo like ? or descripcion like ? or usuariosube like ?);",$parametros);

        $_SESSION["mantenerFiltrado"] = true;

        $_SESSION["filtradoPrimeraVez"] = true;

        redireccionar("../adminSolicitudesManuales.php");

    }



?>