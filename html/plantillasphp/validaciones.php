<?php

/*En los regex -> /^, indica el inicio del regex
               -> $/, indica el final del regex
*/
//Comprobamos que el nombre que haya introducido sea el correcto
function validarNombre($nombre) {
    //El regex permite cualquier letra, con tilde, ñ y ü; ya sean mayusculas o minusculas.
    //Minimo han de ser 2 y un maximo de 30 caracteres
    $regex = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ(?!\s)]{2,30}$/";

    return preg_match($regex,$nombre);
}

//Comprobamos el apellido
function validarApellidos($apellidos) {
    //El regex permite cualquier letra, con tilde, ñ y ü; ya sean mayusculas o minusculas.
    //Minimo han de ser 2 y un maximo de 100 caracteres    
    $regex = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ(?!\s)]{2,100}$/";
    
    return preg_match($regex,$apellidos);
}

//Comprobamos el usuario
function validarUsuario($usuario) {
    //El regex permite cualquier letra; ya sean mayusculas o minusculas y numeros.
    //Minimo han de ser 2 y un maximo de 30 caracteres
    $regex = "/^[a-zA-Z0-9]{2,30}$/";

    return preg_match($regex,$usuario);
}

//Comprobamos el correo
function validarEmail($email) {
    $regex = "/^([a-zA-Z0-9.])+(@{1})+([a-zA-Z0-9]{2,30})+(\.[a-zA-Z0-9]{2,3}){1}$/";
    
    return preg_match($regex,$email);

}

//Comprobamos el telefono
function validarTelefono($telefono) {

    if (strlen($telefono) == 9) {
        
        if (substr($telefono,0,1) == 9 || substr($telefono,0,1) == 6 || substr($telefono,0,1) == 7) {

            for ($i=1; $i < strlen($telefono); $i++) { 

                if (!is_numeric(substr($telefono,$i,1))) {
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

function validarStock($stock) {


    return ctype_digit($stock);

}

function validarImg($foto)
{
    //Filtros para la imagen
    $extensiones = array(
        0 => 'image/jpg',
        1 => 'image/jpeg',
        2 => 'image/png',
    );
    // Peso de 8Mb aprox
    $maxTam = 1600 * 1200 * 8;

    if (in_array($foto['type'], $extensiones)) {
        // echo "Es una imagen";
        
        if ($foto['size'] < $maxTam) {
            // echo "Pesa menos de 8MB";
            return true;
        }
    return false;
    }
}
//Funcion creada para validar el tipo de manuales que se suben
function validarManual($manual){
    /*
        Pasos a seguir para saber que extension es
    */
    //Guardamos el nombre en una variable
    $nombre = $manual['name'];
    //Creamos una variable para el separador, ya que solo se le pueden pasar variables
    $separador = ".";
    //Usamos el "explode" para separa el nombre en varios partes a partir del separador 
    //  creado con anterioridad. El explode genera un array
    $separacion=explode($separador, $nombre);
    //Ahora guardamos la extension en una variable para poder validar si es alguna de las permitidas
    $extension = end($separacion);

    // Peso de 32Mb aprox
    $maxTam = 33554432;

    //Filtros para los manuales
    $extensiones = array(
        0 => "doc",
        1 => "docx",
        2 => "pdf",
    );

    //Si la extension del archivo existe en el array, siendo asi uno de los permitidos
    if(in_array($extension, $extensiones)){
        if ($manual['size'] < $maxTam) {
            return true;
        }
    }
    return false;
}
?>