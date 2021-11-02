<?php

    require("../plantillasphp/redirecciones.php");

    if (!isset($_POST["codigo"])) {
        
        redireccionar("../confirmarRegistro.php");

    } else {
        
        if ($_SESSION["codigoUsuario"] == $_POST["codigo"]) {
            # code...
        } else {

            $_SESSION["errorCodigo"] = "El codigo indicado no coincide con el que se ha enviado";
        
        }

    }

?>