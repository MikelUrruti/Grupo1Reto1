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
    <link rel="stylesheet" href="css/style.css">
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
    <?php include("plantillas/indexNav.php"); ?>
    
    <form>
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
            <input class="textoForm" id="nombre" type="text" placeholder="nombre" />
        </div>

        <div class="usucon_Man">
            <p>
                Apellidos:
            </p>
            <input class="textoForm" id="apellidos" type="text" placeholder="apellidos" />
        </div>

        <div class="usucon_Man">
            <p>
                Email:
            </p>
            <input class="textoForm" id="email" type="email" placeholder="nombre@gmail.com" />
        </div>

        <div class="usucon_Man">
            <p>
                Teléfono de contacto:
            </p>
            <input class="textoForm" id="telefono" type="tel" placeholder="123456789" size="9" maxlength="9" />
        </div>

        <!--Los dos tipos de botones-->
        <input class="boton" id="subir_Man" type="button" value="Subir archivo" />
        <input class="boton" id="enviar_Man" type="button" value="Enviar" />

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