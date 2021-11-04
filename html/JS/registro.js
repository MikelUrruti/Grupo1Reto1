window.onload = function () {
    usuario = document.getElementById("usuario");
    nombre = document.getElementById("nombre");
    apellidos = document.getElementById("apellidos");
    email = document.getElementById("email");
    telefono = document.getElementById("telefono");

    usuario.addEventListener("keyup", validarRegistro);
    nombre.addEventListener("keyup", validarRegistro);
    apellidos.addEventListener("keyup", validarRegistro);
    email.addEventListener("keyup", validarRegistro);
    telefono.addEventListener("keyup", validarRegistro);
}

function validarRegistro(source) {
    
    //Con esto se sabe exactamente que caja es la que esta llamando
    let cajaId = source.target.id;

    //Aqui entra cuando es el nombre y apellido
    if (cajaId == nombre.id || cajaId == apellidos.id || cajaId == usuario.id) {
        //Se pone el ultimo cajaId para especificar a que caja hace referencia
        validar(source, validarNombre(source.target, cajaId));
    }else if(cajaId == email.id){
        validar(source, validarEmail(source.target));
    }else if(cajaId == telefono.id){
        validar(source, validarTelefono(source.target));
    }
}