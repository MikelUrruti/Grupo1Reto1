<?php

    require("../plantillasphp/validaciones.php");

    if (isset($_POST["usuario"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmarPassword"])) {
        
        $correcto = false;

        if (validarUsuario($_POST["usuario"])) {
              
            if (validarNombre($_POST["nombre"])) {
               
                if (validarApellidos($_POST["apellidos"])) {
                    
                    if (validarEmail($_POST["email"])) {
                        
                        if (validarPassword($_POST["password"])) {
                            
                            if ($_POST["password"] === $_POST["confirmarPassword"]) {
                                
                                echo "hola!";

                                $correcto = true;

                            }

                        }

                    }

                }

            }

        }

        // if ($correcto) {
            
        //     header("Location: ../index.html");

        // } else {
            
        //     header("Location: ../registro.php");

        // }

    } else {

        header("Location: ../registro.php");

    }

    

?>