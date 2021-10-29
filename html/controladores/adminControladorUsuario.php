<?php

    $accion = $_POST["accionUsuario"];

    if ($accion == "Crear") {
        # code...
    } elseif ($accion == "Modificar") {
        # code...
    } elseif ($accion == "Eliminar") {
        # code...
    } else {
        header("Location: ../adminUsuarios.php");
    }

?>