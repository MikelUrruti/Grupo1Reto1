<?php

    require_once("../plantillasphp/redirecciones.php");
    require_once("../plantillasphp/operacionesDb.php");

    session_start();

    echo var_dump($_POST);

    if (isset($_POST["Eliminar"])) {
        $accion = "Eliminar";
    } elseif (isset($_POST["Buscar"])) {
        // echo $_POST["Buscar"]." resultado";
        $accion = "Buscar";
    } elseif (isset($_POST["Crear"])) {
        $accion = "Crear";
    } elseif (isset($_POST["Modificar"])) {
        $accion = "Modificar";
    } 

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

    } elseif ($accion == "Buscar") {

        $parametros = array();

        for ($i=0; $i < 5; $i++) { 
            
            array_push($parametros,"%".$_POST["Buscar"]."%");

        }

        $_SESSION["filtrado"] = consultarDatoBD("select * from Usuario where usuario like ? or email like ? or nombre like ? or apellidos like ? or telefono like ?;",$parametros);

        // echo var_dump($_SESSION["filtrado"]);

        redireccionar("../adminUsuarios.php");

    } else {
        
        redireccionar("../adminUsuarios.php");

    }

?>