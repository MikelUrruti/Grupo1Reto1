<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Favicon de las paginas-->
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <link rel="stylesheet" href="css/normalizar.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/cssNav.css">    
    <link rel="stylesheet" href="css/contacto.css">
    <link rel="stylesheet" href="css/style.css">
    <!--Scripts-->
    <script src="JS/js.js"></script>
    <script src="JS/nav.js"></script>
    <title>Contacto - Fix Point</title>
</head>

<body class="fondo">
    <?php include("plantillas/indexNav.php") ?>
    <div id="contenedor">
        <section id="contacto">
            <article id="localizacion" class="caja">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2975.8682280791436!2d-2.484362084562394!3d41.766498779231206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd44d2e709876957%3A0x469c9525026cc4ad!2sCentro%20Integrado%20De%20Formaci%C3%B3n%20Profesional%20Pic%C3%B3%20Frentes!5e0!3m2!1ses!2ses!4v1635143057543!5m2!1ses!2ses" allowfullscreen="" loading="lazy" id="mapa"></iframe>
            </article>
            <article id="informacionContacto" class="caja">
                <h1 class="titulo">Metodos de contacto:</h1>
                <!--Este "p" esta puesto con este estilo tan raro para que dejasen bien los espacios-->
                <p>    Telefono:
        975 23 94 43

    Direccion:
        C.I.F.P Pico Frentes
        Gervasio Manrique de Lara s/n
        Soria, 42004
        Spain 
        Telefono:
        975 23 94 43
                </p>
            </article>

            <!--Seccion de la hora-->
            <article id="horario" class="caja">
                <h1 class="titulo">Horario:</h1>
                <table>
                    <tr class="fila">
                        <th class="celda dia">Lunes</th>
                        <td class="celda abierto">10:00–15:00</td>
                    </tr>
                    <tr class="fila">
                        <th class="celda dia">Martes</th>
                        <td class="celda abierto">10:00–14:05</td>
                    </tr>
                    <tr class="fila">
                        <th class="celda dia">Miercoles</th>
                        <td class="celda cerrado">Cerrado</td>
                    </tr>
                    <tr class="fila">
                        <th class="celda dia">Jueves</th>
                        <td class="celda abierto">10:00–14:05</td>
                    </tr>
                    <tr class="fila">
                        <th class="celda dia">Viernes</th>
                        <td class="celda abierto">10:00–14:05</td>
                    </tr>
                    <tr class="fila">
                        <th class="celda dia">Sabado</th>
                        <td class="celda cerrado">Cerrado</td>
                    </tr>
                    <tr class="fila">
                        <th class="celda dia">Domingos</th>
                        <td class="celda cerrado">Cerrado</td>
                    </tr>
                </table>
            </article>
        </section>
        </div>
    <?php include("plantillas/indexFooter.html"); ?>
</body>

</html>
