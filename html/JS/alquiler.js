
window.onload = function () {

    const flechaIzqMovil = document.getElementById("flechaIzqMovil");
    const flechaDchMovil = document.getElementById("flechaDchMovil");

    posicionCarrusel = 1;

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
            agregarAnimacionIzq();
            carruselMovil();
            quitarAnimacion();
            break;
        case flechaDchMovil:
            console.log("click Flecha Dch");
            if (posicionCarrusel==2) posicionCarrusel--;
            else posicionCarrusel++;
            agregarAnimacionDch();
            carruselMovil();
            quitarAnimacion();
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
        console.log("articulos 1 y 2");
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