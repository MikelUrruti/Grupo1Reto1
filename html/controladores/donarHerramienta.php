<?php
$usuario = $_POST["usuario"];
$herramienta = $_POST["herramienta"];
// $img = $_FILES["foto"];
$descripcion = $_POST["descripcion"];

//Ruta para almacenar las imagenes
    //realpath: ruta absoluta del fichero
$rutaIndex = dirname(realpath(__FILE__));
$rutaOrigen = $_FILES['foto']['name'];
$rutaDestino = $rutaIndex . '/img/herramientas/' . $_FILES['foto']['name'];

echo $rutaIndex . "       " . $rutaOrigen . "       " . $rutaDestino;

// if (validacionImg()) {
//     //Se guarda el fichero
//     if (move_uploaded_file($rutaOrigen, $rutaDestino)) {
//         // echo '<p>Copia de la imagen</p>';
//         echo $usuario . $herramienta. $descripcion;
//     }
// }

function validacionImg(){
    //Filtros para la imagen
    $extensiones = array(
        0 => 'image/jpg',
        1 => 'imagen/jpeg',
        2 => 'image/png',
    );
    // Peso de 1Mb
    $maxTam = 1024 * 1024 * 8;

    //Comprobaciones
    if (in_array($_FILES['foto']['type'], $extensiones)) {
        // echo "Es una imagen";

        if ($_FILES['foto']['size'] < $maxTam) {
            // echo "Pesa menos de 1MB";
            return true;
        }
    }
    return false;
}
?>