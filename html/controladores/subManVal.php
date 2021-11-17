<?php 

require("../plantillasphp/validaciones.php");
require("../plantillasphp/operacionesDb.php");
require("../plantillasphp/redirecciones.php");

session_start();

if (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["telefono"]) && isset($_FILES["manual"])) {
    $correcto = true;
}

?>