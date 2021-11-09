<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();
  
    if (isset($_POST["Confirmar"])) {

        if ($_SESSION["codigoGenerado"] == $_POST["codigo"]) {

            $parametros = array($_SESSION["usuario"], $_SESSION["email"], $_SESSION["nombre"], $_SESSION["apellidos"], $_SESSION["password"], $_SESSION["telefono"], "usuario", "activo");

            $consulta = manipularDatoBD("insert into Usuario values (?, ?, ?, ?, ?, ?, ?, ?)",$parametros);

            if (gettype($consulta) == "string") {
                
                $_SESSION["errorCodigo"] = $consulta;
                redireccionar("../confirmarRegistro.php");

            } else {
                
                if ($consulta) {

                    unset($_SESSION["password"]);
                    $_SESSION["tipo"]="usuario";
    
                    redireccionar("../index.php");

                }

                echo $_SESSION["telefono"];

            }

        } else {
    
            $_SESSION["errorCodigo"] = "El codigo indicado no coincide con el que se ha enviado";
            redireccionar("../confirmarRegistro.php");
            
        }

    } 

?>