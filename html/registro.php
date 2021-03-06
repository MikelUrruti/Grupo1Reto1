<?php

require("plantillasphp/funcionesFormularios.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo usuario - Fix Point</title>
    <!--Favicon de las paginas-->
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <!--Estilos-->
    <link rel="stylesheet" href="css/normalizar.css" />
    <link rel="stylesheet" href="css/cssFooter.css" />
    <link rel="stylesheet" href="css/cssNav.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/registro.css" />
    <!--Scripts en concreto-->
    <script src="JS/js.js"></script>
    <script src="JS/registro.js"></script>
    <script src="JS/validacion.js"></script>
</head>

<body>
    <!--Lo que hay que poner para incluir una pagina:-->
    <?php include("plantillas/indexNav.php"); ?>
    <form action="controladores/registroUsuario.php" method="post">
        <h2 class="tituloForm">
            Registrarse
        </h2>
        <div id="ui">
            <div class="usudat_NewUsu">
                <p>
                    Usuario: <span class="obligatorio">*</span>
                </p>
                <input id="usuario" name="usuario" class="textoForm" type="text" placeholder="Mecanico824" />

            </div>

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

            <div class="grupodatos_NewUsu">
                <div class="usudat_NewUsu">
                    <p>
                        Contrase??a: <span class="obligatorio">*</span>
                    </p>
                    <input id="password" name="password" class="textoForm" type="password" placeholder="**********" />
                    <?php cargarError("errorPassword", ""); ?>

                </div>

                <div class="usudat_NewUsu">
                    <p>
                        Confirmar contrase??a: <span class="obligatorio">*</span>
                    </p>
                    <input id="confPassword" name="confirmarPassword" class="textoForm" type="password" placeholder="**********" />
                </div>
            </div>

            <div class="usudat_NewUsu">
                <p>
                    Numero de telefono:
                </p>
                <input id="telefono" name="telefono" class="textoForm" type="tel" placeholder="666777888" />
                <?php cargarError("errorTelefono", ""); ?>

            </div>

            <div class="usudat_NewUsu">

                <div>
                    <input type="checkbox" name="condiciones" id=""><label for="condiciones">He leido y acepto los terminos de <a href="../condiciones/Condiciones de uso.docx" download>condiciones de uso</a>.</label> <span class="obligatorio">*</span>
                </div>
                <div>
                    <input type="checkbox" name="montaje" id=""><label for="montaje">He leido acerca de las reglas del <a href="../condiciones/proceso de montaje.docx" download>proceso de montaje</a>.</label> <span class="obligatorio">*</span>
                </div>
                <div>
                    <input type="checkbox" name="desmontaje" id=""><label for="desmontaje">He leido acerca de las reglas del <a href="../condiciones/proceso de desmontaje.docx" download>proceso de desmontaje</a>.</label> <span class="obligatorio">*</span>
                </div>

                <?php cargarError("errorCondiciones", ""); ?>

            </div>

        </div>
        <input class="boton" type="submit" value="Crear cuenta" name="Registrar" />
    </form>
    <!--Lo que hay que poner para incluir una pagina: -->
    <?php include("plantillas/indexFooter.html"); ?>

</body>

</html>