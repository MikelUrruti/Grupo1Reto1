
window.onload = function () {
    paralaje();
}

function paralaje() {
    var contenedor1 = document.getElementById("linea1");
    var contenedor2 = document.getElementById("linea2");
    window.onmousemove = function (e) {
        var x = e.clientX/5;
        // var y = e.clientY;
        contenedor1.style.backgroundPositionX = x + "px";
        contenedor1.style.backgroundPositionX = x + "px";
        document.body.style.backgroundPosition = x + "px";
    }
}