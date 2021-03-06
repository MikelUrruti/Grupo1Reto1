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
    <link rel="stylesheet" href="css/cssFooter.css" />
    <link rel="stylesheet" href="css/cssNav.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/style.css">
    <!--Scripts-->
    <script src="JS/validacion.js"></script>
    <script src="JS/login.js"></script>
</head>

<body>
    <!--Lo que hay que poner para incluir una pagina:-->
    <?php include("plantillas/indexNav.php"); ?>

    <form action="controladores/verificarLogin.php" method="post">
        <h2 id="titulo_Log">
            Inicio de sesión
        </h2>

        <div class="usucon_Log">
            <p>
                Usuario:
            </p>
            <input id="usuario" name="correo" class="textoForm" type="email" placeholder="nombre@gmail.com" />
        </div>

        <div class="usucon_Log">
            <p alt="La contraseña es el de la cuenta de FixPoint">
                Contraseña:
            </p>
            <!--Campo de la contraseña, el title sirve para el texto que sale al estar un rato sobre la contraseña-->
            <input id="contrasena" name="contrasena" class="textoForm" type="password" placeholder="**********" title="La contraseña es el de la cuenta de FixPoint" />
            <?php
            if (isset($_SESSION["error"])) {
                echo "<p class='error'>" . $_SESSION["error"] . "</p>";
                unset($_SESSION["error"]);
            }
            ?>
        </div>
        <input class="boton" type="submit" value="Iniciar sesión" />

        <!--Estilo de los textos de los links-->
        <div class="enlaces_Log">
            <a class="enlace_Log">
                ¿Te has olvidado la contraseña? Recuperar contraseña
            </a>

            <a class="enlace_Log" href="registro.php">
                ¿No tienes cuenta? Registrate ahora mismo
            </a>
        </div>
    </form>
    <!--Lo que hay que poner para incluir una pagina:-->
    <?php include("plantillas/indexFooter.html"); ?>
</body>

</html>