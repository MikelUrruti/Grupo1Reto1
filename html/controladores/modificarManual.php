<?php
    require("../plantillasphp/validaciones.php");
    require("../plantillasphp/operacionesDb.php");
    require("../plantillasphp/redirecciones.php");
    require("../controladores/valImgMan.php");
    session_start();

    //Ruta para almacenar las imagenes
//La ruta de origen es de donde viene la foto
$rutaOrigen = $_FILES['foto']['tmp_name'];
//La ruta a la que queremos mandar la foto
$rutaDestino = '../img/herramienta/' . $_FILES['foto']['name'];

//Comprobaciones
//isset => la variable esta declarada y no es nulo
if (isset($_POST["titulo"]) && isset($_SESSION["descripcion"]) && isset($_FILES['fichero']) && isset($_FILES['portada'])) {
    $correcto = true;
    if (!validarNombre($_POST["titulo"])) {
        //Este $_SESSION devuelve un mensaje de error
        $_SESSION["errorTitulo"] = "No se permiten numeros ni caracteres especiales. Deber contener de 2 a 30 caracteres.";
        $correcto = false;
    }else if (!validarImg($_FILES["fichero"])) {
        //Este $_SESSION devuelve un mensaje de error
        $_SESSION["errorImg"] = "Debe introducir una imagen de la herramienta.";
        $correcto = false
    }
}
?>