<?php

require("../plantillasphp/validaciones.php");
require("../plantillasphp/operacionesDb.php");
require("../plantillasphp/redirecciones.php");

session_start();

//Ruta para almacenar las imagenes
//La ruta de origen es de donde viene la foto
$rutaOrigen = $_FILES['foto']['tmp_name'];
//La ruta a la que queremos mandar la foto
$rutaDestino = '../img/herramienta/' . $_FILES['foto']['name'];


//Comprobaciones
//isset => la variable esta declarada y no es nulo
if (isset($_POST["herramienta"]) && isset($_SESSION["usuario"]) && isset($_POST["descripcion"]) && isset($_FILES['foto'])) {
    $correcto = true;
    if (!validarNombre($_POST["herramienta"])) {
        //Este $_SESSION devuelve un mensaje de error
        $_SESSION["errorHerramienta"] = "No se permiten numeros ni caracteres especiales. Deber contener de 2 a 30 caracteres.";
        $correcto = false;
    } else if (!validarImg($_FILES["foto"])) {
        //Este $_SESSION devuelve un mensaje de error
        $_SESSION["errorImg"] = "Debe introducir una imagen de la herramienta.";
        $correcto = false;
    } else if (strlen($_POST["descripcion"]) > 500) {
        //Este $_SESSION devuelve un mensaje de error
        $_SESSION["errorDescripcion"] = "La descripción debe tener menos de 500 carácteres.";
        $correcto = false;
    } else if (!validarManual($_FILES["manual"])) {
        //Este $_SESSION devuelve un mensaje de error
        $_SESSION["errorManual"] = "Error";
        $correcto = false;
    }

    //Si los tres pasos anteriores son correctos
    if ($correcto) {
        
        try {
            // hago una copia de la imagen subida y la almaceno
            move_uploaded_file($rutaOrigen, $rutaDestino);
            $correcto2 = true;
        }
            catch (Exception $e) {
                $correcto2 = false;
        }
        if ($correcto2) {
            $nomImg = consultarDatoBD("select max(id)+1 from Donaciones");
            $parametros = array($_SESSION["usuario"], $_POST["herramienta"], $nomImg[0]["max(id)+1"], $_POST["descripcion"]);
            //Los signos de interrogacion, en este caso, cogen los valores de la primera variable que encuentre, en orden de creacion de esas subvariables
            $consulta = manipularDatoBD("insert into Donaciones(usuario,nomHerramienta,fichero,descripcion) values (?, ?, ?, ?)", $parametros);

            if (is_integer($consulta)) {
                //Mensaje de error al insertar la herramienta
                $_SESSION["errorGeneral"] = erroresInsertar($consulta, array("Usuario", "Herramienta", "Fichero", "Descripcion"));
                echo $_SESSION["errorGeneral"];

            } else {            
                //Mensaje cuando subes bien la herramienta
                $_SESSION["exito"] = "Se ha enviado la herramienta de manera exitosa";
            
            }
            redireccionar("../donar.php");
        }else{
            //Mensaje de error cuando la BD esta desconectada o algo asi
            $_SESSION["errorGeneral"] = "Error al subir la imágen. Intentelo más tarde";
        }
        redireccionar("../donar.php");
    } else {

        redireccionar("../donar.php");
    }
} else {

    redireccionar("../donar.php");
}




?>