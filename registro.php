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
    <link rel="stylesheet" href="css/normalizar.css"/>
    <link rel="stylesheet" href="css/cssFooter.css"/>
    <link rel="stylesheet" href="css/cssNav.css"/>
    <link rel="stylesheet" href="css/registro.css"/>
    <!--Para el tipo de letra-->
    <link rel="stylesheet" href="css/style.css"/>
    <script src="JS/js.js"></script>
    <!-- <script src="JS/registro.js"></script>
    <script src="JS/validacion.js"></script> -->
</head>

<body>
    <!--Lo que hay que poner para incluir una pagina:
    <?php include("plantillas/indexNav.html"); ?>
    -->
    <form action="controladores/registroUsuario.php" method="post">
        <h2 id="titulo_NewUsu">
            Crear nuevo usuario
        </h2>
        <div id="ui">
            <div class="usudat_NewUsu">
                <p>
                    Usuario:
                </p>
                <input id="usuario" name="usuario" class="datos_NewUsu" type="text" placeholder="nombre@gmail.com" />
            </div>

            <!--Estan en un grupo para que se vean mejor en el ordenador-->
            <div class="grupodatos_NewUsu">
                <div class="usudat_NewUsu">
                    <p>
                        Nombre:
                    </p>
                    <input id="nombre" name="nombre"  class="datos_NewUsu" type="text" placeholder="nombre" />
                </div>

                <div class="usudat_NewUsu">
                    <p>
                        Apellidos:
                    </p>
                    <input id="apellidos" name="apellidos" class="datos_NewUsu" type="text" placeholder="apellidos" />
                </div>
            </div>

            <!--Estan en un grupo para que se vean mejor en el ordenador-->
            <div class="usudat_NewUsu">
                <p>
                    Email:
                </p>
                <input id="email" name="email" class="datos_NewUsu" type="email" placeholder="nombre@gmail.com" />
            </div>

            <div class="grupodatos_NewUsu">
            <div class="usudat_NewUsu">
                <p>
                    Contraseña:
                </p>
                <input id="password" name="password" class="datos_NewUsu" type="password" placeholder="**********" />
            </div>

            <div class="usudat_NewUsu">
                <p>
                    Confirmar contraseña:
                </p>
                <input id="confPassword" name="confirmarPassword" class="datos_NewUsu" type="password" placeholder="**********" />
            </div>
        </div>
        </div>
        <input id="button_NewUsu" type="submit" value="Crear cuenta" name="Registrar" />
    </form>
    <!--Lo que hay que poner para incluir una pagina:
    <?php include("plantillas/indexFooter.html"); ?>
    -->
</body>

</html>