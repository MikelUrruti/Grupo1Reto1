<?php

    //Comprobamos si el usuario que ha introducido es el correcto
    function comprobarLogin() {

        if (!isset($_SESSION["email"]) || !isset($_SESSION["usuario"])) {
        
            redireccionar("login.php");
    
        }

    }

    function comprobarLoginAdmin() {

        if (!isset($_SESSION["email"]) || !isset($_SESSION["usuario"]) || !isset($_SESSION["tipo"])) {
        
            redireccionar("login.php");    
    
        } else {
            
            if ($_SESSION["tipo"] != "administrador" && $_SESSION["tipo"] != "superadministrador") {
                
                redireccionar("index.php");

            }

        }

    }

    //Funcion que nos envia a un fichero en concreto
    function redireccionar($fichero) {

        header("Location: ".$fichero);

    }

?>