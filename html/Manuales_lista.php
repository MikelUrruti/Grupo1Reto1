<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista manuales - Fix Point</title>
    <!--favicon de las paginas-->
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <!--Estilos-->
    <link rel="stylesheet" href="css/normalizar.css" />
    <link rel="stylesheet" href="css/cssNav.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/manualesLista.css" />
    <link rel="stylesheet" href="css/paginador.css" />
</head>

<body class="fondo">
    <!--Lo que hay que poner para incluir una pagina:-->
    <?php
    include("plantillas/indexNav.php")
    ?>

    <form>
        <h1 id="titManLis">
            Escoge el manual que quieras visualizar
        </h1>

        <section id="buscBot">
            <!--Caja del buscador, con el campo de texto y la imagen de la lupa-->
            <article id="buscador">
                <input id="txtbus" type="text" placeholder="Buscar manuales..." />
                <img id="lupa" src="img/lupa.png" />
            </article>

            <article id="posBotSubMan">
                <a href="Manuales_subir.php">
                    <input id="subirMan" class="boton" type="button" value="Subir Manual"></input>
                </a>
            </article>
        </section>
    </form>
    <form method="POST" action="">
        <?php include("controladores/paginador.php") ?>
    </form>
    <?php
    include("plantillas/indexFooter.html");
    ?>
</body>

</html>