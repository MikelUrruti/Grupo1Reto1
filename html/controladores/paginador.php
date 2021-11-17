<?php
require("plantillasphp/operacionesDb.php");
require("plantillasphp/paginadorFunciones.php");

if (!isset($_GET["page"])) {

    if (!isset($_SESSION["filtradoPrimeraVez"])) {
        
        $_SESSION["mantenerFiltrado"] = false;

        unset($_SESSION["filtrado"]);

    } else {
        
        $_SESSION["mantenerFiltrado"] = true;
        unset($_SESSION["filtradoPrimeraVez"]);

    }

}

if (isset($_SESSION["filtrado"])) {

    $resultados = $_SESSION["filtrado"];

} else {

    $resultados = consultarDatoBD("select titulo, portada, fichero from Manual where usuarioaprueba is not null;", array());

    $_SESSION["filas"] = array();

    foreach ($resultados as $resultado) {

        array_push($_SESSION["filas"], $resultado);

    }

}

generarPaginador($resultados, "mostrarManuales", array("resultadoConsulta","page","nummanuales",array("../manuales/"),array("../manuales/portadas/")), basename($_SERVER['PHP_SELF']),6);


?>