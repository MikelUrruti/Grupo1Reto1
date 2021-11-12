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
    //Filtros para los manuales
    $extensiones = array(
        0 => ".doc",
        1 => ".docx",
        2 => "application/pdf"
    );

    //Si el archivo es uno de los aceptados
    if(in_array($manual["type"], $extensiones)){
        return true;
    }
    return false;
}
?>