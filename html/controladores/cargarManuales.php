<?php 

    // require("plantillasphp/operacionesDb.php");

    // $consulta = "select titulo from Manual;";
    // $parametros = array();

    // $filas = consultarDatoBD($consulta, $parametros);

    // mostrarmanuales($filas);


    function mostrarmanuales($consulta){

    print('<section id="cajaMan">');
    foreach($consulta as $columnas){
        print('<article class="manpos">');
            print('<img class="manimg" src="img/ImagenPDF.png" />');
            print('<p>'.$columnas['titulo'].'</p>');
        print("</article>");
    }
    print('</section>');

    }
?>