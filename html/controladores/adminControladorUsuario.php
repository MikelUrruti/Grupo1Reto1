<?php

    require_once("../plantillasphp/redirecciones.php");
    require_once("../plantillasphp/operacionesDb.php");

    $accion = $_POST["accionUsuario"];

    if ($accion == "Crear") {

        redireccionar("../FormularioCrearUsuario.php");

    } elseif ($accion == "Modificar") {
        
        redireccionar("../FormularioModificarUsuario.php");

    } elseif ($accion == "Eliminar") {

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
        header("Location: ../adminUsuarios.php");
    }

?>