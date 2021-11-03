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
    $nummanuales = 6;
    //Esta sesion es para la cantidad de bolitas que va a haber
    $_SESSION["total_pages"] = ceil($totalconsulta / $nummanuales);

    //pongo el numero de registros total, el tamano de pagina y la pagina que se muestra
    mostrarmanuales($filas,$page,$nummanuales);

    //Inicio de la creacion de las bolitas
    echo '<article id="cantPag">';

    //Comprobacion de los elementos que hay en la bd para crear las bolitas necesarias
    if ($_SESSION["total_pages"] > 1) {
        //Flecha que sirve para ir hacia la izquierda, solo aparece siempre y cuando no este en la primera pagina
        if ($page != 1) {
            echo '
            <section id="movIzq">
                <a href="Manuales_lista.php?page=' . ($page - 1) . '"> <img src="img/Paso.png" /></a>
            </section>';
        }

        //Estilo de las bolitas que marcan las paginas
        for ($i = 1; $i <= $_SESSION["total_pages"]; $i++) {
            //Si entra aqui es que esta en esa pagina
            if ($page == $i) {
                echo '
                <a class="numPag" id="posAct" href="Manuales_lista.php?page='.$i.'">
                    <section>
                            ' .$page. '
                    </section>
                </a>';                
            //Aqui solo entra cuando la posicion de $i no concuerda con la pagina en la que esta
            } else {
                echo '
                <a class="numPag" href="Manuales_lista.php?page=' . $i . '">
                    <section>
                        ' .$i. '                    
                    </section>
                </a>';
            }
        }

        //Flecha que sirve para ir hacia la derecha, solo aparece siempre y cuando no este en la ultima pagina
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