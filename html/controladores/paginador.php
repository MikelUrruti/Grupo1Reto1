<?php
require("plantillasphp/operacionesDb.php");
require("plantillasphp/paginadorFunciones.php");
//La consulta para cargar los datos
$consulta = "select titulo from Manual;";
$parametros = array();
$filas = consultarDatoBD($consulta, $parametros);
$numRegistros = 6;

generarPaginador($filas, "mostrarManuales", array("resultadoConsulta","page","nummanuales"), "Manuales_lista.php",$numRegistros);

?>