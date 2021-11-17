<?php

require("plantillasphp/redirecciones.php");
// require("controladores/paginador.php");
require("plantillasphp/paginadorFunciones.php");
require("plantillasphp/funcionesFormularios.php");
// require("plantillasphp/operacionesDb.php");

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
    <title>Herramientas</title>
</head>

<body>

    <?php

    require("plantillasphp/operacionesDb.php");
    include("plantillas/menuAdmin.html");

    ?>

    <section class="contenido">
        <article>
            <h1 class="titulo">HERRAMIENTAS DEL ALMACEN</h1>
        </article>
        <article>

        
            <form action="controladores/buscarHerramienta.php" method="get" id="buscador">
                <input type="text" name="Buscar" id="txtbus" placeholder="Buscar Herramientas..." />
                <input type="image" name="BuscarLupa" src="img/lupa.png" value="" id="lupa">
            </form>

            <div id="buscadorFiltros">

                <form action="controladores/filtrosHerramienta.php" id="filtros" method="get">
                    <div>
                        <h2 class="tituloFiltro">Categoria de la herramienta:</h2>

                            <?php 

                            // echo var_dump($_SESSION["filtrado"]);

                                $categorias = consultarDatoBD("select nombre from Categoria;",array());

                                foreach($categorias as $categoria) {
                            ?>

                                <div>    
                                    <input type="checkbox" class="checkbox" name="buscarCategoria[]" value="<?php echo $categoria["nombre"]; ?>" id="" <?php if (isset($_SESSION["checkActivos"]) && in_array($categoria["nombre"],$_SESSION["checkActivos"])) {
                                        echo "checked";
                                    } ?>>
                                    <label for=""><?php echo $categoria["nombre"]; ?></label>
                                </div>

                            <?php } ?>

                        
                    </div>
                    <div>
                        <h2 class="tituloFiltro">Estado de la herramienta:</h2>
                        
                        <div>   

                                <input type="checkbox" class="checkbox" name="buscarEstado[]" value="catalogada" id="" <?php if (isset($_SESSION["checkActivos"]) && in_array("catalogada",$_SESSION["checkActivos"])) {
                                    echo "checked";
                                } ?>>
                                <label for="">catalogada</label>

                        </div>
                        <div>

                                <input type="checkbox" class="checkbox" name="buscarEstado[]" value="descatalogada" id="" <?php if (isset($_SESSION["checkActivos"]) && in_array("descatalogada",$_SESSION["checkActivos"])) {
                                    echo "checked";
                                } ?>>
                                <label for="">descatalogada</label>

                        </div>

                    </div>

                </form>

            </div>

            <form action="controladores/adminControladorHerramientas.php" method="post" id="acciones">

                <div class="acciones">
                    <input type="submit" class="boton" value="Crear" name="Crear">
                    <input type="submit" class="boton" value="Modificar" name="Modificar">
                    <input type="submit" class="boton" value="Eliminar" name="Eliminar">
                </div>
                        <?php

                            if (isset($_SESSION["errorAccion"])) {
                                
                                cargarError("errorAccion","");
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

                                $resultados = consultarDatoBD("select nombre, categoria, stock, foto, estado, descripcion from Herramienta;", array());

                                $_SESSION["filas"] = array();

                                foreach ($resultados as $resultado) {
    
                                    array_push($_SESSION["filas"], $resultado);
    
                                }
                            
                            }

                            // echo $_SESSION["mantenerFiltrado"]==false;

                            generarPaginador($resultados,"mostrarTablaConFicherosImagenes",array("resultadoConsulta",array("nombre","Nombre","Categoria","Stock","Foto","Estado","Descripcion"),"page",array(),array("foto"),array(),array("img/herramientas/"),"nummanuales"),basename($_SERVER['PHP_SELF']), 10); 

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