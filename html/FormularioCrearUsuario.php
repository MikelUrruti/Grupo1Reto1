<?php

    require_once("plantillasphp/redirecciones.php");

    session_start();

    comprobarLogin();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalizar.css">
    <link rel="stylesheet" href="css/menuAdmin.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/adminComun.css">
    <link rel="stylesheet" href="css/formularioCrearUsuario.css">
    <title>Crear Usuario</title>
</head>
<body>

<?php

    include("plantillas/menuAdmin.html");

?>

<section class="contenido">

    <form action="controladores/crearUsuario.php" method="post">
    
        <h2 id="titulo_NewUsu">
            Crear nuevo usuario
        </h2>
        <div id="ui">
            <div class="usudat_NewUsu">
                <p>
                    Usuario:
                </p>
                <input id="usuario" name="usuario" class="datos_NewUsu" type="text" placeholder="Mecanico824" />
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

</section>

</body>
</html>