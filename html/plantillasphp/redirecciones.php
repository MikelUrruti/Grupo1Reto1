<?php

    function comprobarLogin() {

        if (!isset($_SESSION["email"]) || !isset($_SESSION["usuario"])) {
        
            redireccionar("index.php");
    
        }

    }

    function redireccionar($fichero) {

        header("Location: ".$fichero);

    }

?>