window.onload = function () {
    //Guardo los elementos en distintas variables
    telefono = document.getElementById("telefono");
    subir_Man = document.getElementById("subir_Man");

    //Comprobamos si el usuario tiene un telefono o no
    if(telefono.value.length==9){
        //Si el usuario tiene telefono bloquea la caja
        telefono.disabled = true;
    }

    //Añado los eventlistener necesarios a las variables
    telefono.addEventListener("keyup", validarCampo);
    subir_Man.addEventListener("change",  cargarNombMan);

}

// Se toman los id de las cajas y se pasan a las funciones para su comprobación
function validarCampo(source) {

    //Se guarda el id de la caja que se haya seleccionado
    let cajaId = source.target.id;
    if (cajaId == telefono.id) {
        validar(source, validarTelefono(source.target));
    }
}