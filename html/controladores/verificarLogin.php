<?php

    require_once("../plantillasphp/operacionesDb.php");

    session_start();

    if (isset($_POST["correo"]) && isset($_POST["contrasena"])) {
        
        $parametros = array($_POST["correo"], hash("sha512",$_POST["contrasena"]));

        $resultados = consultarDatoBD("select email, usuario from Usuario where email=? and password=?;",$parametros);
    
        if (is_array($resultados)) {
    
            echo var_dump($resultados);
    
            if (count($resultados) == 1) {
                    
                $_SESSION["email"]=$resultado[0]["correo"];
                $_SESSION["usuario"]=$resultado[0]["usuario"];
    
                header("Location: ../index.php");
        
            } else {
    
                $_SESSION["error"] = "Las credenciales de la cuenta indicada son incorrectas";
        
                header("Location: ../login.php");
        
            }
            
        } else {
            
            $_SESSION["error"] = $resultados;
    
            header("Location: ../login.php");
    
        }

    } else {

        header("Location: ../login.php");
        
    }





?>