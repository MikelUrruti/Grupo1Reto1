<?php

    require("plantillasphp/redirecciones.php");

    session_start();

    comprobarLoginAdmin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalizar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menuAdmin.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/adminComun.css">
    <link rel="stylesheet" href="css/adminSecciones.css">
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <script src="JS/filtrar.js"></script>
    <!-- <link rel="stylesheet" href="css/formularioCrearUsuario.css"> -->
    <title>Gestionar Herramientas</title>
</head>
<body>
    
    <?php

    include("plantillas/menuAdmin.html");

    ?>

    <section class="contenido">

        <a href="adminHerramientasAlmacen.php" class="seccion">
           <img src="img/solicitud.png" alt="">
           <h2>Herramientas</h2>
        </a>
        <a href="adminSubidosManuales.php" class="seccion">
           <img src="img/manual.png" alt="">
           <h2>Donaciones</h2>
        </a>    
        <a href="adminCategorias.php" class="seccion">
           <img src="img/solicitud.png" alt="">
           <h2>Categorias</h2>
        </a>

    </section>

</body>
</html>