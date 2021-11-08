<?php

require("plantillasphp/redirecciones.php");
// require("controladores/paginador.php");
require("plantillasphp/paginadorFunciones.php");

session_start();

comprobarLogin();

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
            <h1 class="titulo">SOLICITUDES PARA SUBIR MANUALES</h1>
        </article>
        <article>

        
            <form action="controladores/buscarUsuario.php" method="get" id="buscador">
                <input type="text" name="Buscar" id="txtbus" placeholder="Buscar Solicitudes..." />
                <input type="image" name="BuscarLupa" src="img/lupa.png" value="" id="lupa">
            </form>
            <div id="buscadorFiltros">

                <form action="controladores/filtrosUsuario.php" id="filtros" method="get">
                    <div>
                        <h2 class="tituloFiltro">Estado de la solicitud:</h2>
                        <div>
                            <input type="checkbox" class="checkbox" name="buscarActivos[]" value="activo" id="" <?php if (isset($_SESSION["checkActivos"]) && in_array("activo",$_SESSION["checkActivos"])) {
                                echo "checked";
                            } ?>>
                            <label for="">Pendiente</label>
                        </div>
                        <div>
                            <input type="checkbox" class="checkbox" name="buscarActivos[]" value="inactivo" id="" <?php if (isset($_SESSION["checkActivos"]) && in_array("inactivo",$_SESSION["checkActivos"])) {
                                echo "checked";
                            } ?>>
                            <label for="">Aceptada</label>
                        </div>
                        <div>
                            <input type="checkbox" class="checkbox" name="buscarActivos[]" value="activo" id="" <?php if (isset($_SESSION["checkActivos"]) && in_array("activo",$_SESSION["checkActivos"])) {
                                echo "checked";
                            } ?>>
                            <label for="">Rechazada</label>
                        </div>
                        <div>
                            <input type="checkbox" class="checkbox" name="buscarActivos[]" value="inactivo" id="" <?php if (isset($_SESSION["checkActivos"]) && in_array("inactivo",$_SESSION["checkActivos"])) {
                                echo "checked";
                            } ?>>
                            <label for="">Expirada</label>
                        </div>
                    </div>

                </form>

            </div>


            <form action="controladores/adminControladorUsuario.php" method="post" id="acciones">

                <div class="acciones">
                    <input type="submit" class="boton botonCrear" value="Crear" name="Crear">
                    <!-- <input type="submit" class="boton botonModificar" value="Modificar" name="Modificar"> -->
                    <input type="submit" class="boton botonEliminar" value="Desactivar Usuario" name="Eliminar">


                </div>
                        <?php

                            if (isset($_SESSION["filtrado"])) {

                                $resultados = $_SESSION["filtrado"];
                                unset($_SESSION["filtrado"]);

                            } else {

                                $resultados = consultarDatoBD("select * from Manual;", array());

                                $_SESSION["filas"] = array();

                                foreach ($resultados as $resultado) {
    
                                    array_push($_SESSION["filas"], $resultado);
    
                                }
                            
                            }

                            generarPaginador($resultados,"mostrarTabla",array("resultadoConsulta",array("id","Identificador","Fecha de solicitud","Estado de la solicitud","Usuario Solicitante","Herramienta Solicitada"),"page","nummanuales"),"adminSolicitudesManuales.php", 6); ?>


            </form>


        </article>

    </section>

</body>

</html>