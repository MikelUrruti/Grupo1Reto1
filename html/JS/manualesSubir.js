window.onload = function () {
    //Guardo los elementos en distintas variables
    telefono = document.getElementById("telefono");
    subir_Man = document.getElementById("subir_Man");

    //Añado los eventlistener necesarios a las variables
    telefono.addEventListener("keyup", validarCampo);
    subir_Man.addEventListener("change",  cargarNombMan);


}

// Se toman los id de las cajas y se pasan a las funciones para su comprobación
function validarCampo(source) {

    //Se guarda el id de la caja que se haya seleccionado
    let cajaId = source.target.id;
    console.log(telefono.value);
    if (cajaId == telefono.id) {
        validar(source, validarTelefono(source.target));
    }
}