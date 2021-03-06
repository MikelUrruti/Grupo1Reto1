window.onload = function () {
    usuario = document.getElementById("usuario");
    nombre = document.getElementById("nombre");
    apellidos = document.getElementById("apellidos");
    email = document.getElementById("email");

    usuario.addEventListener("keyup", validarRegistro);
    nombre.addEventListener("keyup", validarRegistro);
    apellidos.addEventListener("keyup", validarRegistro);
    email.addEventListener("keyup", validarRegistro);
}

function validarRegistro(source) {
    
    let cajaId = source.target.id;

    if (cajaId == nombre.id || cajaId == apellidos.id || cajaId == usuario.id) {
        validar(source, validarNombre(source.target, cajaId));
    }else if(cajaId == email.id){
        validar(source, validarEmail(source.target));
    }
}