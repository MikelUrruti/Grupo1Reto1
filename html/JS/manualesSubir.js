window.onload = function () {

    nombre = document.getElementById("nombre");
    apellidos = document.getElementById("apellidos");
    email = document.getElementById("email");
    telefono = document.getElementById("telefono");

    nombre.addEventListener("keyup", validarCampo);
    apellidos.addEventListener("keyup", validarCampo);
    email.addEventListener("keyup", validarCampo);
    telefono.addEventListener("keyup", validarCampo);

}

function validarCampo(source) {

    let cajaId = source.target.id;

    if (cajaId == nombre.id || cajaId == apellidos.id) {
        console.log("entra en caja");
        validar(source, validarNombre(source.target, cajaId));
    } else if (cajaId == email.id) {
        validar(source, validarEmail(source.target));
    } else if (cajaId == telefono.id) {
        validar(source, validarTelefono(source.target));
    } 
}