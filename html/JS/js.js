window.onload = function () {
    var checkbox = document.querySelectorAll("input[name=checkbox]");
    checkbox.forEach(element => {
        element.addEventListener("change", cambiarTexto);
    });
}
// Cada vez que el ancho de la pantalla cambie...
window.onresize = function () {
    //...realizaré las siguientes funciones:
    cerrarMenuMovil();
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

// animacion de carga para las paginas
function Loading(activar) {
    var load = '<div class="loader"><div class="inner one"></div><div class="inner two"></div><div class="inner three"></div></div></div>';
    var div1 = document.createElement("div");
    div1.id = "miModal";
    div1.className = "modal";
    var getDiv = document.getElementById("miModal");

    if(activar == true){       
    div1.innerHTML = load;
    document.body.appendChild(div1);
    }else if(activar == false){
        document.body.removeChild(getDiv);
    }
}

/*
Script que muestra el nombre del manual seleccionado
*/
function cargarNombMan(event){
    //Con esto cogemos el primer archivo
    //Tenemos que poner el "target" para especificar que elemento es
    var manualEntero = event.target.files[0];
    //Asi guardamos solo el nombre del manual
    var manualNombre = manualEntero.name;
    //Con esto ponemos el valor del documento en el html
    document.getElementById("nombreManual").innerHTML=manualNombre;
    console.log(manualNombre);
}

/*
Sccript que guarda el url de la imagen seleccionada y se lo pasa a la imagen anterior
para poder verla
*/
function cargarImg(event){
    var imagenF = document.getElementById("imgFichero");
        if(event.target.id == "fichero"){
            imagenF.src = URL.createObjectURL(event.target.files[0]);
        }else if(event.target.id == "portada"){
            imagenF.src = URL.createObjectURL(event.target.files[0]);
        }
}