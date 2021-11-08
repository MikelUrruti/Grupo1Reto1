
window.onload = function () {
    cerrarMenuMovil();
    codigoOriginal();
    // Popurrí de variables
    const flechaIzqMovil = document.getElementById("flechaIzqMovil");
    const flechaDchMovil = document.getElementById("flechaDchMovil");

    // Int para controlar la posición
    posicionCarrusel = 1;

    // EventListener de click a ambas flechas
    flechaIzqMovil.addEventListener("click",cambiarPosicionCarrusel);
    flechaDchMovil.addEventListener("click",cambiarPosicionCarrusel);
    
}

function cambiarPosicionCarrusel(comp) {
    comp = comp.target;
    switch (comp) {
        case flechaIzqMovil:
            console.log("click Flecha Izq");
            if (posicionCarrusel==1) posicionCarrusel++;
            else posicionCarrusel--;
            agregarAnimacionDch();
            carruselMovil();
            // quitarAnimacion();
            break;
        case flechaDchMovil:
            console.log("click Flecha Dch");
            if (posicionCarrusel==2) posicionCarrusel--;
            else posicionCarrusel++;
            agregarAnimacionIzq();
            carruselMovil();
            // quitarAnimacion();
            break;
    }

}

function carruselMovil() {
    const section = document.querySelector("body section");
    const article1 = document.getElementById("article1");
    const article2 = document.getElementById("article2");
    const article3 = document.getElementById("article3");
    const article4 = document.getElementById("article4");
    if (posicionCarrusel == 1) {
        section.insertBefore(article1,article3);
        section.insertBefore(article2,article3);
    }
    else {
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

function quitarAnimacion() {
    section.style.animation = "none";
}

function codigoOriginal() {
    window.onresize = function() {
        if (window.innerWidth >= 489) {
            const section = document.querySelector("body section");
            const article1 = document.getElementById("article1");
            const article2 = document.getElementById("article2");
            const article3 = document.getElementById("article3");
            section.insertBefore(article1,article3);
            section.insertBefore(article2,article3);
            // agregarAnimacionDch();
            // agregarAnimacionIzq();
        }
    }
}

/* FUNCION cambiarPosicionCarrusel
    No devuelve nada
    El valor que recoge se transforma en el propio componente que llama a la función
    Dividimos 2 casos, si el elemento es la flecha Izquiera o Derecha
    Si es la izquierda,
        El int posicionCarrusel incrementará en 1 si es 1, de lo contrario decrementará en 1
        Se aplicará una animación para que el section aparezca por la izquierda
    Si es la derecha,
        El int posicionCarrusel decrementará en 1 si es 2, de lo contrario incrementará en 1
        Se aplicará una animación para que el section aparezca por la derecha
*/