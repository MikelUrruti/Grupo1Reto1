<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conocenos - Fix Point</title>
    <!--Favicon de las paginas-->
    <link rel="shortcut icon" href="img/Logo Header.png" />
    <!--Estilos-->
    <link rel="stylesheet" href="css/normalizar.css">
    <link rel="stylesheet" href="css/cssNav.css">
    <link rel="stylesheet" href="css/cssFooter.css">
    <link rel="stylesheet" href="css/conocenos.css">
    <link rel="stylesheet" href="css/style.css">
    <!--Scripts-->
    <script src="JS/js.js"></script>
    <script src="JS/nav.js"></script>
</head>
<body>
    <?php
        include("plantillas/indexNav.php")
    ?>
    <section id="conocenos">
        <article id="mision">
            <h1>MISIÓN</h1><input type="checkbox" class="checkbox" name="checkbox" id="mostrar1"/><label class="verMas" id="ver1" for="mostrar1">Ver más</label>
            <p id="mParrafo">
Como una comunidad de ávidos manitas, deportistas al aire libre y personas con conciencia ambiental, la Biblioteca de herramientas FixPoint, quiere provocar un cambio en el sistema de sobreproducción e ineficiencia resultante, la contaminación ambiental y la desigualdad (social). 
La misión de FixPoint es transformar la mentalidad en la sociedad, en la que la propiedad se elige sobre el acceso. 
Queremos hacer esto inspirando a la población y organizaciones a abrir una Biblioteca FixPoint en su vecindario para que la gente tenga acceso a cosas que solo necesitan de vez en cuando,en lugar de posesión. 
            </p>
        </article>

        <article id="vision">
            <h1>VISIÓN</h1><input type="checkbox" class="checkbox" name="checkbox" id="mostrar2"/><label class="verMas" id="ver2" for="mostrar2">Ver más</label>
            <p id="vParrafo">
FixPoint es un proyecto que lucha por una economía circular. 
Esto significa que creemos en un sistema cerrado de materias primas, en el que los productores seguirán siendo los propietarios de las materias primas contenidas en los productos en el futuro. 
Para lograr esto, sin embargo, debemos facilitar que 'acceder a' sea más fácil, más barato y más divertido que 'poseer'. 
            </p>
        </article>

        <article id="herramientas">
            <h1>¿QUÉ ES UNA BIBLIOTECA DE HERRAMIENTAS?</h1><input type="checkbox" class="checkbox" name="checkbox" id="mostrar3"/><label class="verMas" id="ver3" for="mostrar3">Ver más</label>
            <p id="hParrafo">
FixPoint es la primera Biblioteca de préstamo de España. Las Bibliotecas de herramientas funcionan como cualquier otra Biblioteca. Te conviertes en miembro y luego puedes tomar prestadas herramientas.

No tenemos fines de lucro y buscamos ser una organización benéfica.

Los objetivos son simples:

· Promover las habilidades de bricolaje, fabricación y reparación mediante el intercambio de herramientas
· Hacer de Soria una ciudad más sostenible
· Crear oportunidades de aprendizaje y desarrollo

Se planea tener un taller comunitario abierto a los miembros (en un principio, alumnos del Pico Frentes), un espacio para trabajar en sus propios proyectos y aprender nuevas habilidades.

El Taller dispondrá de herramientas y equipos fijos más grandes, disponibles para que los miembros lo usen. En el futuro, esperamos impartir clases de bricolaje, fabricación, construcción y uso seguro de herramientas
            </p>
        </article>
    </section>
    <?php 
        include ("plantillas/indexFooter.html");
    ?>
</body>
</html>