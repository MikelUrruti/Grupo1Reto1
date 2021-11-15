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

//Funcion creada para validar el tipo de manuales que se suben
function validarManual(){
    /*
        Pasos a seguir para saber que extension es
    */
    //Guardamos el nombre en una variable
    $nombre = $_FILES['manual']['name'];
    //Creamos una variable para el separador, ya que solo se le pueden pasar variables
    $separador = ".";
    //Usamos el "explode" para separa el nombre en varios partes a partir del separador 
    //  creado con anterioridad. El explode genera un array
    $separacion=explode($separador, $nombre);
    //Ahora guardamos la extension en una variable para poder validar si es alguna de las permitidas
    $extension = end($separacion);

    //Filtros para los manuales
    $extensiones = array(
        0 => "doc",
        1 => "docx",
        2 => "pdf",
    );

    //Si la extension del archivo existe en el array, siendo asi uno de los permitidos
    if(in_array($extension, $extensiones)){
        return true;
    }
    return false;
}
?>