<?php 

require("../plantillasphp/operacionesDb.php");
require("../plantillasphp/validaciones.php");
require("../plantillasphp/redirecciones.php");

session_start();

//Ruta para almacenar el formulario
//La ruta de origen es de donde viene el manual
//tmp_name -> guarda el nombre temporal del archivo
$rutaOrigen = $_FILES['manual']['tmp_name'];
//La ruta donde queremos mandar el manual
$rutaDestino = "../manuales/".$_FILES['manual']['name'];
//Variable para saber si el archivo es correcto o no
$correcto = false;

//Comprobaciones
if (validarManual($_FILES["manual"])){
    $correcto = true;
}
redireccionar("../Manuales_subir.php");

?>