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
    
    $_SESSION["codigoUsuario"] = "";
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
    $max = strlen($pattern)-1;
    for($i=0;$i < 6;$i++) $_SESSION["codigoUsuario"] .= $pattern[mt_rand(0,$max)];

    $to      = $_SESSION["email"]; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject 
    $message = '
     
    Thanks for signing up!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
     
    ------------------------
    Codigo: '.$_SESSION['codigoUsuario'].'
    ------------------------
     
    Please click this link to activate your account:
    http://www.yourwebsite.com/verify.php?email='.$_SESSION["email"].'&hash='.$_SESSION["email"].'
     
    '; // Our message above including the link
                         
    $headers = 'From:urruti00@gmail.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email
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