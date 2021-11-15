<?php

    session_start();
    require("../plantillasphp/operacionesDb.php");
    
    try {
        $usuarioSolicitante = $_SESSION["usuario"];
        $herramientaSolicitada = $_GET["filtro"];
        
        $consulta = "insert into Solicitud (fechasolicitud,estado,usuariosolicitante, herramientasolicitada) values(?,?,?,?)";
        $parametros = array(date("Y-m-d"),"pendiente",$usuarioSolicitante,$herramientaSolicitada);
        manipularDatoBD($consulta,$parametros);
        $_SESSION["exito"] = "Se ha solicitado con éxito el alquiler de $herramientaSolicitada";
        header("Location: ../detalleHerramienta.php?filtro=$herramientaSolicitada");
    }

    catch(Exception $e) {
        $_SESSION["exito"] = "Ha ocurrido un error al alquilar $herramientaSolicitada";
        header("Location: ../detalleHerramienta.php?filtro=$herramientaSolicitada");
    }
    
    

?>