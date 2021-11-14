<?php

require("plantillasphp/redirecciones.php");
// require("controladores/paginador.php");
require("plantillasphp/paginadorFunciones.php");

session_start();

comprobarLoginAdmin();

if (!isset($_SESSION["mantenerFiltrado"])) {

    $_SESSION["mantenerFiltrado"] = false;

}

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
    <link rel="stylesheet" href="css/paginador.css">
    <link rel="stylesheet" href="css/adminUsuarios.css">
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <script src="JS/filtrar.js"></script>
    <!-- <link rel="stylesheet" href="css/formularioCrearUsuario.css"> -->
    <title>Categorias</title>
</head>

<body>

    <?php

    require("plantillasphp/operacionesDb.php");
    include("plantillas/menuAdmin.html");

    ?>

    <section class="contenido">
        <article>
            <h1 class="titulo">CATEGORIAS DE HERRAMIENTAS</h1>
        </article>
        <article>

        
            <form action="controladores/buscarCategoria.php" method="get" id="buscador">
                <input type="text" name="Buscar" id="txtbus" placeholder="Buscar Categorias..." />
                <input type="image" name="BuscarLupa" src="img/lupa.png" value="" id="lupa">
            </form>

            <form action="controladores/adminControladorCategorias.php" method="post" id="acciones">

                <div class="acciones">
                    <input type="submit" class="boton botonCrear" value="Crear" name="Crear">
                    <input type="submit" class="boton botonCrear" value="Modificar" name="Modificar">
                    <input type="submit" class="boton botonEliminar" value="Eliminar" name="Eliminar">
                </div>
                        <?php

                            if (!isset($_GET["page"])) {

                                if (!isset($_SESSION["filtradoPrimeraVez"])) {

                                    // echo "hola";
                                    $_SESSION["mantenerFiltrado"] = false;

                                    unset($_SESSION["filtrado"]);

                                } else {
                                    
                                    // echo "que cojones";
                                    $_SESSION["mantenerFiltrado"] = true;
                                    unset($_SESSION["filtradoPrimeraVez"]);

                                }

                            }

                            if (isset($_SESSION["filtrado"])) {

                                $resultados = $_SESSION["filtrado"];

                                // if (!$_SESSION["mantenerFiltrado"]) {

                                //     unset($_SESSION["filtrado"]);
    
                                // }

                            } else {

                                $resultados = consultarDatoBD("select * from Categoria;", array());

                                $_SESSION["filas"] = array();

                                foreach ($resultados as $resultado) {
    
                                    array_push($_SESSION["filas"], $resultado);
    
                                }
                            
                            }

                            // echo $_SESSION["mantenerFiltrado"]==false;

                            generarPaginador($resultados,"mostrarTablaConFicherosImagenes",array("resultadoConsulta",array("nombre","Nombre","Descripcion","Foto"),"page",array(),array("foto"),array(),array("../categoria/"),"nummanuales"),basename($_SERVER['PHP_SELF']), 1); 

                            // if (!$_SESSION["mantenerFiltrado"]) {

                            //     unset($_SESSION["filtrado"]);

                            // }

                            // $_SESSION["mantenerFiltrado"] = false;

                            // $_SESSION["mantenerFiltrado"] = false;

                            ?>


            </form>


        </article>

    </section>

</body>

</html>