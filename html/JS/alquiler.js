
window.onload = function () {

   
    // Popurrí de variables
    const flechaIzqMovil = document.getElementById("flechaIzqMovil");
    const flechaDchMovil = document.getElementById("flechaDchMovil");

    // Int para controlar la posición
    posicionCarrusel = 1;

    // EventListener de click a ambas flechas
    flechaIzqMovil.addEventListener("click",cambiarPosicionCarrusel);
    flechaDchMovil.addEventListener("click",cambiarPosicionCarrusel);
    
}
// Cada vez que el ancho de la ventana cambie...
window.onresize = function() {
    //... realizaré las sisguientes funciones
    codigoOriginal();
    cerrarMenuMovil();
}   

function cambiarPosicionCarrusel(comp) {
    // Pillo el elemento que he pulsado
    comp = comp.target;

    switch (comp) {
        // He pulsado flechaIzq
        case flechaIzqMovil:
            // Si posicionCarrusel es 1 le sumo 1
            if (posicionCarrusel==1) posicionCarrusel++;
            // Si no (es 2), le resto 1
            else posicionCarrusel--;
            // Le pongo la animación
            agregarAnimacionDch();
            // Cambio la posición de los artículos
            carruselMovil();
            break;
            // He pulsado flechaDch
            case flechaDchMovil:
                // Si posicionCarusel es 2 le resto 1
                if (posicionCarrusel==2) posicionCarrusel--;
                // Si no (es 1), le sumo 1
                else posicionCarrusel++;
               // Le pongo la animación
                agregarAnimacionIzq();
               // Cambio la posición de los artículos
                carruselMovil();
                break;
    }

}

function carruselMovil() {
    // Recojo variables
    const section = document.querySelector("body section");
    const article1 = document.getElementById("article1");
    const article2 = document.getElementById("article2");
    const article3 = document.getElementById("article3");
    const article4 = document.getElementById("article4");
    // Si posicionCarrusel es 1...
    if (posicionCarrusel == 1) {
        // ... Cambio la posición de los artículos
        section.insertBefore(article1,article3);
        section.insertBefore(article2,article3);
    }
    // Si no (es 2)...
    else {
        // ... Cambio la posición de los artículos
        section.insertBefore(article3,article1);
        section.insertBefore(article4,article1);
    }
}

function agregarAnimacionIzq() {
    
    const section = document.querySelector("body section");
    section.style.animation = "apareceSectionIzq 1s";
}

function agregarAnimacionDch() {
    const section = document.querySelector("body section");
    section.style.animation = "apareceSectionDch 1s";
}

function animacionIzq() {
    let id = null;
    const section = document.querySelector("body section");
    let pos = 0;
    clearInterval(id);
    id = setInterval(frame,10);
        function frame() {
            if (pos == -30) {
                clearInterval(id);
            } else {
                pos--;
                section.style.transform = 'translateX('+pos+'em)';
            if (pos == 30) {
                clearInterval(id);
            } else {
                pos++;
                section.style.transform = 'translateX('+pos+'em)';
                }
            
            }
        }
}

function quitarAnimacion() {
    const section = document.querySelector("body section");
    section.style.animation = "none";
}

function codigoOriginal() {
    //... Si el dispositivo es una tablet o un ordenador...
        if (window.innerWidth >= 489) {
            //...Recojo variables...
            const section = document.querySelector("body section");
            const article1 = document.getElementById("article1");
            const article2 = document.getElementById("article2");
            const article3 = document.getElementById("article3");
            //...Cambio la posición de los artículos
            section.insertBefore(article1,article3);
            section.insertBefore(article2,article3);
            // agregarAnimacionDch();
            // agregarAnimacionIzq();
        }
}

/* FUNCION cambiarPosicionCarrusel
    El valor que recoge se transforma en el propio componente que llama a la función
    Dividimos 2 casos, si el elemento es la flecha Izquiera o Derecha
    Si es la izquierda,
        El int posicionCarrusel incrementará en 1 si es 1, de lo contrario decrementará en 1
        Se aplicará una animación para que el section aparezca por la izquierda
    Si es la derecha,
        El int posicionCarrusel decrementará en 1 si es 2, de lo contrario incrementará en 1
        Se aplicará una animación para que el section aparezca por la derecha
*/

/*FUNCION carruselMovil
    Esta función es llamada en cambiarPosicionCarrusel
    Rcojo varias variables: una sección y sus artículos
    Gracias al int posicionCarrusel que se usa anteriormente,
    podemos dividir dos casos.
    Si el int posicionCarrusel es 1,
        Las posiciones de los artículos varían a artículo 1,2,3,4 respectivamente
    En otro caso (2),
        Las posiciones de los artículos varían a artículo 3,4,1,2 respectivamente
*/

/*
    FUNCION codigoOriginal
    Esta función se ejecuta dentro de la función window.onresize.
    Al cambiar el ancho de la pantalla, verificamos si el dispositivo
    en el que se muestra la ventana es más grande que un móvil,
    en su caso, cambiaremos la posición de los artículos a artículo 1,2,3,4 respectivamente
*/