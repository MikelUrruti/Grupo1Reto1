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
    <script src="JS/alquiler.js"></script>

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
    
    <h1>Escoge la sección que quieras visualizar:</h1>

    <a id="flechaIzqMovil" class="flechasMovil"> < </a>
    <a id="flechaDchMovil" class="flechasMovil"> > </a>

    <section id="section1">
       <?php 
            require("plantillasphp/operacionesDb.php");
            require("plantillasphp/paginadorFunciones.php");
            $consulta = "select nombre,foto from Herramienta";
            $categorias = consultarDatoBD($consulta);
            $numRegistros = 4;

            generarPaginador($categorias, "mostrarHerramientas",array("resultadoConsulta","page","nummanuales"),"herramientas.php",$numRegistros);


//        $tipoHerramienta = $_GET["tipoHerramienta"];

//        $consulta = "select nombre,foto from Herramienta where categoria like ?;";
//        $parametro = array($tipoHerramienta);
//     //    $datosHerramienta = consultarDatoBD($consulta,$parametro);
// $datosHerramienta = consultarDatoBD("select nombre,foto from Herramienta");

//     $numArticulo = 0;
//        foreach($datosHerramienta as $herramienta) {
//                 $numArticulo++;   
//                 echo "
                   
//                    <a id=article$numArticulo>
//                     <img src='$herramienta[foto]'>
//                     <h2>$herramienta[nombre]</h2>
//                    </a>
//                    ";

//             }
       
       ?>
    </section>


    <?php 
        include ("plantillas/indexFooter.html");
    ?>

</body>

</html>