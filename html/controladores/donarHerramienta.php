<?php

require("../plantillasphp/validaciones.php");
require("../plantillasphp/operacionesDb.php");
require("../plantillasphp/redirecciones.php");

session_start();

//Ruta para almacenar las imagenes
//realpath: ruta absoluta del fichero
$rutaIndex = dirname(realpath(__FILE__));
$rutaOrigen = $_FILES['foto']['tmp_name'];
$rutaDestino = '../img/herramientas/' . $_FILES['foto']['name'];


$_SESSION["ruta"] = $rutaDestino. " ------- ". $rutaOrigen. "-----".$rutaIndex;

//Comprobaciones
if (isset($_POST["herramienta"]) && isset($_POST["usuario"]) && isset($_POST["descripcion"]) && isset($_FILES['foto'])) {
    $correcto = true;
    if (!validarNombre($_POST["herramienta"])) {
        $_SESSION["errorHerramienta"] = "No se permiten numeros ni caracteres especiales. Deber contener de 2 a 30 caracteres.";
        $correcto = false;
    } else if (!validarImg($_FILES["foto"])) {
        $_SESSION["errorImg"] = "Debe introducir una imágen de la herramienta.";
        $correcto = false;
    } else if (strlen($_POST["descripcion"]) > 500) {
        $_SESSION["errorDescripcion"] = "La descripción debe tener menos de 500 carácteres.";
        $correcto = false;
    }

    if ($correcto) {
        
        if (move_uploaded_file($rutaOrigen, $rutaDestino)) {
            $parametros = array($_SESSION["usuario"], $_POST["herramienta"], $_FILES['foto']['name'], $_POST["descripcion"]);
            $consulta = manipularDatoBD("insert into Donaciones values (?, ?, ?, ?)", $parametros);

            if (is_integer($consulta)) {

                $_SESSION["errorGeneral"] = erroresInsertar($consulta, array("Usuario", "Herramienta", "Fichero", "Descripcion"));
                echo $_SESSION["errorGeneral"];

            } else {            

                $_SESSION["exito"] = "Se ha enviado la herramienta de manera exitosa";
            
            }
            redireccionar("../donar.php");
        }else{
            $_SESSION["errorGeneral"] = "Error al subir la imágen. Intentelo más tarde";
        }
        redireccionar("../donar.php");
    } else {

        redireccionar("../donar.php");
    }
} else {

    redireccionar("../donar.php");
}



function validarImg($foto)
{

    //Filtros para la imagen
    $extensiones = array(
        0 => 'image/jpg',
        1 => 'imagen/jpeg',
        2 => 'image/png',
    );
    // Peso de 8Mb aprox
    $maxTam = 1600 * 1200 * 8;

    if (in_array($foto['type'], $extensiones)) {
        // echo "Es una imagen";

        if (!$foto['size'] < $maxTam) {
            // echo "Pesa menos de 8MB";
            return true;
        }
    }
    return false;
}
?>