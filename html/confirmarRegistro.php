<?php 

require("plantillasphp/redirecciones.php");
require("phpMailer/src/PHPMailer.php");
require("phpMailer/src/SMTP.php");

session_start();

if (!isset($_SESSION["usuario"]) || !isset($_SESSION["email"]) || !isset($_SESSION["nombre"]) || !isset($_SESSION["apellidos"]) || !isset($_SESSION["password"]) || !isset($_SESSION["telefono"])) {
    
    redireccionar("registro.php");

} else {
    
    $_SESSION["codigoUsuario"] = "";
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
    $max = strlen($pattern)-1;
    for($i=0;$i < 6;$i++) $_SESSION["codigoUsuario"] .= $pattern[mt_rand(0,$max)];

    $mail=new PHPMailer();
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->addAddress($email, $name);
    $mail->Body = " <h3>Hi $name,</h3><h4>Congrats!</h4>";
    $mail->send();
    $mail->ClearAllRecipients(); 

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