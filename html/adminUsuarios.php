<?php

require_once("plantillasphp/redirecciones.php");

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
    <link rel="stylesheet" href="css/menuAdmin.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/adminComun.css">
    <link rel="stylesheet" href="css/adminUsuarios.css">
    <!-- <link rel="stylesheet" href="css/formularioCrearUsuario.css"> -->
    <title>Usuarios</title>
</head>

<body>

    <?php

    require("plantillasphp/operacionesDb.php");
    include("plantillas/menuAdmin.html");

    ?>

    <section class="contenido">
        <article>
            <h1 class="titulo">USUARIOS DEL SITIO WEB</h1>
        </article>
        <article>
            <form action="controladores/buscarUsuario.php" method="get" id="buscador">
                        <input type="text" name="Buscar" id="txtbus" placeholder="Buscar usuarios..." />
                        <input type="image" name="BuscarLupa" src="img/lupa.png" value="" id="lupa">
            </form>

            <form action="controladores/adminControladorUsuario.php" method="post">

                <div class="acciones">
                    <input type="submit" class="boton botonCrear" value="Crear" name="Crear">
                    <input type="submit" class="boton botonModificar" value="Modificar" name="Modificar">
                    <input type="submit" class="boton botonEliminar" value="Eliminar" name="Eliminar">


                </div>
                <div id="filtros">
                    <div>
                        <div>
                            <input type="checkbox" name="buscarTipo[]" value="usuario" id="">
                            <label for="">Usuario</label>
                        </div>
                        <div>
                            <input type="checkbox" name="buscarTipo[]" value="administrador" id="">
                            <label for="">Administrador</label>
                        </div>
                        <div>
                            <input type="checkbox" name="buscarTipo[]" value="superAdministrador" id="">
                            <label for="">Superadministrador</label>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input type="checkbox" name="buscarActivos[]" value="activo" id="">
                            <label for="">Activo</label>
                        </div>
                        <div>
                            <input type="checkbox" name="buscarActivos[]" value="inactivo" id="">
                            <label for="">Inactivo</label>
                        </div>
                    </div>
                </div>
                <table class="tabla">
                    <thead>
                        <tr>
                            <th class="celda tituloColumna">Seleccionado</th>
                            <th class="celda tituloColumna">Usuario</th>
                            <th class="celda tituloColumna">Email</th>
                            <th class="celda tituloColumna">Nombre</th>
                            <th class="celda tituloColumna">Apellidos</th>
                            <th class="celda tituloColumna">Telefono</th>
                            <th class="celda tituloColumna">Tipo de usuario</th>
                            <th class="celda tituloColumna">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (!isset($filas)) {

                            if (isset($_SESSION["filtrado"])) {

                                $resultados = $_SESSION["filtrado"];
                                unset($_SESSION["filtrado"]);

                            } else {

                                $resultados = consultarDatoBD("select * from Usuario;", array());
                            }

                            $filas = array();

                            foreach ($resultados as $resultado) {

                                array_push($filas, $resultado);
                            }
                        }

                        if (isset($filas) && count($filas) > 0) {


                            foreach ($filas as $fila) {

                        ?>

                                <tr>
                                    <td class="celda contenidoTabla"><input type="checkbox" name="usuariosSeleccionados[]" value="<?php echo $fila["usuario"]; ?>" id=""></td>
                                    <td class="celda contenidoTabla"><?php echo $fila["usuario"]; ?></td>
                                    <td class="celda contenidoTabla"><?php echo $fila["email"]; ?></td>
                                    <td class="celda contenidoTabla"><?php echo $fila["nombre"]; ?></td>
                                    <td class="celda contenidoTabla"><?php echo $fila["apellidos"]; ?></td>
                                    <td class="celda contenidoTabla"><?php echo $fila["telefono"]; ?></td>
                                    <td class="celda contenidoTabla"><?php echo $fila["tipo"]; ?></td>
                                    <td class="celda contenidoTabla"><?php echo $fila["estado"]; ?></td>
                                </tr>
                        <?php
                            }
                        }


                        ?>

                    </tbody>
                </table>

            </form>

            <!-- <div class="ventanaEmergente">
                <form action="controladores/adminControladorUsuario.php" method="post"></form>
            </div>
            <div class="ventanaEmergente">
                <form action="controladores/adminControladorUsuario.php" method="post"></form>
            </div> -->

        </article>

    </section>

</body>

</html>