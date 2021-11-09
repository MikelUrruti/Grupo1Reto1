<?php 

require("plantillasphp/redirecciones.php");
require("plantillasphp/funcionesCorreos.php");

session_start();

if (!isset($_SESSION["usuario"]) || !isset($_SESSION["email"]) || !isset($_SESSION["nombre"]) || !isset($_SESSION["apellidos"]) || !isset($_SESSION["password"]) || !isset($_SESSION["telefono"])) {
    
    redireccionar("registro.php");

} else {

    $_SESSION["codigoGenerado"] = generarCodigo();

    enviarCorreo(
        "Verificar registro fixPoint",
        $_SESSION["email"],
        "
        <style>
        
            p {

                font-size: 2em;

            }
        
        </style>
        <p>Bienvenido al sitio web de fixPoint <span style='font-weight:bold'>".$_SESSION["usuario"]."</span>.</p>
        <p>Para completar el registro en nuestro sitio web deberas de introducir el siguiente codigo en el formulario donde se verifica tu cuenta:</p>
        <p style='font-weight:bold; font-size: 2em'>".$_SESSION["codigoGenerado"]."</p>
        <p>Si tienes algun problema a la hora de crear tu cuenta en este sitio web, respondenos en este hilo comentandonos tu situacion.</p>
        <p style='white-space:pre-line'>Un saludo,
        fixPoint
        </p>
        <img src='cid:imagen1' style='width: 200px; heigth:100px;'/>",
        "pues eso, que me chingo a tu madre maricon",
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
    <title>Verificar registro</title>
</head>
<body>
    
    <form action="controladores/confirmarRegistroUsuario.php" method="post">

        <h1>Verificar Cuenta</h1>
        <label for="">Introduce el codigo que se ha enviado al correo electronico indicado previamente.</label>
        <input type="text" name="codigo" id="">
        <input type="submit" class="boton" name="Confirmar" value="Confirmar Registro">
        <input type="submit" class="boton" name="Enviar" value="Volver a Enviar">

    </form>

</body>
</html>