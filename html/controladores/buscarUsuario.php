<?php

    require_once("../plantillasphp/redirecciones.php");
    require_once("../plantillasphp/operacionesDb.php");

    session_start();

    if (isset($_GET["Buscar"])) {

        $parametros = array();

        for ($i=0; $i < 5; $i++) { 
            
            array_push($parametros,"%".$_GET["Buscar"]."%");
    
        }
    
        $_SESSION["filtrado"] = consultarDatoBD("select * from Usuario where usuario like ? or email like ? or nombre like ? or apellidos like ? or telefono like ?;",$parametros);

        $_SESSION["mantenerFiltrado"] = true;

        $_SESSION["filtradoPrimeraVez"] = true;
        
        redireccionar("../adminUsuarios.php");

    }



?>