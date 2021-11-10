<?php

require("plantillasphp/redirecciones.php");
// require("controladores/paginador.php");
require("plantillasphp/paginadorFunciones.php");

session_start();

comprobarLogin();

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
    <title>Solicitudes Manuales</title>
</head>

<body>

    <?php

    require("plantillasphp/operacionesDb.php");
    include("plantillas/menuAdmin.html");

    ?>

    <section class="contenido">
        <article>
            <h1 class="titulo">SOLICITUDES PARA SUBIR MANUALES</h1>
        </article>
        <article>

        
            <form action="controladores/buscarSolicitudManual.php" method="get" id="buscador">
                <input type="text" name="Buscar" id="txtbus" placeholder="Buscar Solicitudes..." />
                <input type="image" name="BuscarLupa" src="img/lupa.png" value="" id="lupa">
            </form>

            <form action="controladores/adminControladorSolicitudesManuales.php" method="post" id="acciones">

                <div class="acciones">
                    <input type="submit" class="boton botonCrear" value="Aprobar" name="Aprobar">
                    <input type="submit" class="boton botonEliminar" value="Rechazar" name="Rechazar">
                </div>
                        <?php

                            if (isset($_SESSION["filtrado"])) {

                                $resultados = $_SESSION["filtrado"];

                                // if (!$_SESSION["mantenerFiltrado"]) {

                                //     unset($_SESSION["filtrado"]);
    
                                // }

                            } else {

                                $resultados = consultarDatoBD("select titulo, descripcion, fichero, usuariosube from Manual where usuarioaprueba is null;", array());

                                $_SESSION["filas"] = array();

                                foreach ($resultados as $resultado) {
    
                                    array_push($_SESSION["filas"], $resultado);
    
                                }
                            
                            }

                            // echo $_SESSION["mantenerFiltrado"]==false;

                            

                            generarPaginador($resultados,"mostrarTabla",array("resultadoConsulta",array("titulo","Titulo","Descripcion","Fichero","Usuario Solicitante"),"page","nummanuales"),"adminSolicitudesManuales.php", 1); 

                            if (!$_SESSION["mantenerFiltrado"]) {

                                unset($_SESSION["filtrado"]);

                            }

                            $_SESSION["mantenerFiltrado"] = false;

                            ?>


            </form>


        </article>

    </section>

</body>

</html>