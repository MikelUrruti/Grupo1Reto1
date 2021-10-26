window.onload = function() {
    usuario = document.getElementById("usuario");
    contrasena = document.getElementById("contrasena");

    usuario.addEventListener("keyup", validarLogin);
    contrasena.addEventListener("keyup", validarLogin);

}
// Se toman los id de las cajas y se pasan a las funciones para su comprobación
function validarLogin(source) {

    let cajaId = source.target.id;

    if(cajaId == usuario.id){
        validar(source,validarEmail(source.target));
    }
}