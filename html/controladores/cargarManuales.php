<?php 

    // require("plantillasphp/operacionesDb.php");

    // $consulta = "select titulo from Manual;";
    // $parametros = array();

    // $filas = consultarDatoBD($consulta, $parametros);

    // mostrarmanuales($filas);


    function mostrarmanuales($consulta,$page){

    print('<section id="cajaMan">');

    for ($i=(($page-1)*6); $i < ($page*6); $i++) { 
        
        print('<article class="manpos">');
        print('<img class="manimg" src="img/ImagenPDF.png" />');
        print('<p>'.$consulta[$i]['titulo'].'</p>');
        print("</article>");

    }
    
    print('</section>');

    }
?>