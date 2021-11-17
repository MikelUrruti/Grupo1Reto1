<?php
require("../plantillasphp/validaciones.php");
require("../plantillasphp/operacionesDb.php");
require("../plantillasphp/redirecciones.php");
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
            $rutaDestinoP = '../../manuales/portadas/' . $_POST["titulo"].".".pathinfo($_FILES["portada"]["name"], PATHINFO_EXTENSION);

            $rutaOrigenF = $_FILES['fichero']['tmp_name'];
            $rutaDestinoF = '../../manuales/' . $_POST["titulo"].".".pathinfo($_FILES["fichero"]["name"], PATHINFO_EXTENSION);
            
        }
        
        if(move_uploaded_file($rutaOrigenP, $rutaDestinoP)){
            if(move_uploaded_file($rutaOrigenF, $rutaDestinoF)){
                $correcto = true;
            }else{
                $correcto = false;
                $_SESSION["errorFichero"] = "La foto no puede pesar mas de 32MB y su extension debe ser: PDF, DOC o DOCX";
            }
        }else{
            $correcto = false;
            $_SESSION["errorPortada"] = "La portada no puede pesar mas de 8MB y su extension debe ser: JPG, JPEG o PNG";
        }
        if ($correcto) {

            $categoriaAnterior = consultarDatoBD("select * from Manual where titulo = ?;",array($_SESSION['manualSeleccionado']));
            $crearCategoria = manipularDatoBD("update Manual set titulo = ?, descripcion = ?, fichero = ?, portada = ? where titulo = ?;",
            array($_POST["titulo"], $_POST["descripcion"], $_POST["titulo"].".".pathinfo($_FILES["fichero"]["name"], PATHINFO_EXTENSION), 
            $_POST["titulo"].".".pathinfo($_FILES["portada"]["name"], PATHINFO_EXTENSION), $_SESSION['manualSeleccionado']));
            
            if ($crearCategoria === 1062) {
                    
                $_SESSION["errorTitulo"]=erroresInsertar(1062,array("titulo"));
                unlink($rutaDestinoP);
                unlink($rutaDestinoF);

            }else {

                if ($_FILES["portada"]["name"] != $categoriaAnterior[0]["portada"]) {
                    unlink("../../manuales/portadas/".$categoriaAnterior[0]["portada"]);
                } if ($_FILES["fichero"]["name"] != $categoriaAnterior[0]["fichero"]) {
                    unlink("../../manuales/".$categoriaAnterior[0]["fichero"]);
                }
                
                $_SESSION["nombreManual"] = $_POST["titulo"];

                $_SESSION["exito"] = "Manual modificado de manera exitosa";
                redireccionar("../adminSubidosManuales.php");

            }
        }else {
                
            $_SESSION["errorFoto"] = "Error al subir la imágen. Intentelo más tarde";
            redireccionar("../formularioModificarManual.php");
        }
    }else {
            
        $_SESSION["errorGeneral"] = "Error al editar. Intentelo de nuevo más tarde";
        redireccionar("../formularioModificarManual.php");
    }
    // redireccionar("../formularioModificarManual.php");
}
// redireccionar("../adminSubidosManuales.php");
?>