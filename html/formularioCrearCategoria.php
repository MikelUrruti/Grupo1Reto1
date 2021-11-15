<?php
require("plantillasphp/redirecciones.php");
require("plantillasphp/funcionesFormularios.php");
session_start();
comprobarLoginAdmin();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Estilos-->
    <link rel="stylesheet" href="css/normalizar.css">
    <link rel="stylesheet" href="css/menuAdmin.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/adminComun.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formularioCrearUsuario.css">
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <title>Crear Categoria - Fix Point</title>
</head>

<body>

    <?php
    include("plantillas/menuAdmin.html");
    ?>

    <section class="contenido">
        <form action="controladores/crearCategoria.php" method="post" enctype="multipart/form-data">
            <h2 id="titulo_NewUsu">
                Crear nueva categoria
            </h2>
            <?php 

                if (isset($_SESSION["exito"])) {
                    cargarExito("exito", ""); 
                }
            
                if (isset($_SESSION["errorGeneral"])) {
                    cargarError("errorGeneral", "text-align:center");
                }
            
             ?>
            <div id="ui">
                <div class="usudat_NewUsu">
                    <p>
                        Nombre: <span class="obligatorio">*</span>
                    </p>
                    <input id="nombre" name="nombre" class="textoForm" type="text" placeholder="Alicates" />
                    <?php 
                    
                    if (isset($_SESSION["errorNombre"])) {
                        cargarError("errorNombre", "");
                    }

                    ?>
                </div>
                <div class="usudat_NewUsu">
                    <p>
                        Descripcion: <span class="obligatorio">*</span>
                    </p>
                    <textarea id="descripcion" name="descripcion" class="textoForm" placeholder="Este tipo de herramientas se utilizan para..." cols="10" rows="5"></textarea>
                
                    <?php 
                    
                    if (isset($_SESSION["errorDescripcion"])) {
                        cargarError("errorDescripcion", "");
                    }
                    
                    ?>
                </div>
                <div class="usudat_NewUsu">
                    <p>
                        Foto: <span class="obligatorio">*</span>
                    </p>
                    <input id="foto" name="foto" type="file" value="subir" />
                    <?php 
                    
                    if (isset($_SESSION["errorFoto"])) {
                        cargarError("errorFoto", "");
                    }
                    
                    ?>
                </div>
            </div>
            <input class="boton" type="submit" value="Crear Categoria" name="Registrar" id="button_NewUsu" />
        </form>
    </section>
</body>

</html>