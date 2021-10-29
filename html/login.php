<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Fix Point</title>
    <!--Favicon de las paginas-->
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <!--Estilos-->
    <link rel="stylesheet" href="css/normalizar.css" />
    <link rel="stylesheet" href="css/login.css" />
    <!--Para el tipo de letra-->
    <link rel="stylesheet" href="css/style.css">
    <script src="JS/validacion.js"></script>
    <script src="JS/login.js"></script>
</head>

<body>
    <!--Lo que hay que poner para incluir una pagina:
    <?php include("../plantillas/indexNav.html"); ?>
    -->
    <form action="controladores/verificarLogin.php" method="post">
        <h2 id="titulo_Log">
            Inicio de sesión
        </h2>

        <div class="usucon_Log">
            <p>
                Usuario:
            </p>
            <input id="usuario" name="correo" class="datos_Log" type="email" placeholder="nombre@gmail.com"/>

            <?php
            
            if ($) {
                # code...
            }

            ?>

            <p class="error">
                
            </p>
        </div>

        <div class="usucon_Log">
            <p alt="La contraseña es el de la cuenta de FixPoint">
                Contraseña:
            </p>
            <!--Campo de la contraseña, el title sirve para el texto que sale al estar un rato sobre la contraseña-->
            <input id="contrasena" name="contrasena" class="datos_Log" type="password" placeholder="**********" title="La contraseña es el de la cuenta de FixPoint"/>
        </div>

        <input id="boton_Log" type="submit" value="Iniciar sesión" />

        <!--Estilo de los textos de los links-->
        <div class="enlaces_Log">
            <a class="enlace_Log">
                ¿Te has olvidado la contraseña? Recuperar contraseña
            </a>

            <a class="enlace_Log">
                ¿No tienes cuenta? Registrate ahora mismo
            </a>
        </div>
    </form>
    <!--Lo que hay que poner para incluir una pagina:
    <?php include("../plantillas/indexFooter.html"); ?>
    -->
</body>

</html>