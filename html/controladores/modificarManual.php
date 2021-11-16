<?php
require("../plantillasphp/validaciones.php");
require("../plantillasphp/operacionesDb.php");
require("../plantillasphp/redirecciones.php");
require("../controladores/valImgMan.php");
session_start();

//Comprobaciones
//isset => la variable esta declarada y no es nulo
if (isset($_POST["titulo"]) && isset($_POST["descripcion"]) && isset($_FILES['fichero']) && isset($_FILES['portada'])) {
    $correcto = true;
    if ($_POST["titulo"] == "") {
        
        $_SESSION["errorTitulo"] = "Debes indicar el titulo del manual";
        $correcto = false;

    } if ($_POST["descripcion"] == "") {
        
        $_SESSION["errorDescripcion"] = "Debes indicar la descripcion de la herramienta";
        $correcto = false;

    } if ($_FILES['fichero']["name"] == "") {
        
        $_SESSION["errorFichero"] = "el fichero debe ser .pdf o .docx";
        $correcto = false;

    } if ($_FILES['portada']["name"] == "") {
            
        $_SESSION["errorFoto"] = "Debes seleccionar una foto para poder modificar la categoria";
        $correcto = false;

    }
    if ($correcto) {
        if (validarManual($_FILES['fichero']) || validarImg($_FILES["portada"]) || validarNombre($_POST["titulo"])) {
            //Ruta para almacenar las imagenes
            //La ruta de origen es de donde viene la foto
            $rutaOrigenP = $_FILES['portada']['tmp_name'];
            //La ruta a la que queremos mandar la foto
            $rutaDestinoP = '../img/herramienta/' . $_FILES['portada']['name'];

            $rutaOrigenF = $_FILES['fichero']['tmp_name'];
            $rutaDestinoF = '../img/herramienta/' . $_FILES['fichero']['name'];
        }
        try{
            // hago una copia de la imagen subida y la almaceno
            move_uploaded_file($rutaOrigen, $rutaDestino);
        }catch (Exception $e) {
            $correcto = false;
        }
        if ($correcto) {

            $categoriaAnterior = consultarDatoBD("select * from Manual where titulo = ?;",array($_POST["titulo"]));
            $crearCategoria = manipularDatoBD("update Manual set titulo = ?, descripcion = ?, fichero = ?, portada = ? where nombre = ?;",array($_POST["titulo"], $_POST["descripcion"], $_FILES['fichero'].".".pathinfo($_FILES["fichero"]["name"], PATHINFO_EXTENSION), $_FILES['portada'].".".pathinfo($_FILES["portada"]["name"], PATHINFO_EXTENSION), $_POST["titulo"]));
            
            if ($crearCategoria === 1062) {
                    
                $_SESSION["errorTitulo"]=erroresInsertar(1062,array("nombre"));
                unlink($rutaDestinoP);
                unlink($rutaDestinoF);

            }else {

                unlink("../../categoria/".$categoriaAnterior[0]["foto"]);
                
                $_SESSION["nombreHerramienta"] = $_POST["nombre"];

                $_SESSION["exito"] = "Herramienta modificada de manera exitosa";

            }
        }else {
                
            $_SESSION["errorFoto"] = "Error al subir la imágen. Intentelo más tarde";
        }
    }else {
            
        $_SESSION["errorFichero"] = "La foto no puede pesar mas de 32MB y su extension debe ser: PDF, DOC o DOCX";
        $_SESSION["errorPortada"] = "La portada no puede pesar mas de 8MB y su extension debe ser: JPG, JPEG o PNG";
    }
}
redireccionar("../adminSubidosManuales.php");
?>