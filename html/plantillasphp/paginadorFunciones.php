<?php 

    function generarPaginador(array $resultadoConsulta, string $nombreFuncion, array $parametrosFuncion, string $pagina, int $numRegistros) {

        $totalconsulta = count($resultadoConsulta);

        //Si nos devuelve alguna consulta entra, si no, no
        if ($totalconsulta > 0) {
            //$page = la pagina en la que nos situamos actualmente
            $page = false;

            //examino la pagina a mostrar y el inicio del registro a mostrar
            if (isset($_GET["page"])) {

                $page = $_GET["page"];
                $_SESSION["mantenerFiltrado"] = true;
                
            }
            

            $nummanuales = $numRegistros;

            //Lo que hace al cargar la pagina
            if (!$page) {
                $start = 0;
                $page = 1;
            } else {
                $start = ($page - 1) * $nummanuales;
            }

            //calculo el total de paginas
            
            //Esta sesion es para la cantidad de bolitas que va a haber
            $_SESSION["total_pages"] = ceil($totalconsulta / $nummanuales);

            //pongo el numero de registros total, el tamano de pagina y la pagina que se muestra

            // Parametros de la consulta
            $nombreFuncion .= "(";

            for ($i=0; $i < count($parametrosFuncion); $i++) { 
                
                if ($i == count($parametrosFuncion)-1) {
                    
                    if (gettype($parametrosFuncion[$i]) == "array") {

                        $array = "array(";

                        for ($j=0; $j < count($parametrosFuncion[$i]); $j++) { 
                            
                            if ($j == count($parametrosFuncion[$i])-1) {
                                $array .= "'".$parametrosFuncion[$i][$j]."')";
                            } else {
                                $array .= "'".$parametrosFuncion[$i][$j]."',";
                            }

                        }

                        $nombreFuncion .= $array.");";

                    } else {
                        $nombreFuncion .= "$".$parametrosFuncion[$i].");";
                    }

                } else {
                    
                    if (gettype($parametrosFuncion[$i]) == "array") {

                        $array = "array(";

                        for ($j=0; $j < count($parametrosFuncion[$i]); $j++) { 
                            
                            if ($j == count($parametrosFuncion[$i])-1) {
                                $array .= "'".$parametrosFuncion[$i][$j]."')";
                            } else {
                                $array .= "'".$parametrosFuncion[$i][$j]."',";
                            }

                        }

                        $nombreFuncion .= $array.",";
                    } else {
                        $nombreFuncion .= "$".$parametrosFuncion[$i].",";
                    }

                }

            }

            // echo $nombreFuncion;

            // echo $nombreFuncion;

            // Ejecuta lo que le pases como si fuese código php
            eval($nombreFuncion);
            
            // mostrarmanuales($resultadoConsulta,$page,$nummanuales);

            //Inicio de la creacion de las bolitas
            echo '<article id="cantPag">';

            //Comprobacion de los elementos que hay en la bd para crear las bolitas necesarias
            if ($_SESSION["total_pages"] > 1) {
                //Flecha que sirve para ir hacia la izquierda, solo aparece siempre y cuando no este en la primera pagina

                if ($page > 1) {
                    echo '
                    <section class="movIzq">
                        <a href="'.$pagina.'?page=' . 1 . '"> <img src="img/Paso.png" /><img src="img/Paso.png" /></a>
                    </section>';
                    echo '
                    <section class="movIzq">
                        <a href="'.$pagina.'?page=' . ($page - 1) . '"> <img src="img/Paso.png" /></a>
                    </section>';
                }
                // si hay más de 4 te genera 6 bolas
                // si tienes 23 bolas la muestra de 5 en 5,
                // Cuando llega a las últimas depndiendo de en la posición en la que esté intenta llegar al final
                // Osea, si estás en la 21 te muestra 22 23
                // Si está por el medio hace otra cosa pero solo lo recuerda Dios y el que lo hizo en su momento
                $limite = $page + 4;

                // Igualo el límite para que sea igual a la página que le pasemos
                if ($limite > $_SESSION["total_pages"]) {
                    
                    $limite = $_SESSION["total_pages"];

                }
                //  para imprimir las bolas
                for ($i = $page; ($i <= $limite); $i++) {
                    //Si entra aqui es que esta en esa pagina
                    if ($page == $i) {
                        echo '
                        <a class="numPag" id="posAct" href="'.$pagina.'?page='.$i.'">
                            <section>
                                    ' .$page. '
                            </section>
                        </a>';                
                    //Aqui solo entra cuando la posicion de $i no concuerda con la pagina en la que esta
                    } else {
                        echo '
                        <a class="numPag" href="'.$pagina.'?page=' . $i . '">
                            <section>
                                ' .$i. '                    
                            </section>
                        </a>';
                    }
                }

                //Estilo de las bolitas que marcan las paginas
                // for ($i = 1; $i <= $_SESSION["total_pages"]; $i++) {
                //     //Si entra aqui es que esta en esa pagina
                //     if ($page == $i) {
                //         echo '
                //         <a class="numPag" id="posAct" href="'.$pagina.'?page='.$i.'">
                //             <section>
                //                     ' .$page. '
                //             </section>
                //         </a>';                
                //     //Aqui solo entra cuando la posicion de $i no concuerda con la pagina en la que esta
                //     } else {
                //         echo '
                //         <a class="numPag" href="'.$pagina.'?page=' . $i . '">
                //             <section>
                //                 ' .$i. '                    
                //             </section>
                //         </a>';
                //     }
                // }

                //Flecha que sirve para ir hacia la derecha, solo aparece siempre y cuando no este en la ultima pagina
                
                //Es como lo de arriba pero en plan al revés
                if ($page < $_SESSION["total_pages"]) {
                    echo '
                    <section class="movDer">
                        <a href="'.$pagina.'?page=' . ($page + 1) . '"> <img src="img/Paso.png" /></a>
                    </section>';
                    echo '
                    <section class="movDer">
                        <a href="'.$pagina.'?page=' . $_SESSION["total_pages"] . '"> <img src="img/Paso.png" /><img src="img/Paso.png" /></a>
                    </section>';
                }
            }
            echo '</article>';
            
            
        }

    }
    // Recoge consulta, página actual y el límite
    function mostrarmanuales($consulta,$page,$nummanuales){

        print('<section id="cajaMan">');

        //Si la página actual no es la última
        if ($_SESSION["total_pages"] == $page) {
            
            $limite = count($consulta);

        } else {

            $limite = $page*$nummanuales;

        }

        for ($i=(($page-1)*$nummanuales); $i < $nummanuales; $i++) { 
            
            print('<article class="manpos">');
            print('<img class="manimg" src="img/ImagenPDF.png" />');
            print('<p>'.$consulta[$i]['titulo'].'</p>');
            print("</article>");

        }

        print('</section>');
    }

    function mostrarHerramientas($consulta,$page,$nummanuales) {
        $numCategoria = 0;

        for ($i=(($page-1)*$nummanuales);$i<$nummanuales;$i++) {

            if ($_SESSION["total_pages"] == $page) {
                
                $limite = count($consulta);
    
            } else {
    
                $limite = $page*$nummanuales;
    
            }
    
            for ($i=(($page-1)*$nummanuales); $i < $limite; $i++) { 
                $numCategoria ++;
                echo "
                    <a id=article$numCategoria class=enlaces href=herramientas.php?tipoHerramienta=".$consulta[$i]['nombre'].">
                    <img src='".$consulta[$i]['foto']."'>
                    <h2>".$consulta[$i]['nombre']."</h2>
                    </a>
                ";  
    
            }
        
        }
    }   

    function mostrarTabla($consulta,array $columnasmostrar,$page,$numRegistros){

        echo "<table class='tabla'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='celda tituloColumna'>Seleccionado</th>";

        foreach (array_slice($columnasmostrar,1) as $valor) {
                
            echo "<th class='celda tituloColumna'>".$valor."</th>";
            
        }

        echo "</tr>";
        echo "</thead>";

        echo "<tbody>";

        if ($_SESSION["total_pages"] == $page) {
            
            $limite = count($consulta);

        } else {

            $limite = $page*$numRegistros;

        }

        for ($i=(($page-1)*$numRegistros); $i < $limite; $i++) {
            
            echo "<tr>";

            // echo $clave;

            echo "<td class='celda contenidoTabla'><input type='checkbox' name='registrosSeleccionados[]' value='".array_slice($consulta[$i],1)[0]."' id=''></td>";
            next($consulta[$i]);

            foreach ($consulta[$i] as $key => $valor) {

                if (gettype($key) == "string") {
                    echo "<td class='celda contenidoTabla'>".$valor."</td>";
                }

            }

            echo "</tr>";

        }

        echo "</tbody>";
        echo "</table>";

    }



?>