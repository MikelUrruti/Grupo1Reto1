<?php

if (basename(dirname(__FILE__)) == "plantillasphp") {

    require("../phpMailer/src/PHPMailer.php");
    require("../phpMailer/src/SMTP.php");
    require("../phpMailer/src/Exception.php");

} else {

    require("phpMailer/src/PHPMailer.php");
    require("phpMailer/src/SMTP.php");
    require("phpMailer/src/Exception.php");

}



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarCorreo(string $titulo,string $receptor,string $cuerpo,string $cuerpoAlternativo, array $imagenes) {

    $correo = new PHPMailer(true);

    $correo->SMTPDebug=0;
    $correo->isSMTP();
    $correo->Host="smtp.gmail.com";
    $correo->SMTPAuth=true;
    $correo->Username="fixpointbiblioteca@gmail.com";
    $correo->Password="xqlesle2021";
    $correo->SMTPSecure="tls";
    $correo->Port=587;
    $correo->setFrom("fixpointbiblioteca@gmail.com");
    $correo->addAddress($receptor);

    $correo->isHTML(true);
    $correo->Subject=$titulo;
    $correo->Body=$cuerpo;

    $count = 1;

    foreach ($imagenes as $imagen) {
        
        $correo->AddEmbeddedImage($imagen, "imagen".$count);
        $count++;
        
    }

    $correo->AltBody=$cuerpoAlternativo;

    $correo->send();

}

function enviarCorreoManuales(string $titulo,string $receptor,string $cuerpo,string $cuerpoAlternativo, array $imagenes, array $manuales, array $portadas) {

    $correo = new PHPMailer(true);

    $correo->SMTPDebug=0;
    $correo->isSMTP();
    $correo->Host="smtp.gmail.com";
    $correo->SMTPAuth=true;
    $correo->Username="fixpointbiblioteca@gmail.com";
    $correo->Password="xqlesle2021";
    $correo->SMTPSecure="tls";
    $correo->Port=587;
    $correo->setFrom("fixpointbiblioteca@gmail.com");
    $correo->addAddress($receptor);

    $correo->isHTML(true);
    $correo->Subject=$titulo;
    $correo->Body=$cuerpo;

    $count = 1;

    foreach ($imagenes as $imagen) {
        
        $correo->AddEmbeddedImage($imagen, "imagen".$count);
        $count++;
        
    }

    foreach ($manuales as $manual) {

        if (basename(dirname(__FILE__)) == "plantillasphp") {
            $correo->addAttachment("../img/manuales/".$manual,$manual);
        } else {
            $correo->addAttachment("img/manuales/".$manual,$manual);
        }   

    } 

    foreach ($portadas as $portada) {

        if (basename(dirname(__FILE__)) == "plantillasphp") {
            $correo->addAttachment("../img/manuales/portadas/".$portada,$portada);
        } else {
            $correo->addAttachment("img/manuales/portadas/".$portada,$portada);
        }

    }

    $correo->AltBody=$cuerpoAlternativo;

    $correo->send();

}

function generarCodigo() {

    $longitud = 6;
    $clave = '';
    $pattern = '1234567890';
    $max = strlen($pattern)-1;
    // for($i=0;$i < $longitud;$i++) $clave .= $pattern{mt_rand(0,$max)};
    for($i=0;$i < $longitud;$i++) $clave .= $pattern[mt_rand(0,$max)];
    return $clave;

}


?>