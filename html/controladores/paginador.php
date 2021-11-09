<?php
require("plantillasphp/operacionesDb.php");
require("plantillasphp/paginadorFunciones.php");
//La consulta para cargar los datos
$consulta = "select titulo from Manual where usuarioaprueba is not null;";
$parametros = array();
// Filas, array con los resultados de la consulta 
$filas = consultarDatoBD($consulta, $parametros);
// El número de artículos(max) que salen por página
$numRegistros = 6;
            /* Las filas                                                                                                        */
generarPaginador($filas, "mostrarManuales", array("resultadoConsulta","page","nummanuales"), "Manuales_lista.php",$numRegistros);

?>