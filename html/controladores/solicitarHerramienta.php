<?php

    session_start();
    require("../plantillasphp/operacionesDb.php");
    require("../plantillasphp/funcionesCorreos.php");
    
    try {
        $usuarioSolicitante = $_SESSION["usuario"];
        $herramientaSolicitada = $_GET["filtro"];
        
        $consulta = "insert into Solicitud (fechasolicitud,estado,usuariosolicitante, herramientasolicitada) values(?,?,?,?)";
        $parametros = array(date("Y-m-d"),"pendiente",$usuarioSolicitante,$herramientaSolicitada);
        manipularDatoBD($consulta,$parametros);
        $_SESSION["exito"] = "Se ha solicitado con éxito el alquiler de $herramientaSolicitada";
        header("Location: ../detalleHerramienta.php?filtro=$herramientaSolicitada");

    /*ENVIAR CORREO*/
    enviarCorreo(
        "[fixPoint] Solicitud de alquiler",
        $_SESSION['email'],
        "<style>
            p {
                font-size: 2em;
            }
        </style>
        <p>Estimado:<span style='font-weight:bold'>$_SESSION[usuario]</span></p>
        <p>Ha solicitado el alquiler de la herramienta <span style='font-weight:bold'> $herramientaSolicitada</span></p>
        <p>Le enviaremos un correo con el resultado de la solicitud.</p>
        <p>Recuerde que solicitar el alquiler no garantiza el mismo.</p>
        <p style='font-weight:bold; font-size: 2em'>$_SESSION[email]</p>
        <p>Si tienes algun problema, respondenos en este hilo comentandonos tu situacion.</p>
        <p style='white-space:pre-line'>Un saludo,
        fixPoint
        </p>
        <img src='cid:imagen1' style='width: 200px; heigth:100px;'/>","",
        array("../img/logo.png"),
    );
    
    }

    catch(Exception $e) {
        $_SESSION["exito"] = "Ha ocurrido un error al alquilar $herramientaSolicitada";
        header("Location: ../detalleHerramienta.php?filtro=$herramientaSolicitada");
    }
    
    

?>