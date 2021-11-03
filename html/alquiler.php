<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalizar.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/cssNav.css">
    <link rel="stylesheet" href="css/alquiler.css">
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon de las paginas-->
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <!--Para el tipo de letra-->
    <script src="JS/js.js"></script>
    <script src="JS/nav.js"></script>

    <title>Alquiler - Fix Point</title>
</head>

<body>
    <?php
        include("plantillas/indexNav.php")
    ?>
    
    <h1>Escoge la sección que quieras visualizar:</h1>

    <a id="flechaIzqMovil" class="flechasMovil"> < </a>
    <a id="flechaDchMovil" class="flechasMovil"> > </a>

    <section>
        <a class="test" id="article1" href="#">
            <img src="img/martillo.png" alt="">
            <h2>Martillos</h2>
        </a>

       <a class="test" id="article2">
           <img src="img/caladora.png" alt="">
           <h2>Caladoras</h2>
       </a>
       <a class="test" id="article3">

       </a>
       <a class="test" id="article4">

       </a>
    </section>

     <noscript>
            <h1>
                Su navegador no tiene activado JavaScript.
                                <br>
                Es posible que no visualice la página correctamente
            </h1>
        </noscript>

    <?php 
        include ("plantillas/indexFooter.html");
    ?>

</body>

</html>