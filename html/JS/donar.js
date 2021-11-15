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