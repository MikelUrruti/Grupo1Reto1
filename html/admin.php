<?php

    require("plantillasphp/redirecciones.php");

    session_start();

    comprobarLogin();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administracion</title>
    <link rel="stylesheet" href="css/normalizar.css">
    <link rel="stylesheet" href="css/menuAdmin.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <!--Para el tipo de letra-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include ("plantillas/menuAdmin.html"); ?>
    <section id="textoMedio">
        <article>
            <p>Bienvenido al panel de administración de Fix Point</p>
            <img src="img/herramientasAdmin.png">
        </article>
    </section>
</body>
</html>