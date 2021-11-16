<?php

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