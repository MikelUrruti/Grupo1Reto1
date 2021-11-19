<?php
require("plantillasphp/redirecciones.php");
require("plantillasphp/funcionesFormularios.php");
require("plantillasphp/operacionesDb.php");
session_start();
comprobarLoginAdmin();

if (isset($_SESSION["nombreHerramienta"])) {
    
    $herramienta = consultarDatoBD("select categoria, stock, descripcion, foto, estado from Herramienta where nombre = ?",array($_SESSION["nombreHerramienta"]));

    $_SESSION["fotoHerramienta"] = $herramienta[0]["foto"];

} else {
    
    redireccionar("adminHerramientasAlmacen.php");

}



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
    <script src="JS/validacion.js"></script>
    <script src="JS/formularioModificarHerramienta.js"></script>
    <title>Modificar Herramienta - Fix Point</title>
</head>

<body>

    <?php
    include("plantillas/menuAdmin.html");
    ?>

    <section class="contenido">
        <form action="controladores/modificarHerramienta.php" method="post" enctype="multipart/form-data">
            <h2 id="titulo_NewUsu">
                Modificar herramienta (<?php echo $_SESSION["nombreHerramienta"]; ?>)
            </h2>
            <?php 

                if (isset($_SESSION["exito"])) {
                    cargarExito("exito", ""); 
                }
            
             ?>
            <div id="ui">
                <div class="usudat_NewUsu">
                    <p>
                        Nombre: <span class="obligatorio">*</span>
                    </p>
                    <input id="nombre" name="nombre" class="textoForm" type="text" value="<?php echo $_SESSION["nombreHerramienta"]; ?>" placeholder="Destornillador Philips 30cm" />
                    <?php 
                    
                    if (isset($_SESSION["errorNombre"])) {
                        cargarError("errorNombre", "");
                    }

                    ?>
                </div>
                <div class="usudat_NewUsu">
                    <p>
                        Categoria: <span class="obligatorio">*</span>
                    </p>
                    
                    <select name="categoria" id="" class="textoForm">
                        <?php

                            $categorias = consultarDatoBD("select nombre nombreCategoria from Categoria;",array());

                            foreach ($categorias as $categoria) {

                                if ($herramienta[0]["categoria"] == $categoria["nombreCategoria"]) {

                                    echo "<option value='".$categoria["nombreCategoria"]."' selected>".$categoria["nombreCategoria"]."</option>";

                                } else {

                                    echo "<option value='".$categoria["nombreCategoria"]."'>".$categoria["nombreCategoria"]."</option>";

                                }

                            }

                        ?>
                    </select>

                </div>
                
                <div class="usudat_NewUsu">
                    <p>
                        Stock: <span class="obligatorio">*</span>
                    </p>
                    <input id="stock" name="stock" class="textoForm" type="text" placeholder="123" value="<?php echo $herramienta[0]["stock"]; ?>"/>
                    <?php 
                    
                    if (isset($_SESSION["errorStock"])) {
                        cargarError("errorStock", "");
                    }

                    ?>
                </div>
                <div class="usudat_NewUsu">
                    <p>
                        Descripcion: <span class="obligatorio">*</span>
                        <span id="restantes">500</span>
                        palabras restantes
                    </p>
                    
                    <textarea id="descripcion" name="descripcion" class="textoForm" placeholder="destornillador de 30cm utilizado para sacar tornillos..." cols="10" rows="5"><?php echo $herramienta[0]["descripcion"]; ?></textarea>
                    
                
                    <?php 
                    
                    if (isset($_SESSION["errorDescripcion"])) {
                        cargarError("errorDescripcion", "");
                    }
                    
                    ?>
                </div>
                <div class="usudat_NewUsu">
                    <p>
                        Categoria: <span class="obligatorio">*</span>
                    </p>
                    
                    <select name="estado" id="" class="textoForm">
                        <option value="catalogada" <?php if($herramienta[0]["estado"] == "catalogada") echo "selected"; ?>>Catalogada</option>
                        <option value="descatalogada" <?php if($herramienta[0]["estado"] == "descatalogada") echo "selected"; ?>>Descatalogada</option>
                    </select>

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

                    <img src="<?php echo "img/herramientas/".$herramienta[0]["foto"]; ?>" alt="" id="imagen">

                </div>



            </div>
            <input class="boton" type="submit" value="Modificar Herramienta" name="Modificar" id="button_NewUsu" />
        </form>
    </section>
</body>

</html>