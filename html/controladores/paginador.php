<?php
require("plantillasphp/operacionesDb.php");
require("plantillasphp/paginadorFunciones.php");
//La consulta para cargar los datos
$consulta = "select titulo from Manual where usuarioaprueba is not null;";
$parametros = array();
$filas = consultarDatoBD($consulta, $parametros);

generarPaginador($filas, "mostrarManuales", array("resultadoConsulta","page","nummanuales"), "Manuales_lista.php");

?>