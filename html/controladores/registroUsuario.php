<?php

    require("../plantillasphp/validaciones.php");
    require("../plantillasphp/operacionesDb.php");
    require("../plantillasphp/redirecciones.php");
    

    session_start();

if (isset($_POST["usuario"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmarPassword"])) {
        
    $correcto = true;

    if (!validarUsuario($_POST["usuario"])) {
        
        $_SESSION["errorUsuario"] = "El nombre del usuario no puede tener numeros, caracteres especiales, acentos ni espacios en blanco (longitud de 2 a 30 caracteres)";
        $correcto = false;

    }
    if (!validarNombre($_POST["nombre"])) {
        
        $_SESSION["errorNombre"] = "El nombre no puede tener ni numeros ni caracteres especiales";
        $correcto = false;

    }
    if (!validarApellidos($_POST["apellidos"])) {
        
        $_SESSION["errorApellidos"] = "Los apellidos no pueden tener ni numeros ni caracteres especiales";
        $correcto = false;

    }
    if (!validarEmail($_POST["email"])) {
        
        $_SESSION["errorEmail"] = "El email debe tener el siguiente formato: ejemplo@gmail.com";
        $correcto = false;

    }

    if ($_POST["telefono"] != null) {
        
        if (!validarTelefono($_POST["telefono"])) {
            $_SESSION["errorTelefono"] = "El telefono debe tener 9 digitos y empezar por el numero 6, 7 o 9";
            $correcto = false;
        }

    }

    if (validarPassword($_POST["password"])) {
        
        if ($_POST["password"] != $_POST["confirmarPassword"]) {
            
            $_SESSION["errorPassword"] = "Las contraseñas indicadas no coinciden entre si";
            $correcto = false;

        }

    } else {
        
        $_SESSION["errorPassword"] = "La contraseña debe tener de 8 a 32 caracteres alfanumericos";
        $correcto = false;

    }

    if ($correcto) {

        if (!isset($_POST["condiciones"]) || !isset($_POST["montaje"]) || !isset($_POST["desmontaje"])) {
            
            $_SESSION["errorCondiciones"] = "Debes aceptar todos los terminos para poder registrarte";
            $correcto = false;

        }

        if ($correcto) {

            $_SESSION["usuario"]=$_POST["usuario"];
            $_SESSION["email"]=$_POST["email"];
            $_SESSION["nombre"]=$_POST["nombre"];
            $_SESSION["apellidos"]=$_POST["apellidos"];
            $_SESSION["password"]=hash("sha512",$_POST["password"]);
            $_SESSION["telefono"]=$_POST["telefono"];

            if ($_SESSION["telefono"] == "") {
                $_SESSION["telefono"]=null;
            }

            redireccionar("../confirmarRegistro.php");

        }

    }

} 

redireccionar("../registro.php");
