<?php

    require_once("../plantillasphp/operacionesDb.php");

    session_start();

    if (isset($_POST["correo"]) && isset($_POST["contrasena"])) {
        
        $parametros = array($_POST["correo"], hash("sha512",$_POST["contrasena"]));

        $resultados = consultarDatoBD("select nombre, apellidos, telefono, email, usuario, tipo from Usuario where email=? and password=? and estado='activo';",$parametros);
    
        if (is_array($resultados)) {
    
            if (count($resultados) == 1) {
                //Para poder acceder a estas variables necesitaremos poner antes de todo el "session start"
                //Despues donde queramos, dentro del body, ponemos dentro de un "php" la variable que queramos
                //Las variables siendo lo de "$_SESSION['email']"
                $_SESSION["email"]=$resultados[0]["email"];
                $_SESSION["usuario"]=$resultados[0]["usuario"];
                $_SESSION["tipo"]=$resultados[0]["tipo"];
                $_SESSION["apellidos"]=$resultados[0]["apellidos"];
                $_SESSION["nombre"]=$resultados[0]["nombre"];
                $_SESSION["telefono"]=$resultados[0]["telefono"];
                
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