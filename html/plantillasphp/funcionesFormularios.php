<?php

function cargarError($nombreSesion,$estilos) {

    if (isset($_SESSION[$nombreSesion])) {

        if ($estilos != "") {
            echo "<p class='error' style='$estilos'>".$_SESSION[$nombreSesion]."</p>";
        } else {
            echo "<p class='error'>".$_SESSION[$nombreSesion]."</p>";
        }

        unset($_SESSION[$nombreSesion]);

    }

}

function cargarExito($nombreSesion,$estilos) {

    if (isset($_SESSION[$nombreSesion])) {
        if ($estilos != "") {
            echo "<p class='exito' style='$estilos'>".$_SESSION[$nombreSesion]."</p>";
        } else {
            echo "<p class='exito'>".$_SESSION[$nombreSesion]."</p>";
        }
        unset($_SESSION[$nombreSesion]);
    }

}

?>