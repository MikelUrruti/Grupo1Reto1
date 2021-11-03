<?php 
    require("plantillasphp/operacionesDb.php");  
    require("cargarManuales.php");    
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
    // $total_page = ceil($totalconsulta / 6);
    $total_pages = ceil($totalconsulta /6);
 
    // //pongo el numero de registros total, el tamano de pagina y la pagina que se muestra

    mostrarmanuales($filas);
 
    echo '<article id="cantPag">';
    echo '<section id="movIzq">
        <img src="img/Paso.png" />
        </section>';
 
    if ($total_pages > 1) {
        if ($page != 1) {
            echo '<section class="numPag" class="page-item">
                <p>
                    <a class="page-link" href="index.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a>
                </p>
            </section>';
        }
 
        for ($i=1;$i<=$total_pages;$i++) {
            if ($page == $i) {
                echo '
                <section class="numPag" class="page-item active>
                    <p>
                        <a class="page-link" href="#">'.$page.'</a>
                    </p>
                </section>';
            } else {
                echo '
                <section class="numPag" class="page-item>
                    <p>
                        <a class="page-link" href="index.php?page='.$i.'">'.$i.'</a>
                    </p>
                </section>';
            }
        }
 
        if ($page != $total_pages) {
            echo '
            <section class="numPag" class="page-item>
                    <p>
                    <a class="page-link" href="index.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a>
                    </p>
                </section>';
        }
    }
    echo '<section id="movDer">
        <img src="img/Paso.png" />
        </section>';
    echo '</article>';
}
