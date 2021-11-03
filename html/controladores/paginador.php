<?php
require("plantillasphp/operacionesDb.php");
require("cargarManuales.php");
//La consulta para cargar los datos
$consulta = "select titulo from Manual;";
$parametros = array();
$filas = consultarDatoBD($consulta, $parametros);
//Cantidad total de elementos que hemos recibido de la consulta
$totalconsulta = count($filas);

//Si nos devuelve alguna consulta entra, si no, no
if ($totalconsulta > 0) {
    //$page = la pagina en la que nos situamos actualmente
    $page = false;

    //examino la pagina a mostrar y el inicio del registro a mostrar
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

    //Lo que hace al cargar la pagina
    if (!$page) {
        $start = 0;
        $page = 1;
    } else {
        $start = ($page - 1) * 6;
    }
    //calculo el total de paginas
    $total_pages = ceil($totalconsulta / 6);

    //pongo el numero de registros total, el tamano de pagina y la pagina que se muestra
    mostrarmanuales($filas,$page);

    //Inicio de la creacion de las bolitas
    echo '<article id="cantPag">';
    echo '<section id="movIzq">
        <img src="img/Paso.png" />
        </section>';

    //Comprobacion de los elementos que hay en la bd para crear las bolitas necesarias
    if ($total_pages > 1) {
        if ($page != 1) {
            echo '<section class="numPag" class="page-item">
                <p>
                    <a class="page-link" href="Manuales_lista.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a>
                </p>
            </section>';
        }
        
        //Estilo de las bolitas que marcan las paginas
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($page == $i) {
                echo '
                <section class="numPag" class="page-item active>
                    <a class="page-link" href="Manuales_lista.php">' . $page . '</a>
                </section>';
            } else {
                echo '
                <section class="numPag" class="page-item>
                    
                        <a class="page-link" href="Manuales_lista.php?page=' . $i . '">' . $i . '</a>
                    
                </section>';
            }
        }

        if ($page != $total_pages) {
            echo '
            <section class="numPag" class="page-item">
                    <p>
                    <a class="page-link" href="Manuales_lista.php?page=' . ($page + 1) . '"><span aria-hidden="true">&raquo;</span></a>
                    </p>
                </section>';
        }
    }
    echo '<section id="movDer">
        <img src="img/Paso.png" />
        </section>';
    echo '</article>';
}
// }
?>