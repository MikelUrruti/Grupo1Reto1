<?php

require("plantillasphp/redirecciones.php");
require("plantillasphp/funcionesFormularios.php");
// require("controladores/paginador.php");
require("plantillasphp/paginadorFunciones.php");

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
    <title>Alquileres</title>
</head>

<body>

    <?php

    require("plantillasphp/operacionesDb.php");
    include("plantillas/menuAdmin.html");

    

    ?>

    <section class="contenido">

        <article>
            <h1 class="titulo">ALQUILERES</h1>
        </article>
        <article>

            <form action="controladores/buscarAlquiler.php" method="get" id="buscador">
                <input type="text" name="Buscar" id="txtbus" placeholder="Buscar alquileres..." />
                <input type="image" name="BuscarLupa" src="img/lupa.png" value="" id="lupa">
            </form>
            <div id="buscadorFiltros">

                <form action="controladores/filtrosAlquileres.php" id="filtros" method="get">
                    <div>
                        <h2 class="tituloFiltro">Estado de alquiler:</h2>
                        <div>
                            <input type="checkbox" class="checkbox" name="buscarEstado[]" value="pendiente" id="" <?php if (isset($_SESSION["checkActivos"]) && in_array("pendiente",$_SESSION["checkActivos"])) {
                                echo "checked";
                            } ?>>
                            <label for="">Recogida pendiente</label>
                        </div>
                        <div>
                            <input type="checkbox" class="checkbox" name="buscarEstado[]" value="recogido" id="" <?php if (isset($_SESSION["checkActivos"]) && in_array("recogido",$_SESSION["checkActivos"])) {
                                echo "checked";
                            } ?>>
                            <label for="">Recogido</label>
                        </div>
                        <div>
                            <input type="checkbox" class="checkbox" name="buscarEstado[]" value="finalizado" id="" <?php if (isset($_SESSION["checkActivos"]) && in_array("finalizado",$_SESSION["checkActivos"])) {
                                echo "checked";
                            } ?>>
                            <label for="">Finalizado</label>
                        </div>
                    </div>
                    <div>
                        <h2 class="tituloFiltro">Periodo de fechas:</h2>
                        <select name="ordenarPor" id="">
                            <option value="fechainicio">Fecha inicio</option>
                            <option value="fecharecogida">Fecha recogida</option>
                            <option value="fechafin">Fecha fin</option>
                        </select>
                            <div>
                                <label for="">Inicio:</label>
                                <input type="date" name="fechaInicio" value="<?php echo date('Y-m-d');?>" id="">
                                <label for="">Fin:</label>
                                <input type="date" name="fechaFin" value="<?php echo date('Y-m-d');?>" id="">
                                <input type="submit" class="boton" value="Buscar" name="BuscarFecha">
                                
                            </div>
                    </div>

                </form>


            </div>
            <div id="">


            </div>


            <form action="controladores/adminControladorAlquileres.php" method="post" id="acciones">

                <div class="acciones">
                    <input type="submit" class="boton" value="Rechazar" name="Rechazar">
                    <input type="submit" class="boton" value="Recoger" name="Recoger">
                    <input type="submit" class="boton" value="Finalizar Alquiler" name="Finalizar">
                </div>
                        <?php

                        if (isset($_SESSION["errorAccion"])) {

                            echo cargarError("errorAccion","");
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
                                // unset($_SESSION["filtrado"]);

                            } else {

                                $resultados = consultarDatoBD("select id, idsolicitud, fechainicio, fecharecogida, fechafin from Alquiler;", array());

                                $_SESSION["filas"] = array();

                                foreach ($resultados as $resultado) {
    
                                    array_push($_SESSION["filas"], $resultado);
    
                                }
                            
                            }

                            generarPaginador($resultados,"mostrarTabla",array("resultadoConsulta",array("id","Identificador","Identificador Solicitud","Fecha inicio","Fecha recogida","Fecha Fin"),"page","nummanuales"),basename($_SERVER['PHP_SELF']), 6);

                            ?>


            </form>


        </article>

    </section>

</body>

</html>