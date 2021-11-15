<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalizar.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/cssNav.css">
    <link rel="stylesheet" href="css/detalleHerramienta.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/paginador.css">
    <!--Favicon de las paginas-->
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <!--Para el tipo de letra-->
    <script src="JS/js.js"></script>
    <script src="JS/nav.js"></script>
    <script src="JS/detalleHerramienta.js"></script>

    <title>Alquiler - Fix Point</title>
</head>

<body class="fondo">
    <?php
        include("plantillas/indexNav.php")
    ?>
    <noscript>
           <h1>
               Su navegador no tiene activado JavaScript.
                               <br>
               Es posible que no visualice la página correctamente.
           </h1>
       </noscript>


    <section id="section1">

    <?php
        require("plantillasphp/operacionesDb.php");
        require("plantillasphp/paginadorFunciones.php");
        $consulta = "select * from Herramienta where nombre like ?";
        $parametro = array($_GET["filtro"]);
        $categorias = consultarDatoBD($consulta,$parametro);

            foreach($categorias as $herramienta) {
                echo "
                    <img src='$herramienta[foto]'>
                    <h1>$herramienta[nombre]</h1>
                    <h2 id=descripcion>$herramienta[descripcion]</h2>
                    <h2 id=stock>Stock: $herramienta[stock]</h2>
                ";

                if ($herramienta['stock']<=0) {
                    echo "
                        <a id=noDisponible href=#>no disponible</a>
                    ";
                }
                else {
                    echo "
                        <a id=disponible href=#>alquilar</a>
                    ";
                }
            }

    ?>

    
        </section>
       

    <?php 
        include ("plantillas/indexFooter.html");
    ?>

</body>

</html>