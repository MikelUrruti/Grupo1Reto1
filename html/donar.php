<?php

    require("plantillasphp/redirecciones.php");
    // require("controladores/paginador.php");


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donar - Fix Point</title>
    <!--Favicon de las paginas-->
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <!--Estilos-->
    <link rel="stylesheet" href="css/normalizar.css" />
    <link rel="stylesheet" href="css/cssFooter.css" />
    <link rel="stylesheet" href="css/cssNav.css" />
    <link rel="stylesheet" href="css/donar.css" />
    <link rel="stylesheet" href="css/style.css">
    <!--Scripts-->
    <script src="JS/js.js"></script>
    <script src="JS/nav.js"></script>
    <!-- <script src="JS/donar.js"></script> -->
    <script src="JS/validacion.js"></script>
</head>

<body id="index">
    <?php

        include("plantillas/indexNav.php");

        comprobarLogin();

    ?>

    <form action="controladores/donarHerramienta.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php $_SESSION["usuario"] ?>" name="usuario" />
        <h2 class="tituloForm">
            DONAR HERRAMIENTAS
        </h2>

        <article id="contenedor">
            <section id="nombre">
                <p>
                    Herramientas:
                </p>
                <input id="nombre" class="textoForm" placeholder="Nombre de herramienta" type="text" name="herramienta" />
            </section>

            <section id="imagen">
                <div id="titBot">
                    <p>
                        Imagen:
                    </p>
                    <input id="subirImg" type="file" name="foto" onchange="cargarImg(event)"/>
                    <!--Para dar estilo al boton de file-->
                    <label for="subirImg">Subir imagen...</label>
                </div>

                <div id="imgDonde">
                    <!--Imagen en la que se va a visualizar la imagen a subir-->
                    <img id="imgVision" />
                </div>

                <!--Script que guarda el url de la imagen seleccionada y se lo pasa a la imagen anterior para poder verla-->
                <script>
                    var cargarImg = function (event) {
                        var imagen = document.getElementById('imgVision');
                        imagen.src = URL.createObjectURL(event.target.files[0]);
                    };
                </script>
            </section>

            <section id="desc">
                <p>
                    Descripción:
                </p>
                <textarea id="descripcion" placeholder="Descripción de la herramienta..." name="descripcion"></textarea>
            </section>
        </article>
        </div>

        <div id="posbot">
            <input class="boton" type="submit" value="Donar" />
        </div>
    </form>
    <?php 
        include ("plantillas/indexFooter.html");
    ?>
</body>

</html>