<?php 

    function mostrarmanuales($consulta,$page,$nummanuales){

    print('<section id="cajaMan">');

    if ($_SESSION["total_pages"] == $page) {
        
        $limite = count($consulta);

    } else {

        $limite = $page*$nummanuales;

    }

    for ($i=(($page-1)*$nummanuales); $i < $limite; $i++) { 
        
        print('<article class="manpos">');
        print('<img class="manimg" src="img/ImagenPDF.png" />');
        print('<p>'.$consulta[$i]['titulo'].'</p>');
        print("</article>");

    }