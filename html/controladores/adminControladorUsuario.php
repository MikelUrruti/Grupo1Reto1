<?php

    require_once("../plantillasphp/redirecciones.php");
    require_once("../plantillasphp/operacionesDb.php");

    session_start();
    

    if (isset($_POST["Eliminar"])) {
        $accion = "Eliminar";
    } elseif (isset($_POST["Crear"])) {
        $accion = "Crear";
    }
    // } elseif (isset($_POST["Modificar"])) {
    //     $accion = "Modificar";
    // } 

    if ($accion == "Crear") {

        redireccionar("../formularioCrearUsuario.php");

     } /* elseif ($accion == "Modificar") {
        
    //     redireccionar("../formularioModificarUsuario.php");

    } */ elseif ($accion == "Eliminar") {

        $usuarios = $_POST["usuariosSeleccionados"];

        $consulta = "update Usuario set estado='inactivo' where usuario in (";
        $parametros = array();
        $contador = 0;

        foreach ($usuarios as $usuario) {
            
            array_push($parametros,$usuario);

            if ($contador == count($usuarios)-1) {
                
                $consulta .= "?);";

            } else {
                
                $consulta .= "?, ";

            }

            $contador++;

        }

        manipularDatoBD($consulta,$parametros);

        redireccionar("../adminUsuarios.php");

    } else {
        
        redireccionar("../adminUsuarios.php");

    }

?>