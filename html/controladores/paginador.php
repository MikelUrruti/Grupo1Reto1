<?php
require("plantillasphp/operacionesDb.php");
require("cargarManuales.php");
//La consulta para cargar los datos
$consulta = "select titulo from Manual;";
$parametros = array();
$filas = consultarDatoBD($consulta, $parametros);
$totalconsulta = count($filas);


if ($totalconsulta > 0) {
    $page = false;

    //examino la pagina a mostrar y el inicio del registro a mostrar
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

    if (!$page) {
        $start = 0;
        $page = 1;
    } else {
        $start = ($page - 1) * 6;
    }
    //calculo el total de paginas

    $nummanuales = 6;
    $_SESSION["total_pages"] = ceil($totalconsulta / $nummanuales);

    //pongo el numero de registros total, el tamano de pagina y la pagina que se muestra

    mostrarmanuales($filas,$page,$nummanuales);

    //Inicio de la creacion de las bolitas
    echo '<article id="cantPag">';

    if ($_SESSION["total_pages"] > 1) {
        if ($page != 1) {
            echo '
            <section id="movIzq">
                <a href="Manuales_lista.php?page=' . ($page - 1) . '"> <img src="img/Paso.png" /></a>
            </section>';
        }

        for ($i = 1; $i <= $_SESSION["total_pages"]; $i++) {
            if ($page == $i) {
                echo '
                <section class="numPag">
                        <a href="Manuales_lista.php">' . $page . '</a>
                </section>';
            } else {
                echo '
                <section class="numPag">
                    
                        <a href="Manuales_lista.php?page=' . $i . '">' . $i . '</a>
                    
                </section>';
            }
        }

        if ($page != $_SESSION["total_pages"]) {
            echo '
            <section id="movDer">
                <a href="Manuales_lista.php?page=' . ($page + 1) . '"> <img src="img/Paso.png" /></a>
            </section>';
        }
    }

    echo '</article>';
}

?>