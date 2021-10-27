<?php

    require_once("../plantillasphp/operacionesDb.php");

    session_start();

    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $resultados = consultarDatoBD("select email, usuario from Usuario where email='".$correo."' and password='".hash("sha512",$contrasena)."';");

    if (is_array($resultados)) {

        if (count($resultados) == 1) {
                
            $_SESSION["email"]=$resultado[0]["correo"];
            $_SESSION["usuario"]=$resultado[0]["usuario"];

            header("Location: ../index.html");
    
        } else {

            $_SESSION["error"] = "Las credenciales de la cuenta indicada son incorrectas";
    
            header("Location: ../login.html");
    
        }
        
    } else {
        
        $_SESSION["error"] = $resultados;

        header("Location: ../login.html");

    }



?>