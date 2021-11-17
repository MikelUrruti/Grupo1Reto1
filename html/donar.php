<?php
    require("plantillasphp/redirecciones.php");
    require("plantillasphp/funcionesFormularios.php");
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
    <script src="JS/donar.js"></script>
    <script src="JS/validacion.js"></script>
</head>

<body id="index">
    <?php

        include("plantillas/indexNav.php");

        comprobarLogin();

    ?>

    <form action="controladores/donarHerramienta.php" method="post" enctype="multipart/form-data">
        <h2 class="tituloForm">
            DONAR HERRAMIENTAS
        </h2>

        <?php cargarExito("exito", ""); ?>
        <?php 
        if (isset($_SESSION["errorGeneral"])) {
            cargarError("errorGeneral", "text-align:center");
        }
        if (isset($_SESSION["manualsubido"])){
            cargarExito("manualsubido", "");
        }
        if(isset($_SESSION["ruta"])){
            //echo $_SESSION["ruta"];
            
        }
        ?>

        <article id="contenedor">
            <section id="nombreSec">
                <p>
                    Herramientas:
                </p>
                <input id="titulo" class="textoForm" placeholder="Nombre de herramienta" type="text" name="herramienta" maxlength="30"/>
                <?php cargarError("errorHerramienta", ""); ?>
            </section>

            <section id="imagen">
                <div id="titBot">
                    <p>
                        Imagen:
                    </p>
                    <input id="subirImg" type="file" name="foto" class="btnSubir"/>
                    <!--Para dar estilo al boton de file-->
                    <label for="subirImg">Subir imagen...</label>
                </div>

                <?php cargarError("errorImg", ""); ?>

                <div id="imgDonde">
                    <!--Imagen en la que se va a visualizar la imagen a subir-->
                    <img id="imgHerramienta" class="imagenes" />
                </div>
            </section>

            <section id="cantidadHerra">
                <p>
                    ¿Cuantas herramientas tiene para donar?
                </p>

                <div id="cajaNum">
                    <input title="Caracteres no permitidos: . - + e E" type="number" value="1" id="numSumRes" class="hoverCant" min="1" />
                </div>
            </section>

            <section id="desc">
                <p>
                    Descripción:
                </p>
                <p id="cantidad">
                    <!--Script que sirve para cambiar el texto de la cantidad de caracteres que te quedan-->
                    <!--No le llamamos desde aqui a la funcion de contar los caracteres, por que si no lo hace
                        dos veces y no lo ejecuta nunca-->
                    <span id="restantes">500</span>
                    letras restantes
                </p>
                <textarea id="descripcion" placeholder="Descripción de la herramienta..." name="descripcion" maxlength="500"></textarea>
 
                <?php cargarError("errorDescripcion", ""); ?>

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