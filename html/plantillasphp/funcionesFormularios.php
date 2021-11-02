<?php

function cargarError($nombreSesion) {

    if (isset($_SESSION[$nombreSesion])) {
        echo "<p class='error'>".$_SESSION[$nombreSesion]."</p>";
        unset($_SESSION[$nombreSesion]);
    }

}

?>