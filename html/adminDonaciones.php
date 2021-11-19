<?php

require("plantillasphp/redirecciones.php");
// require("controladores/paginador.php");
require("plantillasphp/paginadorFunciones.php");
require("plantillasphp/funcionesFormularios.php");

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
    <title>Donaciones</title>
</head>

<body>

    <?php

    require("plantillasphp/operacionesDb.php");
    include("plantillas/menuAdmin.html");

    ?>

    <section class="contenido">
        <article>
            <h1 class="titulo">DONACIONES DE HERRAMIENTAS</h1>
        </article>
        <article>


            <form action="controladores/buscarDonacion.php" method="get" id="buscador">
                <input type="text" name="Buscar" id="txtbus" placeholder="Buscar Donaciones..." />
                <input type="image" name="BuscarLupa" src="img/lupa.png" value="" id="lupa">
            </form>

            <form action="controladores/filtrosDonaciones.php" id="filtros" method="get">
                <div>
                    <h2 class="tituloFiltro">Estado de alquiler:</h2>
                    <div>
                        <input type="checkbox" class="checkbox" name="buscarEstado[]" value="pendiente" id="" <?php if (isset($_SESSION["checkActivos"]) && in_array("pendiente", $_SESSION["checkActivos"])) {
                                                                                                                    echo "checked";
                                                                                                                } ?>>
                        <label for="">Recogida pendiente</label>
                    </div>
                    <div>
                        <input type="checkbox" class="checkbox" name="buscarEstado[]" value="recogido" id="" <?php if (isset($_SESSION["checkActivos"]) && in_array("recogido", $_SESSION["checkActivos"])) {
                                                                                                                    echo "checked";
                                                                                                                } ?>>
                        <label for="">Recogido</label>
                    </div>
                </div>
                <div>
                    <div>
                        <h2 class="tituloFiltro">Periodo de fechas:</h2>
                        <select name="ordenarPor" id="">
                            <option value="fechainicio">Fecha inicio</option>
                            <option value="fecharecogida">Fecha recogida</option>
                        </select>
                        <div>
                            <label for="">Inicio:</label>
                            <input type="date" name="fechaInicio" value="<?php echo date('Y-m-d'); ?>" id="">
                            <label for="">Fin:</label>
                            <input type="date" name="fechaFin" value="<?php echo date('Y-m-d'); ?>" id="">
                            <input type="submit" class="boton" value="Buscar" name="BuscarFecha">

                        </div>
                    </div>
                </div>

            </form>

            <form action="controladores/adminControladorDonaciones.php" method="post" id="acciones">

                <div class="acciones">
                    <input type="submit" class="boton botonCrear" value="Recoger" name="Recoger">
                    <input type="submit" class="boton botonCrear" value="Rechazar" name="Rechazar">
                </div>
                <?php

                if (isset($_SESSION["errorAccion"])) {

                    echo cargarError("errorAccion", "");
                    unset($_SESSION["errorAccion"]);
                }

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

                    $resultados = consultarDatoBD("select id, usuario, nomherramienta, cantidad, fechainicio, fecharecogida, descripcion from Donaciones;", array());

                    $_SESSION["filas"] = array();

                    foreach ($resultados as $resultado) {

                        array_push($_SESSION["filas"], $resultado);
                    }
                }

                // echo $_SESSION["mantenerFiltrado"]==false;

                generarPaginador($resultados, "mostrarTabla", array("resultadoConsulta", array("id", "Identificador", "Donante", "Herramienta donada", "Cantidad donada", "Fecha de inicio de donacion", "Fecha de recogida de donacion", "Descripcion"), "page", "nummanuales"), basename($_SERVER['PHP_SELF']), 10);

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