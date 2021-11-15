<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();

    if (isset($_GET["Buscar"])) {

        $parametros = array();

        for ($i=0; $i < 2; $i++) { 
            
            array_push($parametros,"%".$_GET["Buscar"]."%");
    
        }
    
        $_SESSION["filtrado"] = consultarDatoBD("select nombre, fabricante, categoria, stock, foto, descripcion from Herramienta where nombre like ? or descripcion like ?;",$parametros);

        $_SESSION["mantenerFiltrado"] = true;

        $_SESSION["filtradoPrimeraVez"] = true;

        redireccionar("../adminHerramientasAlmacen.php");

    }



?>