window.onload = function () {
    var checkbox = document.querySelectorAll("input[name=checkbox]");
    checkbox.forEach(element => {
        element.addEventListener("change", cambiarTexto);
    });
}

// Sobreescribir el texto de la caja
function cambiarTexto() {

    var mostrar = document.querySelectorAll("input[class=checkbox]");

    for (let index = 1; index <= mostrar.length; index++) {
        var check = document.getElementById("mostrar" + index);
        var ver = document.getElementById("ver" + index);
        if (check.checked) {
            ver.innerHTML = "Ver menos";
        } else {
            ver.innerHTML = "Ver más";
        }
    }

}

function Loading() {
    var form = document.getElementById("form");
    var load = '<div id="miModal" class="modal"><div class="loader"><div class="inner one"></div><div class="inner two"></div><div class="inner three"></div></div></div>';
    form.insertBefore(load);
}