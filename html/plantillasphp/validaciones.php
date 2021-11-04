<?php

function validarNombre($nombre) {
    
    $regex = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ(?!\s)]{2,30}$/";

    return preg_match($regex,$nombre);

}

function validarApellidos($apellidos) {

    $regex = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ(?!\s)]{2,100}$/";
    
    return preg_match($regex,$apellidos);

}


function validarUsuario($usuario) {

    $regex = "/^[a-zA-Z]{2,30}$/";

    return preg_match($regex,$usuario);


}

function validarEmail($email) {
    
    $regex = "/^([a-zA-Z0-9.])+(@{1})+([a-zA-Z0-9]{2,30})+(\.[a-zA-Z0-9]{2,3}){1}$/";
    
    return preg_match($regex,$email);

}

function validarTelefono($telefono) {

    if (strlen($telefono) == 9) {
        
        if (substr($telefono,0,1) == 9 || substr($telefono,0,1) == 6 || substr($telefono,0,1) == 7) {

            for ($i=1; $i < strlen($telefono); $i++) { 

                if (is_numeric(substr($telefono,$i,1))) {
                    return false;
                }

            }

            return true;

        }

    } 

    return false;

}

function validarPassword($password) {

    $regex = "/^[a-zA-Z0-9]{8,32}$/";

    return preg_match($regex,$password);

}

?>