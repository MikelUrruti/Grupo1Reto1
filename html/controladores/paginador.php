<?php
require("plantillasphp/operacionesDb.php");
require("plantillasphp/paginadorFunciones.php");
//La consulta para cargar los datos
$consulta = "select titulo, portada from Manual where usuarioaprueba is not null;";
$parametros = array();
// Filas, array con los resultados de la consulta 
//Te devuelve dos columnas, siendo la primera el titulo del manual y la segunda la imagen de la portada
$filas = consultarDatoBD($consulta, $parametros);
// El número de artículos(max) que salen por página
$numRegistros = 6;
$filtro=$_GET["filtro"];
/*
$filas = la consulta en un array
"mostrarManuales = la funcion a la que llama en 'paginadorFunciones,php'
array = son los datos que debemos mandar para que funcione la funcion
"Manuales_lista.php" = hace referencia a la pagina en la que quermos que se cargue la funcion especifica
$numregistros = la cantidad de registros que aparecen en cada pagina
*/
generarPaginador($filas, "mostrarManuales", array("resultadoConsulta","page","nummanuales"), "Manuales_lista.php",$numRegistros,$filtro);

?>