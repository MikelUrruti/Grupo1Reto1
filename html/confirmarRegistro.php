<?php 

require("plantillasphp/redirecciones.php");
require("phpMailer/src/PHPMailer.php");
require("phpMailer/src/SMTP.php");
require("phpMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

if (!isset($_SESSION["usuario"]) || !isset($_SESSION["email"]) || !isset($_SESSION["nombre"]) || !isset($_SESSION["apellidos"]) || !isset($_SESSION["password"]) || !isset($_SESSION["telefono"])) {
    
    redireccionar("registro.php");

} else {

    $correo = new PHPMailer(true);

    $correo->SMTPDebug=0;
    $correo->isSMTP();
    $correo->Host="smtp.gmail.com";
    $correo->SMTPAuth=true;
    $correo->Username="";
    $correo->Password="";
    $correo->SMTPSecure="tls";
    $correo->Port=587;
    $correo->setFrom("");
    $correo->addAddress($_SESSION["email"]);

    $correo->isHTML(true);
    $correo->Subject="Verificar registro en fixPoint";
    $correo->Body="";
    $correo->AltBody="";

    $correo->send();

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
        <input type="submit" class="boton" value="Enviar">

    </form>

</body>
</html>