<?php

require("plantillasphp/redirecciones.php");
require("plantillasphp/funcionesFormularios.php");

session_start();

comprobarLogin();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Estilos-->
    <link rel="stylesheet" href="css/normalizar.css">
    <link rel="stylesheet" href="css/menuAdmin.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/adminComun.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formularioCrearUsuario.css">
    <title>Crear Usuario - Fix Point</title>
</head>

<body>

    <?php
    include("plantillas/menuAdmin.html");
    ?>

    <section class="contenido">

        <form action="controladores/modificarUsuario.php" method="post">
            <h2 id="titulo_NewUsu">
                Modificar Usuario
            </h2>
            <?php cargarExito("exito", ""); ?>
            <?php cargarError("errorGeneral", "text-align:center"); ?>
            <div id="ui">
                <!--Estan en un grupo para que se vean mejor en el ordenador-->
                <div class="grupodatos_NewUsu">
                    <div class="usudat_NewUsu">
                        <p>
                            Nombre: <span class="obligatorio">*</span>
                        </p>
                        <input id="nombre" name="nombre" class="textoForm" type="text" placeholder="Mikel" />
                        <?php cargarError("errorNombre", ""); ?>
                    </div>

                    <div class="usudat_NewUsu">
                        <p>
                            Apellidos: <span class="obligatorio">*</span>
                        </p>
                        <input id="apellidos" name="apellidos" class="textoForm" type="text" placeholder="Urrutikoetxea" />
                        <?php cargarError("errorApellidos", ""); ?>
                    </div>
                </div>

                <!--Estan en un grupo para que se vean mejor en el ordenador-->
                <div class="usudat_NewUsu">
                    <p>
                        Email: <span class="obligatorio">*</span>
                    </p>
                    <input id="email" name="email" class="textoForm" type="email" placeholder="nombre@gmail.com" />
                    <?php cargarError("errorEmail", ""); ?>
                </div>

                <!--Estan en un grupo para que se vean mejor en el ordenador-->
                <div class="usudat_NewUsu">
                    <p>
                        Numero de telefono:
                    </p>
                    <input id="telefono" name="telefono" class="textoForm" type="tel" placeholder="666777888" />
                    <?php cargarError("errorTelefono", ""); ?>
                </div>

                <div class="grupodatos_NewUsu">
                    <div class="usudat_NewUsu">
                        <p>
                            Contraseña: <span class="obligatorio">*</span>
                        </p>
                        <input id="password" name="password" class="textoForm" type="password" placeholder="**********" />
                        <?php cargarError("errorPassword", ""); ?>
                    </div>

                    <div class="usudat_NewUsu">
                        <p>
                            Confirmar contraseña: <span class="obligatorio">*</span>
                        </p>
                        <input id="confPassword" name="confirmarPassword" class="textoForm" type="password" placeholder="**********" />
                    </div>
                </div>
            </div>
            <input class="boton" type="submit" value="Modificar Usuario" name="Registrar" id="button_NewUsu" />
        </form>
    </section>
</body>

</html>