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
}

/*
Sccript que guarda el url de la imagen seleccionada y se lo pasa a la imagen anterior
para poder verla
*/
function cargarImg(event){
    /*
    var prueba = document.querySelectorAll("body > img");
    console.log(prueba);
    var imagen = document.getElementById("imgVision");
    imagen.src = URL.createObjectURL(event.target.files[0]);
    var imagen2 = document.getElementById("imgVision2");
    imagen2.src = URL.createObjectURL(event.target.files[0]);*/
    //Variables
    //Variable para saber que boton se a pulsado
    var idBotSel = event.target.id;
    //Array de todos los botones que comparten la misma clase
    var btnGrupo = Array.from(document.querySelectorAll(".btnSubir"));
    //Array de todas las imagenes que comparten la clase
    var imgGrupo = Array.from(document.querySelectorAll(".imagenes"));

    console.log(idBotSel);
    console.log(btnGrupo);
    console.log(imgGrupo);

    //Guardamos el tamaño maximo del array en una variable
    var tamMax = btnGrupo.length;
    //Variable de paso
    var paso = 0;
    //Variable que sirve para saber en que posicion del primer array esta
    //  luego sirve para cambiar la imagen del segundo array que este en 
    //  la misma posicion
    var lugarArrayImg = -1;
    //Recorremos el array para ver en que posicion esta esta el id
    for(paso; paso<tamMax; paso++){
        //Si el id del boton es igual al de la caja
        if(idBotSel==btnGrupo[paso].id){
            console.log(btnGrupo[paso].id);
            //Guarda la posicion en una variable
            lugarArrayImg = paso;
            //Se vuelve a poner el paso a 0
            paso=0;
            break;
        }
    }

    //Recorremos el segundo array para cambiar la imagen que se encuentre
    //  en la misma posicion de lo que hemos sacado antes
    for(paso; paso<tamMax; paso++){
        //Si la posicion es la misma que el de la variable
        if(paso==lugarArrayImg){
            console.log("saio");
            var idImg=(imgGrupo[paso].id);
            var imagen = document.getElementById(idImg);
            imagen.src = URL.createObjectURL(event.target.files[0]);
        }
    }
}