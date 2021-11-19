<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();
  
    if (isset($_POST["Confirmar"])) {

        if ($_SESSION["codigoGenerado"] == $_POST["codigo"]) {

            $parametros = array($_SESSION["usuario"], $_SESSION["email"], $_SESSION["nombre"], $_SESSION["apellidos"], $_SESSION["password"], $_SESSION["telefono"], "usuario", "activo");

            $consulta = manipularDatoBD("insert into Usuario values (?, ?, ?, ?, ?, ?, ?, ?)",$parametros);

            if ($consulta != 1) {
                
                $_SESSION["errorCodigo"] = erroresInsertar($consulta,array($_SESSION["usuario"],$_SESSION["email"],$_SESSION["telefono"]));
                redireccionar("../confirmarRegistro.php");

            } else {
                
                if ($consulta) {

                    unset($_SESSION["password"]);
                    $_SESSION["tipo"]="usuario";

                    redireccionar("../index.php");

                }

            }

        } else {
    
            $_SESSION["errorCodigo"] = "El codigo indicado no coincide con el que se ha enviado";
            redireccionar("../confirmarRegistro.php");
            
        }

    } else {
        
        redireccionar("../confirmarRegistro.php");

    }

?>