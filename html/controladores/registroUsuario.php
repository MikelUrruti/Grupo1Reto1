<?php

    require("../plantillasphp/validaciones.php");
    require("../plantillasphp/operacionesDb.php");

    if (isset($_POST["usuario"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmarPassword"])) {
        
        $correcto = false;

        if (validarUsuario($_POST["usuario"])) {
              
            if (validarNombre($_POST["nombre"])) {
               
                if (validarApellidos($_POST["apellidos"])) {
                    
                    if (validarEmail($_POST["email"])) {
                        
                        if (validarPassword($_POST["password"])) {
                            
                            if ($_POST["password"] === $_POST["confirmarPassword"]) {

                                $correcto = true;

                            }

                        }

                    }

                }

            }

        }

        if ($correcto) {
            
            $parametros = array($_POST["usuario"], $_POST["email"], $_POST["nombre"], $_POST["apellidos"], hash("sha512",$_POST["password"]), null, "usuario", "activo");

            manipularDatoBD("insert into Usuario values (?, ?, ?, ?, ?, ?, ?, ?)",$parametros);

            

            // header("Location: ../index.html");

        } else {
            
            header("Location: ../registro.php");

        }

    } else {

        header("Location: ../registro.php");

    }

    

?>