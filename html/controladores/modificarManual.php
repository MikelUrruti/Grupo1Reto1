<?php
require("../plantillasphp/validaciones.php");
require("../plantillasphp/operacionesDb.php");
require("../plantillasphp/redirecciones.php");
require("../controladores/valImgMan.php");
session_start();

//Ruta para almacenar las imagenes
//La ruta de origen es de donde viene la foto
$rutaOrigenP = $_FILES['portada']['tmp_name'];
//La ruta a la que queremos mandar la foto
$rutaDestinoP = '../img/herramienta/' . $_FILES['portada']['name'];

$rutaOrigenF = $_FILES['fichero']['tmp_name'];
$rutaDestinoF = '../img/herramienta/' . $_FILES['fichero']['name'];

//Comprobaciones
//isset => la variable esta declarada y no es nulo
if (isset($_POST["titulo"]) && isset($_SESSION["descripcion"]) && isset($_FILES['fichero']) && isset($_FILES['portada'])) {
    $correcto = true;
    if (!validarNombre($_POST["titulo"])) {
        //Este $_SESSION devuelve un mensaje de error
        $_SESSION["errorTitulo"] = "No se permiten numeros ni caracteres especiales. Deber contener de 2 a 30 caracteres.";
        $correcto = false;
    } else if (!validarManual($_FILES["fichero"])) {
        //Este $_SESSION devuelve un mensaje de error
        $_SESSION["errorManual"] = "Debe introducir un manual.";
        $correcto = false;
    } else if (!validarImg($_FILES["portada"])) {
        $_SESSION["errorManual"] = "Debe introducir un manual.";
        $correcto = false;
    }
    //Si los tres pasos anteriores son correctos
    if ($correcto) {
        try {
            // hago una copia de la imagen subida y la almaceno
            move_uploaded_file($rutaOrigenP, $rutaDestinoP);
            move_uploaded_file($rutaOrigenF, $rutaDestinoF);
            $correcto2 = true;
        } catch (Exception $e) {
            $correcto2 = false;
        }
        if ($correcto2) {
            // $nomImg = consultarDatoBD("select " .$_SESSION["manualSeleccionado"]. " from Manual");
            $parametros = array($_POST["titulo"], $_POST["descripcion"], $_FILES["fichero"], $_FILES["portada"]);
            //Los signos de interrogacion, en este caso, cogen los valores de la primera variable que encuentre, en orden de creacion de esas subvariables
            $consulta = manipularDatoBD("insert into Manual(titulo,descripcion,fichero,portada) values (?, ?, ?, ?)", $parametros);

            if (is_integer($consulta)) {
                //Mensaje de error al insertar la herramienta
                $_SESSION["errorGeneral"] = erroresInsertar($consulta, array("titulo", "descripcion", "fichero", "portada"));
                echo $_SESSION["errorGeneral"];

                redireccionar("../formularioModificarManual.php");
            } else {
                //Mensaje cuando subes bien la herramienta
                $_SESSION["exito"] = "Se ha modificado el manual de manera exitosa";

                redireccionar("adminSubidosManuales.php");
            }
        } else {
            //Mensaje de error cuando la BD esta desconectada o algo asi
            $_SESSION["errorGeneral"] = "Error al subir la imágen. Intentelo más tarde";
        }
        redireccionar("adminSubidosManuales.php");
    } else {

        redireccionar("adminSubidosManuales.php");
    }
} else {

    redireccionar("adminSubidosManuales.php");
}
?>