window.onload = function () {
    //Guardo los elementos en distintas variables
    titulo = document.getElementById("nombre");
    descripcion = document.getElementById("descripcion");
    fichero = document.getElementById("fichero");
    portada = document.getElementById("portada");

    //Añado los eventlistener necesarios a las variables
    titulo.addEventListener("keyup", validarCampo);
    descripcion.addEventListener("keyup",  validacionDesc);
    fichero.addEventListener("change",  validarCampo);
    portada.addEventListener("change",  validarCampo);
}

// Se toman los id de las cajas y se pasan a las funciones para su comprobación
function validarCampo(source) {
    //Se guarda el id de la caja que se haya seleccionado
    
    let cajaId = source.target.id;

    if (cajaId == titulo.id) {
        validar(source, validarNombre(source.target, cajaId));
    }
}