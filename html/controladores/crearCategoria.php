<?php

require("../plantillasphp/validaciones.php");
require("../plantillasphp/operacionesDb.php");
require("../plantillasphp/redirecciones.php");

session_start();

if (isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_FILES["foto"])) {
    
    $correcto = true;

    if (!validarNombre($_POST["nombre"])) {
        
        $_SESSION["errorNombre"] = "El nombre de la categoria no puede tener numeros, caracteres especiales, acentos ni espacios en blanco (longitud de 2 a 30 caracteres)";
        $correcto = false;

    } if ($_POST["descripcion"] == "") {
        
        $_SESSION["errorDescripcion"] = "Debes indicar la descripcion de la categoria";
        $correcto = false;

    }

    if ($correcto) {

        if ($_FILES['foto']["name"] == "") {
            
            $_SESSION["errorFoto"] = "Debes seleccionar una foto para poder crear la categoria";

        } else {

            if (validarImg($_FILES['foto'])) {
            
                //La ruta de origen es de donde viene la foto
                $rutaOrigen = $_FILES['foto']['tmp_name'];
    
                //La ruta a la que queremos mandar la foto
                $rutaDestino = '../img/categoria/' . $_POST["nombre"].".".pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
    
                try {
                    // hago una copia de la imagen subida y la almaceno
                    move_uploaded_file($rutaOrigen, $rutaDestino);
    
                }
                    catch (Exception $e) {
                        $correcto = false;
                }
    
                if ($correcto) {
                    
                    $crearCategoria = manipularDatoBD("insert into Categoria values (?,?,?);",array($_POST["nombre"],$_POST["descripcion"],$_POST["nombre"].".".pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION)));
    
                    if ($crearCategoria === 1062) {
                        
                        $_SESSION["errorNombre"]=erroresInsertar(1062,array("nombre"));
                        unlink($rutaDestino);
    
                    } else {
                        
                        $_SESSION["exito"] = "Categoria creada de manera exitosa";
    
                    }
    
                } else {
                    
                    $_SESSION["errorFoto"] = "Error al subir la imágen. Intentelo más tarde";
    
                }
    
            } else {
                
                $_SESSION["errorFoto"] = "La foto no puede pesar mas de 8MB y su extension debe ser: JPG, JPEG o PNG";
    
            }

        }



    }

}

redireccionar("../formularioCrearCategoria.php");

?>