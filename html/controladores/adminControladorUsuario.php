<?php

    require("../plantillasphp/redirecciones.php");
    require("../plantillasphp/operacionesDb.php");

    session_start();
    

    if (isset($_POST["Eliminar"])) {
        $accion = "Eliminar";
    } elseif (isset($_POST["Crear"])) {
        $accion = "Crear";
    } elseif (isset($_POST["Activar"])) {
        $accion = "Activar";
    } 

    if ($accion == "Crear") {

        redireccionar("../FormularioCrearUsuario.php");

    } elseif ($accion == "Eliminar") {

        $usuarios = $_POST["registrosSeleccionados"];

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

    } elseif ($accion == "Activar") {
        
        $usuarios = $_POST["registrosSeleccionados"];

        $consulta = "update Usuario set estado='activo' where usuario in (";
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

    }

    

?>