<?php
require("plantillasphp/redirecciones.php");
require("plantillasphp/funcionesFormularios.php");
session_start();
comprobarLogin();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Favicon de las paginas-->
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <!--Estilos-->
    <link rel="stylesheet" href="css/normalizar.css">
    <link rel="stylesheet" href="css/menuAdmin.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/adminComun.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formularioModificarManual.css">
    <title>Modificar Manual - Fix Point</title>
    <!--Scripts-->
    <script src="JS/js.js"></script>
    <script src="JS/validacion.js"></script>
    <script src="JS/modificarManual.js"></script>
</head>

<body>
    <?php
    include("plantillas/menuAdmin.html");
    ?>
    <section class="contenido">

        <form action="controladores/modificarManual.php" method="post">
            <h2 id="tituloManual">
                Modificar Manual
            </h2>
            <?php cargarError("errorGeneral", "text-align:center"); ?>
            <div class="apartados">
                <p>
                    Titulo:
                </p>

                <input type="text" name="titulo" value="<?php echo $_SESSION['manualSeleccionado']?>" class="textoForm" id="titulo" />
                <?php cargarError("errorTitulo", ""); ?>
            </div>
            <div class="apartados">
                <p>
                    Descripcion:
                </p>
                <p id="cantidad">
                    <!--Script que sirve para cambiar el texto de la cantidad de caracteres que te quedan-->
                    <!--No hace falta ponerlo aqui, ya que esta puesto en el js llamandolo, si lo ponias aqui,
                        lo ejecutaba dos veces o algo asi y no funcionaba-->
                    <span id="restantes">500</span>
                    letras restantes
                </p>
                <textarea id="descripcion" placeholder="Descripción de la herramienta..." name="descripcion" class="textoForm"></textarea>
                <?php cargarError("errorDescripcion", ""); ?>
            </div>
            <div class="apartados">
                <p>
                    Fichero:
                </p>

                <input type="file" name="fichero" id="fichero" class="btnSubir" />
                <label for="fichero" class="txtSubir">Subir Manual</label>
                <div id="imgDonde">
                    <!--Imagen en la que se va a visualizar la imagen a subir-->
                    <img id="imgFichero" class="imagenes"  />
                </div>

                <?php cargarError("errorFichero", ""); ?>
            </div>
            <div class="apartados">
                <p>
                    Portada:
                </p>

                <input type="file" name="portada" id="portada" class="btnSubir" />
                <label for="portada" class="txtSubir">Subir Imagen</label>
                

                <div id="imgDonde2">
                    <!--Imagen en la que se va a visualizar la imagen a subir-->
                    <!-- <img id="imgVision" src="<?php echo "../manuales/portadas/".$_; ?>" style="width: 200px; height: 200px;" /> -->
                    <img id="imgPortada" class="imagenes" />
                </div>

                <?php cargarError("errorPortada", ""); ?>
            </div>
            <input type="submit" value="Modificar Manual" name="modificar" class="boton" />
        </form>
    </section>
</body>

</html>