<?php

    require_once("../plantillasphp/operacionesDb.php");

    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $resultados = consultarDatoBD("select email, usuario from Usuario where email='".$correo."';");

    if (is_array($resultados)) {

        echo var_dump($resultados);

        if (count($resultados) == 1) {
        
            header("Location: ../index.html");
    
        } else {
    
            header("Location: ../login.html");
    
        }
        
    } else {
        
        header("Location: ../login.html");

    }



?>