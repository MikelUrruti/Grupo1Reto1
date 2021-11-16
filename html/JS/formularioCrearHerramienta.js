window.onload = function () {

    descripcion = document.getElementById("descripcion");
    stock = document.getElementById("stock");

    descripcion.addEventListener("keyup",validacionDesc);
    stock.addEventListener("keyup",validarCampo);

}

function validarCampo(source){

    let cajaId = source.target.id;

    if(cajaId == stock.id) {

        validar(source, validarStock(source.target, cajaId));

    }

}