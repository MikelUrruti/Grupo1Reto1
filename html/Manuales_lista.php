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
    <!--Para el tipo de letra-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/manualesLista.css" />
</head>

<body id="index">
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
        
    </form>
    <form method="POST" action="">
        <?php include("controladores/paginador.php") ?>
    </form>
    <?php 
        include ("plantillas/indexFooter.html");
    ?>
</body>

</html>