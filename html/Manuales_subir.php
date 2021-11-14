<?php
    //PHP que comprueba si ha iniciado sesion para poder continuar
    require("plantillasphp/redirecciones.php");
    //PHP que comprueba 
    require("plantillasphp/funcionesFormularios.php");
    // require("controladores/paginador.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar manual - Fix Point</title>
    <!--Favicon de las paginas-->
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <!--Estilos-->
    <link rel="stylesheet" href="css/cssNav.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalizar.css" />
    <link rel="stylesheet" href="css/manuales_subir.css" />
    <!--Scripts-->
    <script src="JS/js.js"></script>
    <script src="JS/nav.js"></script>
    <script src="JS/validacion.js"></script>
    <script src="JS/manualesSubir.js"></script>
</head>

<body class="fondo">
    <!--Lo que hay que poner para incluir una pagina:-->
    <?php 
        include("plantillas/indexNav.php"); 
        //Con esto llamamos a la funcion que esta en redirecciones.php
        //Lo usamos para comprobar si ha iniciado sesion o no
        //Si esta logeado, continua. Si no va a registrarse
        comprobarLogin();    
    ?>

    <form enctype="multipart/form-data" action="controladores/donarHerramienta.php" method="post">
        <h2 class="tituloForm">
            Rellene el formulario para enviar su manual a revisión*
        </h2>

        <p id="infor_Man">
            *El manual será enviado a un administrador para su revisión. Esto no garantiza que se vaya a subir.
        </p>

        <div class="usucon_Man">
            <p>
                Nombre:
            </p>
            <!--Para cargar el nombre del usuario en el campo de texto, usamos el php dentro del value directamente-->
            <input class="textoForm" id="nombre" type="text" value="<?php echo $_SESSION["nombre"]; ?>" />            
        </div>

        <div class="usucon_Man">
            <p>
                Apellidos:
            </p>
            <!--Para cargar el nombre del usuario en el campo de texto, usamos el php dentro del value directamente-->
            <input class="textoForm" id="apellidos" type="text" value="<?php echo $_SESSION["apellidos"]; ?>" />
        </div>

        <div class="usucon_Man">
            <p>
                Email:
            </p>
            <!--Para cargar el nombre del usuario en el campo de texto, usamos el php dentro del value directamente-->
            <input class="textoForm" id="email" type="email" value="<?php echo $_SESSION["email"]; ?>" />
        </div>

        <div class="usucon_Man">
            <p>
                Teléfono de contacto:
            </p>
            <!--Para cargar el nombre del usuario en el campo de texto, usamos el php dentro del value directamente-->
            <input class="textoForm" id="telefono" type="tel" value="<?php echo $_SESSION["telefono"]; ?>" placeholder="629374638" size="9" maxlength="9" title="Debe empezar con: 6, 7 o 9"/>
        </div>

        <div id="cajaBot">
            <!--Los dos tipos de botones-->
            <input id="subir_Man" type="file" name="manual"/>
            <!--Para dar estilo al boton de file-->
            <label class="boton" type="button" for="subir_Man">Subir manuales...</label>
            <!--Sitio donde va a salir el nombre del manual-->
            <p id="nombreManual">
                Formulario.pdf
            </p>
            <input class="boton" id="enviar_Man" type="submit" value="Enviar" />
        </div>

        <!--Parte con las imagenes y una pequeña esplicacion de que tipo de archivos se pueden subir-->
        <article id="formatos_Man">
            <p>
                Los manuales solo se pueden subir en los siguientes formatos:
            </p>
            <section id="imagenes_Man">
                <img src="img/ImagenPDF.png" alt="Arcivos PDF" title="Archivos PDF" />
                <img src="img/ImagenWord.png" alt="Archivos Word" title="Archivos Word" />
            </section>
        </article>
    </form>
    <!--Lo que hay que poner para incluir una pagina:-->
    <?php include("plantillas/indexFooter.html"); ?>
</body>

</html>