<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalizar.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/cssNav.css">
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon de las paginas-->
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <!--Para el tipo de letra-->
    <script src="JS/js.js"></script>
    <script src="JS/nav.js"></script>
    <script src="JS/index.js"></script>

    <title>Inicio - Fix Point</title>
</head>

<body id="index" class="ordenCajas">
    <?php
        include("plantillas/indexNav.php");
    ?>
    
     <noscript>
            <h1>
                Su navegador no tiene activado JavaScript.
                                <br>
                Es posible que no visualice la página correctamente
            </h1>
        </noscript>

     <!-- FIN HEADER COMIENZA CUERPO -->
    <section id="section1">
        <h1 id="txtEscribir"></h1>
        <a href="registro.php">comienza</a>
    </section>

    <section id="section2"> 
        <article>
            <h1>Descubre nuestros manuales</h1>
            <p>Los manuales capacitan 
                a los usuarios para que 
                sean capaces de reparar 
                sus propias herramientas.</p>
                <a href="Manuales_lista.php">saber más</a>
                <p></p>
        </article>
        <article>
            <h1>Descubre nuestras herramientas</h1>
            <p>Evita tener que comprar una herramiena para un solo uso, alquila una de nuetras 
                herramientas</p>
                <a href="#">saber más</a>
                <p></p>
        </article>
        <article>
            <h1>¿Tienes herramientas que no usas?</h1>
            <h2>¡Dónalas!</h2>
            <img src="img/herramientas_donar.png" alt="">
        </article>
    </section>

    <?php 
        include ("plantillas/indexFooter.html");
    ?>





</body>

</html>