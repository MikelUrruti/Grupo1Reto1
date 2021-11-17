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
    <link rel="stylesheet" href="css/paginador.css">
    <!--Favicon de las paginas-->
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <!--Para el tipo de letra-->
    <script src="JS/js.js"></script>
    <script src="JS/nav.js"></script>
    <!-- <script src="JS/alquiler.js"></script> -->

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
    
    <h1>Escoge la herramienta que quieras visualizar:</h1>
   
   
    <form id="form" action="herramientas.php" method="get">
        <!-- Caja del buscador, con el campo de texto y la imagen de la lupa-->
        <article id="buscador">
            <input id="txtbus" type="text" placeholder="Buscar herramientas..." name="buscar" >
            <input type="image" src="img/lupa.png" value="" id="lupa">
        </article>
    </form>
        
    <section id="section1">
       <?php 
            require("plantillasphp/operacionesDb.php");
            require("plantillasphp/paginadorFunciones.php");
            
            if (isset($_GET["filtro"])) {
                $filtro = $_GET["filtro"];
                $consulta = "select nombre,foto from Herramienta where categoria like ? and estado like ?;";
            }
            
            else if (isset($_GET["buscar"])) {
                $filtro = $_GET["buscar"];
                $consulta = "select nombre,foto from Herramienta where nombre like ? and estado like ?;";
            }

            $parametro = array("%".$filtro."%","catalogada");
            $categorias = consultarDatoBD($consulta,$parametro);
            $numRegistros = 4;

            generarPaginador($categorias, "mostrarHerramientasDetalle",array("resultadoConsulta","page","nummanuales"),"herramientas.php",$numRegistros,$filtro);

       
       ?>
    </section>


    <?php 
        include ("plantillas/indexFooter.html");
    ?>

</body>

</html>