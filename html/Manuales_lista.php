<!DOCTYPE html>
<html lang="en">

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
    <!--Scripts-->
    <script src="JS/js.js"></script>
    <script src="JS/nav.js"></script>
</head>

<body>
    <!--Lo que hay que poner para incluir una pagina:-->
    <?php
        include("plantillas/indexNav.php")
    ?>
    
    <form>
        <h1 id="titManLis">
            Escoge el manual que quieras visualizar
        </h1>

        <!--Caja del buscador, con el campo de texto y la imagen-->
        <div id="buscador">
            <input id="txtbus" type="text" placeholder="Buscar manuales..." />
            <img id="lupa" src="img/lupa.png" />
        </div>
<?php include("controladores/paginador.php") ?>
    </form>
    <?php 
        include ("plantillas/indexFooter.html");
    ?>
</body>

</html>