<?php

require("../plantillasphp/validaciones.php");
require("../plantillasphp/operacionesDb.php");
require("../plantillasphp/redirecciones.php");

session_start();

if (isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["stock"]) && isset($_POST["categoria"]) && isset($_FILES["foto"])) {
    
    $correcto = true;

    if ($_POST["nombre"] == "") {
        
        $_SESSION["errorNombre"] = "Debes indicar el nombre de la herramienta";
        $correcto = false;

    } if ($_POST["descripcion"] == "") {
        
        $_SESSION["errorDescripcion"] = "Debes indicar la descripcion de la herramienta";
        $correcto = false;

    } if (!validarStock($_POST["stock"])) {
        
        $_SESSION["errorStock"] = "El stock debe ser un valor numerico sin decimales";
        $correcto = false;

    } if ($_FILES['foto']["name"] == "") {
            
        $_SESSION["errorFoto"] = "Debes seleccionar una foto para poder crear la categoria";
        $correcto = false;

    }

    if ($correcto) {

        if (validarImg($_FILES['foto'])) {
        
            //La ruta de origen es de donde viene la foto
            $rutaOrigen = $_FILES['foto']['tmp_name'];

            //La ruta a la que queremos mandar la foto
            $rutaDestino = "../img/herramientas/" . $_POST["nombre"].".".pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);

            try {
                // hago una copia de la imagen subida y la almaceno
                move_uploaded_file($rutaOrigen, $rutaDestino);

            }
                catch (Exception $e) {
                    $correcto = false;
            }

            if ($correcto) {
                
                $crearCategoria = manipularDatoBD("insert into Herramienta values (?,?,?,?,?,?);",array($_POST["nombre"],$_POST["descripcion"],$_POST["categoria"],$_POST["stock"],$_POST["nombre"].".".pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION),"catalogada"));

                if ($crearCategoria === 1062) {
                    
                    $_SESSION["errorNombre"]=erroresInsertar(1062,array("nombre"));
                    unlink($rutaDestino);

                } else {
                    
                    $_SESSION["exito"] = "Herramienta creada de manera exitosa";

                }

            } else {
                
                $_SESSION["errorFoto"] = "Error al subir la imágen. Intentelo más tarde";

            }

        } else {
            
            $_SESSION["errorFoto"] = "La foto no puede pesar mas de 8MB y su extension debe ser: JPG, JPEG o PNG";

        }

    }

}

redireccionar("../formularioCrearHerramienta.php");

?>