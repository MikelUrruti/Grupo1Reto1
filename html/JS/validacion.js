window.onload = function () {

    const nombre = document.getElementById("nombre");
    const apellidos = document.getElementById("apellidos");
    const email = document.getElementById("email");
    const telefono = document.getElementById("telefono");

    nombre.addEventListener("keyup", validar);
    apellidos.addEventListener("keyup", validarApellidos);
    email.addEventListener("keyup", validar);
    telefono.addEventListener("keyup", validar);
}

function validar(nombre, apellidos, email, telefono) {

    if(!validarNombre()){
        nombre.style.border = "3px solid red";
        
    }else{
        nombre.style.border = "3px solid green";
    }
    if(!apellidos()){
        apellidos.style.border = "3px solid red";
    }
}

function validarNombre() {
    // campo vacio - introducir numeros - campo nulo - espacios en blanco
    if (nombre.value.length == 0 || !isNaN(nombre.value) || nombre.value == null || /^\s+$/.test(nombre.value)) {
        return false;
    } else {
        return true;
    }
}
function validarApellidos() {
    // campo vacio - introducir numeros - campo nulo - espacios en blanco
    if (apellidos.value.length == 0 || !isNaN(apellidos.value) || apellidos.value == null || /^\s+$/.test(apellidos.value)) {
        apellidos.style.border = "3px solid red";
    } else {
        apellidos.style.border = "3px solid green";
    }
}

function validarEmail(){
    if(!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(email.value)) ) {
        email.style.border="3px solid red";
    }else{
        email.style.border="3px solid green";
    }
}

function validarTelefono(){
    
}