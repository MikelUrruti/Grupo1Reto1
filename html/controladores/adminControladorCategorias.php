<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();

        
    if (isset($_POST["Crear"])) {

        redireccionar("../formularioCrearCategoria.php");
        
    } else {
        
        if (count($_POST["registrosSeleccionados"]) > 0) {
        
            if (isset($_POST["Modificar"])) {
    
                if (count($_POST["registrosSeleccionados"]) == 1) {

                    $_SESSION["nombreCategoria"]=$_POST["registrosSeleccionados"][0];
                    
                    redireccionar("../formularioModificarCategoria.php");

                }
    
            } elseif (isset($_POST["Eliminar"])) {
                
                $parametrosEliminar = array();
    
                $consultaEliminar = "delete from Categoria where nombre in (";
    
                $contador = 0;

                $parametrosEliminarFotos = array();

                $eliminarFotos = "select foto from Categoria where nombre in (";
                
                foreach ($_POST["registrosSeleccionados"] as $registroSeleccionado) {

                    array_push($parametrosEliminarFotos,$registroSeleccionado);

                    if (count($_POST["registrosSeleccionados"])-1 == $contador) {
                                
                        $eliminarFotos .= "?);";
    
                    } else {
    
                        $eliminarFotos .= "?, ";
    
                    }
    
                    $contador++;

                }

                $eliminarFotos = consultarDatoBD($eliminarFotos,$parametrosEliminarFotos);

                foreach ($eliminarFotos as $eliminaFoto) {
                    
                    unlink("../img/categoria/".$eliminaFoto["foto"]);

                }

                $contador = 0;
    
                foreach ($_POST["registrosSeleccionados"] as $registroSeleccionado) {
                    
                    array_push($parametrosEliminar,$registroSeleccionado);

                    if (count($_POST["registrosSeleccionados"])-1 == $contador) {
                                
                        $consultaEliminar .= "?);";
    
                    } else {
    
                        $consultaEliminar .= "?, ";
    
                    }
    
                    $contador++;
    
                }
    
                $resultados = manipularDatoBD($consultaEliminar,$parametrosEliminar);
    
                if ($resultados === 1451) {
                
                    $_SESSION["errorAccion"] = "No se pueden eliminar las categorias que tengan herramientas asociadas a las mismas";
    
                }

                redireccionar("../adminCategorias.php");
    
            } 
    
        } else {
            redireccionar("../adminCategorias.php");
        }

    }
        


?>