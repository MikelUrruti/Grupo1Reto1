window.onload = function () {
    nombre = document.getElementById("nombre");
    var descripcion = document.getElementById("descripcion");

    nombre.addEventListener("keyup", validarCampo);
    descripcion.addEventListener("keyup", validacionDesc);

    //Para darle el maximo de caracteres mediante JS
    descripcion.maxlength= "5";
}

// Se toman los id de las cajas y se pasan a las funciones para su comprobación
function validarCampo(source) {

    let cajaId = source.target.id;

    if (cajaId == nombre.id || cajaId == apellidos.id) {
        validar(source, validarNombre(source.target, cajaId));
    } 
}

//Para crear la etiqueta del textarea, que sirve para la descripcion
function CrearDesc() {
    //Asi creamos el textarea desde JS, pero no tiene ningun atributo ni nada
    var txtA = document.createElement("textarea");
    //Le damos un id y un nombre al textarea
    txtA.id = "descripcion";
    txtA.name = "descripcion";
    //Le damos el placeholder y 
}

/*
Validacion para que solo pueda escribir 500 caracteres en el textarea como maximo
*/
function validacionDesc() {
    //Para saber el tamaño completo del texto
    var tamanio = descripcion.value;
    if(tamanio.length>500){
        console.log("te has pasado");
    }else{
        console.log(tamanio.length);
    }
}