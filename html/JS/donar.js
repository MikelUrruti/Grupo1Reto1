window.onload = function () {
    nombre = document.getElementById("nombre");
    var descripcion = document.getElementById("descripcion");
    var subirImg = document.getElementById("subirImg");

    nombre.addEventListener("keyup", validarCampo);
    descripcion.addEventListener("keyup", validacionDesc);
    subirImg.addEventListener("change", cargarImg);

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

//Para crear la etiqueta del textarea, que sirve para la descripcion
function CrearDesc() {
    //Asi creamos el textarea, pero no tiene estilos
    var txtA = document.createElement("textarea");

    var total = 500;

    //Le damos un id y un nombre al textarea
    txtA.id = "descripcion";
    txtA.name = "descripcion";
    //Le damos el placeholder y el tamaño maximo
    txtA.placeholder = "Descripción de la herramienta..."
    txtA.maxLength = total;

    /*Si queremos que carge la etiqueta como "etiqueta" y no como texto,
    tenemos que poner appendChild. 
    Si por el contrario, ponemos innerHTML, solo va a ponerlo como texto*/
    document.getElementById("desc").appendChild(txtA);
}

/*
Sccript que guarda el url de la imagen seleccionada y se lo pasa a la imagen anterior
para poder verla
*/
function cargarImg(event){
    var imagen = document.getElementById("imgVision");
    imagen.src = URL.createObjectURL(event.target.files[0]);
}