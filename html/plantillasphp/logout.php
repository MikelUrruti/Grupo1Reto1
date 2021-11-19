<?php
    //Para cerrar sesion
    session_start();
    session_destroy();
    header("Location: ../");
?>