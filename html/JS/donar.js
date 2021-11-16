window.onload = function () {
    nombre = document.getElementById("nombre");
    descripcion = document.getElementById("descripcion");
    subirImg = document.getElementById("subirImg");
    suma = document.getElementById("numSumRes");

    nombre.addEventListener("keyup", validarCampo);
    descripcion.addEventListener("keyup", validacionDesc);
    subirImg.addEventListener("change", cargarImg);
    suma.addEventListener("change", sumaVer);
    
    //Para darle el maximo de caracteres mediante JS
    descripcion.maxlength= "5";
}

// Se toman los id de las cajas y se pasan a las funciones para su comprobación
function validarCampo(source) {

    let cajaId = source.target.id;

    if (cajaId == nombre.id) {
        validar(source, validarNombre(source.target, cajaId));
    } 
}

function sumaVer(){
    var inicio = 0;
    var a = suma.value;
    console.log(a);
    if(inicio<a){
        inicio+1;
        console.log(inicio);
    }else{
        inicio-1;
        console.log(inicio);
    }
}

//Se comprueba si ha introducido algun signo especial, si asi es, se le impide escribirlo
function probarCantNum(event){
    var tecla = event.key;
    if(tecla==69 || tecla==187 || tecla==189 || tecla==190){
        console.log("has pulsado un boton no permitido");
    }
    //console.log(event.keyCode);
}