window.onload = function () {
    var checkbox = document.querySelectorAll("input[name=checkbox]");
    const btnTest = document.getElementById("btnTest");
    checkbox.forEach(element => {
        element.addEventListener("change", cambiarTexto);
    }); 
   
    btnTest.addEventListener("click", escribirTexto);
}

// Sobreescribir el texto de la caja
function cambiarTexto(){

    var mostrar = document.querySelectorAll("input[class=checkbox]");

    for (let index = 1; index <= mostrar.length; index++) {
        var check = document.getElementById("mostrar"+index);
        var ver = document.getElementById("ver"+index);
        if(check.checked){
            ver.innerHTML="Ver menos";
        }else{
            ver.innerHTML="Ver más";
        }   
    }

}




function escribirTexto() {
    let txt = document.getElementById("txtEscribir").innerHTML;
    let h1 =  document.createElement("h1")
    alert(txt);
    h1.appendChild(txt);
    document.body.appendChild(txt);
    var primchar = ""+txt.textContent;
    console.log(primchar.charAt(0));
    var cambio=primchar.substring(1);
    txt.innerHTML=cambio+primchar.charAt(0);
}


//Variables de los botones
const txt = document.getElementById("texto");

//Variable para el control de funciones
var detener;

function comenzar() {
    detener = setInterval(paso, 100);
}

function paso() {
    var primchar = ""+txt.textContent;
    console.log(primchar.charAt(0));
    var cambio=primchar.substring(1);
    txt.innerHTML=cambio+primchar.charAt(0);
}