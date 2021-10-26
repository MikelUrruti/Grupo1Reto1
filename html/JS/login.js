window.onload = function() {
    usuario = document.getElementById("usuario");
    contrasena = document.getElementById("contrasena");

    usuario.addEventListener("keyup", validarLogin);
    contrasena.addEventListener("keyup", validarLogin);

}

function validarLogin(source) {

    let cajaId = source.target.id;

    if(cajaId == usuario.id){
        validar(source,validarEmail(source.target));
    } else if(cajaId == contrasena.id){
        validar(source,validarContrasena(source.target));
    }

}