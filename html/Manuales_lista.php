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
    <link rel="stylesheet" href="css/manualesLista.css" />
    <link rel="stylesheet" href="css/cssNav.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <!--Para el tipo de letra-->
    <link rel="stylesheet" href="css/style.css">
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
        <!-- <section id="cajaMan">
            <article class="manpos">
                <img class="manimg" src="img/ImagenPDF.png" />
                <p>
                    Nombre del manual
                </p>
            </article>

            <article class="manpos">
                <img class="manimg" src="img/ImagenPDF.png" />
                <p>
                    Nombre del manual
                </p>
            </article>

            <article class="manpos">
                <img class="manimg" src="img/ImagenPDF.png" />
                <p>
                    Nombre del manual
                </p>
            </article>

            <article class="manpos">
                <img class="manimg" src="img/ImagenPDF.png" />
                <p>
                    Nombre del manual
                </p>
            </article>

            <article class="manpos">
                <img class="manimg" src="img/ImagenPDF.png" />
                <p>
                    Nombre del manual
                </p>
            </article>

            <article class="manpos">
                <img class="manimg" src="img/ImagenPDF.png" />
                <p>
                    Nombre del manual
                </p>
            </article>
        </section> -->

        <!-- <article id="cantPag">
            <section id="movIzq">
                <img src="img/Paso.png" />
            </section>

            <section class="numPag">
                <p>
                    1
                </p>
            </section>

            <section class="numPag">
                <p>
                    ...
                </p>
            </section>

            <section class="numPag" id="posAct">
                <p>
                    5
                </p>
            </section>

            <section class="numPag">
                <p>
                    ...
                </p>
            </section>

            <section class="numPag">
                <p>
                    10
                </p>
            </section>

            <section id="movDer">
                <img src="img/Paso.png" />
            </section>
        </article> -->
    </form>
    <?php 
        include ("plantillas/indexFooter.html");
    ?>
</body>

</html>