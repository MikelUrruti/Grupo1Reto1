<?php

    function comprobarLogin() {

        if (!isset($_SESSION["email"]) || !isset($_SESSION["usuario"])) {
        
            redireccionar("login.php");
    
        }

    }

    function redireccionar($fichero) {

        header("Location: ".$fichero);

    }

?>