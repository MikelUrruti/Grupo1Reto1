<?php 

require("plantillasphp/redirecciones.php");
require("plantillasphp/funcionesCorreos.php");
require("plantillasphp/funcionesFormularios.php");

session_start();

if (!isset($_SESSION["usuario"]) || !isset($_SESSION["email"]) || !isset($_SESSION["nombre"]) || !isset($_SESSION["apellidos"]) || !isset($_SESSION["password"])) {
    
    redireccionar("registro.php");

} else {

    $_SESSION["codigoGenerado"] = generarCodigo();

    enviarCorreo(
        "Verificar registro FixPoint",
        $_SESSION["email"],
        "
        <style>
        
            p {

                font-size: 2em;

            }
        
        </style>
        <p>Bienvenido al sitio web de FixPoint <span style='font-weight:bold'>".$_SESSION["usuario"]."</span>.</p>
        <p>Para completar el registro en nuestro sitio web deberas de introducir el siguiente codigo en el formulario donde se verifica tu cuenta:</p>
        <p style='font-weight:bold; font-size: 2em'>".$_SESSION["codigoGenerado"]."</p>
        <p>Si tienes algun problema a la hora de crear tu cuenta en este sitio web, respondenos en este hilo comentandonos tu situacion.</p>
        <p style='white-space:pre-line'>Un saludo,
        fixPoint
        </p>
        <img src='cid:imagen1' style='width: 200px; heigth:100px;'/>",
        "",
        array("./img/logo.png")
    );

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalizar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/confirmarRegistro.css">
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <title>Verificar registro</title>
</head>
<body>
    
  
    <a href="index.php"><img src="./img/logo.png" alt="cabecera" id="imgCab"></a>

    <form action="controladores/confirmarRegistroUsuario.php" method="post">

        <h1>Verificar Cuenta</h1>
        <p>Codigo de verificacion enviado a <span id="receptor"><?php echo $_SESSION["email"];?>.</span></p>
        <input type="text" name="codigo" id="codigo">
        <?php cargarError("errorCodigo", ""); ?>
        <div id="botones">
            <input type="submit" class="boton" name="Enviar" value="Volver a Enviar">
            <input type="submit" class="boton" name="Confirmar" value="Confirmar Registro">
        </div>

    </form>

</body>
</html>