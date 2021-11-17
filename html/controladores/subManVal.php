<?php 

require("../controladores/valImgMan.php");
require("../plantillasphp/validaciones.php");
require("../plantillasphp/redirecciones.php");
require("../plantillasphp/funcionesFormularios.php");

session_start();

//Ruta para almacenar el formulario
//La ruta de origen es de donde viene el manual
//tmp_name -> guarda el nombre temporal del archivo
$rutaOrigen = $_FILES['manual']['tmp_name'];
//La ruta donde queremos mandar el manual
$rutaDestino = "img/manuales/".$_FILES['manual']['name'];

//Comprobaciones
if (validarManual($_FILES["manual"])){
    $_SESSION["manualsubido"];
}else{
    $_SESSION["errorGeneral"];
}
redireccionar("../Manuales_subir.php");

?>