<?php

require("plantillasphp/redirecciones.php");
// require("controladores/paginador.php");
require("plantillasphp/paginadorFunciones.php");
require("plantillasphp/funcionesFormularios.php");

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
    <link rel="stylesheet" href="css/paginador.css">
    <link rel="stylesheet" href="css/adminUsuarios.css">
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <script src="JS/filtrar.js"></script>
    <!-- <link rel="stylesheet" href="css/formularioCrearUsuario.css"> -->
    <title>Manuales</title>
</head>

<body>

    <?php

    require("plantillasphp/operacionesDb.php");
    include("plantillas/menuAdmin.html");

    ?>

    <section class="contenido">
        <article>
            <h1 class="titulo">MANUALES DISPONIBLES EN EL SITIO WEB</h1>
        </article>
        <article>

        
            <form action="controladores/buscarSubidoManual.php" method="get" id="buscador">
                <input type="text" name="Buscar" id="txtbus" placeholder="Buscar Manuales..." />
                <input type="image" name="BuscarLupa" src="img/lupa.png" value="" id="lupa">
            </form>

            <form action="controladores/adminControladorSubidosManuales.php" method="post" id="acciones">

                <div class="acciones">
                    <input type="submit" class="boton" value="Modificar" name="Modificar">
                    <input type="submit" class="boton" value="Eliminar" name="Eliminar">
                </div>
                <?php 
                if(isset($_SESSION["exito"])){
                    cargarExito("exito", "");
                }  ?>
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
                                // unset($_SESSION["filtrado"]);

                            } else {

                                $resultados = consultarDatoBD("select * from Manual where usuarioaprueba is not null;", array());

                                $_SESSION["filas"] = array();

                                foreach ($resultados as $resultado) {
    
                                    array_push($_SESSION["filas"], $resultado);
    
                                }
                            
                            }

                            // generarPaginador($resultados,"mostrarTabla",array("resultadoConsulta",array("titulo","Titulo","Descripcion","Fichero","Publicador","Aprobado por"),"page","nummanuales"),basename($_SERVER['PHP_SELF']), 1); 
                            
                            generarPaginador($resultados,"mostrarTablaConFicherosImagenes",array("resultadoConsulta",array("titulo","Titulo","Descripcion","Fichero","Portada","Publicador","Aprobado por"),"page",array("fichero"),array("portada"),array("img/manuales/"),array("img/manuales/portadas/"),"nummanuales"),basename($_SERVER['PHP_SELF']), 1); 
                            
                            ?>

                            

            </form>


        </article>

    </section>

</body>

</html>