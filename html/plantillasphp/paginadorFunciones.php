<?php 

    function generarPaginador(array $resultadoConsulta, string $nombreFuncion, array $parametrosFuncion, string $pagina) {

        $totalconsulta = count($resultadoConsulta);

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

            eval($nombreFuncion);
            
            // mostrarmanuales($resultadoConsulta,$page,$nummanuales);

            //Inicio de la creacion de las bolitas
            echo '<article id="cantPag">';

            //Comprobacion de los elementos que hay en la bd para crear las bolitas necesarias
            if ($_SESSION["total_pages"] > 1) {
                //Flecha que sirve para ir hacia la izquierda, solo aparece siempre y cuando no este en la primera pagina
                if ($page != 1) {
                    echo '
                    <section id="movIzq">
                        <a href="'.$pagina.'?page=' . ($page - 1) . '"> <img src="img/Paso.png" /></a>
                    </section>';
                }

                //Estilo de las bolitas que marcan las paginas
                for ($i = 1; $i <= $_SESSION["total_pages"]; $i++) {
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

                //Flecha que sirve para ir hacia la derecha, solo aparece siempre y cuando no este en la ultima pagina
                if ($page != $_SESSION["total_pages"]) {
                    echo '
                    <section id="movDer">
                        <a href="'.$pagina.'?page=' . ($page + 1) . '"> <img src="img/Paso.png" /></a>
                    </section>';
                }
            }
            echo '</article>';
        }

    }

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

        print('</section>');

    }

    function mostrarTabla($consulta,array $columnasmostrar,$page,$numRegistros){

        echo "<table class='tabla'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='celda tituloColumna'>Seleccionado</th>";

        foreach ($columnasmostrar as $valor) {
                
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

            echo "<td class='celda contenidoTabla'><input type='checkbox' name='usuariosSeleccionados[]' value='<?php echo ".$consulta[$i]['usuario']."; ?>' id=''></td>";

            foreach ($consulta[$i] as $key => $valor) {

                if (gettype($key) == "string") {
                    echo "<td class='celda contenidoTabla'>".$valor."</td>";
                }

            }

            
            // echo "<td class='celda contenidoTabla'>".$consulta[$i]["usuario"]."</td>";
            // echo "<td class='celda contenidoTabla'>".$consulta[$i]["email"]."</td>";
            // echo "<td class='celda contenidoTabla'>".$consulta[$i]["nombre"]."</td>";
            // echo "<td class='celda contenidoTabla'>".$consulta[$i]["apellidos"]."</td>";
            // echo "<td class='celda contenidoTabla'>".$consulta[$i]["telefono"]."</td>";
            // echo "<td class='celda contenidoTabla'>".$consulta[$i]["tipo"]."</td>";
            // echo "<td class='celda contenidoTabla'>".$consulta[$i]["estado"]."</td>";
            echo "</tr>";

        }

        echo "</tbody>";
        echo "</table>";

    }



?>