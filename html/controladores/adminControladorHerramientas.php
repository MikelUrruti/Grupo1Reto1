<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();

        
    if (isset($_POST["Crear"])) {

        redireccionar("../formularioCrearHerramienta.php");
        
    } else {
        
        if (isset($_POST["registrosSeleccionados"])) {
        
            if (isset($_POST["Modificar"])) {
    
                if (count($_POST["registrosSeleccionados"]) == 1) {

                    $_SESSION["nombreHerramienta"]=$_POST["registrosSeleccionados"][0];
                    
                    redireccionar("../formularioModificarHerramienta.php");

                }
    
            } elseif (isset($_POST["Eliminar"])) {
                
                $parametrosEliminar = array();
    
                $consultaEliminar = "update Herramienta set estado = ? where nombre in (";

                array_push($parametrosEliminar,"descatalogada");

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

                redireccionar("../adminHerramientasAlmacen.php");
    
            } 
    
        } else {
            redireccionar("../adminHerramientasAlmacen.php");
        }

    }
        


?>