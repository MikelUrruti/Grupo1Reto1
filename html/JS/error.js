
window.onload = function () {
    paralaje();
}

function paralaje() {
    var contenedor1 = document.getElementById("linea1");
    var contenedor2 = document.getElementById("linea2");
    window.onmousemove = function (e) {
        var x = e.clientX/5;
        // var y = e.clientY;
        document.body.style.backgroundPositionX = x + "px";
    }
}