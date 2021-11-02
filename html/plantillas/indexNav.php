<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Fix Point</title>
    <link rel="stylesheet" href="../css/normalizar.css">
    <link rel="stylesheet" href="../css/cssNav.css">
    <script src="../JS/js.js"></script>
</head>
<body> -->


    <?php
        session_start();
    ?>

    <input class="btnMenu" type="checkbox" name="" id="chkMenu">
    <label id="lblMenu" class="btnMenu" for="chkMenu">&#9776; <span id="lblSpan">Cerrar</span></label>
    <header>        
        <div id="containerNav">
            <a href="index.php"><img src="./img/logo.png" alt="cabecera" id="imgCab"></a>

            <ul id="primerUsu">
                <?php
                 if (isset($_SESSION["email"]) && isset($_SESSION["usuario"])) {
                    echo "
                    <li><p>Bienvenido, $_SESSION[usuario]</p></li>
                    <li><a href=logout.php>Cerrar Sesión</a></li>
                    ";
                    // <li><a class=imgUsuario href=><img src=./img/inicio_sesion.png alt=></a></li>
    
                    } else {
                        echo "
                        <li><a href=login.php>Iniciar sesión</a></li>
                        <li id=ultimousu><a href=registro.php>Registrarse</a></li>
                        ";
                    }
                
                ?>
            </ul>
        </div>

        <nav>
            <a href="index.php">Inicio</a>
            <a href="Manuales_lista.php">Manuales</a>
            <a href="#">Alquiler</a>
            <a href="donar.html">Dónanos</a>
            <a class="oculto" href="conocenos.php">Sobre nosotros</a>
            <a class="oculto" href="contacto.php">Contacto</a>
            <div id="masTit" href="#">
                Más <div id="flecha">-></div>
                <a class="oculto" href="conocenos.php">Sobre nosotros</a>
                <a class="oculto" href="contacto.php">Contacto</a>
            </div>
        </nav>

      

        <ul id="segundoUsu">
            <?php
            
            if (isset($_SESSION["email"]) && isset($_SESSION["usuario"])) {
                $_GET["cerrado"] = false;
                echo "
                <li><p>Bienvenido, $_SESSION[usuario]</p></li>
                <li><a href=logout.php>Cerrar Sesión</a></li>
                ";
                // <li><a class=imgUsuario href=><img src=./img/inicio_sesion.png alt=user></a> </li>

                } else {
                    echo "
                    <li><a href=login.php>Iniciar sesión</a></li>
                    <li><a href=registro.php>Registrarse</a></li>
                    ";
                }
            
            ?>
        </ul>
    </header>
    <!-- </body>
</html> -->