window.onload = function () {
    nombre = document.getElementById("titulo");
    descripcion = document.getElementById("descripcion");
    subirImg = document.getElementById("subirImg");
    cantidad = document.getElementById("numSumRes");

    nombre.addEventListener("keyup", validarCampo);
    descripcion.addEventListener("keyup", validacionDesc);
    subirImg.addEventListener("change", cargarImg);
    cantidad.addEventListener("mouseover", efectoHover);
    cantidad.addEventListener("change", comprobar);
    
    //Para darle el maximo de caracteres mediante JS
    /*
        LOS ATRIBUTOS HAY QUE PONERLOS EN MAYUSCULA LA
        SEGUNDA PARTE DEL ATRIBUTO, POR QUE SI NO LO
        PILLA COMO VARIABLE 

        TENER MUCHO CUIDADO CON TODO ESO
    */
    descripcion.maxLength= "500";
}

function comprobar(event){
    var as = event.target.value;
    
}

function efectoHover(event){
    var a = event.target;
    /*Estilo del cursor al hacer hover*/
    a.style.cursor="help";
    a.style.position="relative";
    /*Fin cursor hover*/
}


// Se toman los id de las cajas y se pasan a las funciones para su comprobación
function validarCampo(source) {

    let cajaId = source.target.id;

    if (cajaId == nombre.id) {
        validar(source, validarNombre(source.target, cajaId));
    } 
}