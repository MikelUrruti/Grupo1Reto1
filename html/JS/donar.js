window.onload = function () {
    nombre = document.getElementById("nombre");
    var descripcion = document.getElementById("descripcion");

    nombre.addEventListener("keyup", validarCampo);
    descripcion.addEventListener("keyup", validacionDesc);

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

//Para crear la etiqueta del textarea, que sirve para la descripcion
function CrearDesc() {
    //Asi creamos el textarea, pero no tiene estilos
    var txtA = document.createElement("textarea");

    var total = 500;

    //Le damos un id y un nombre al textarea
    txtA.id = "descripcion";
    txtA.name = "descripcion";
    //Le damos el placeholder y el tamaño maximo
    txtA.placeholder = "Descripción de la herramienta..."
    txtA.maxLength = total;

    /*Si queremos que carge la etiqueta como "etiqueta" y no como texto,
    tenemos que poner appendChild. 
    Si por el contrario, ponemos innerHTML, solo va a ponerlo como texto*/
    document.getElementById("desc").appendChild(txtA);
}

/*
Validacion para que solo pueda escribir 500 caracteres en el textarea como maximo
*/
function validacionDesc() {
    //Para saber el tamaño completo del texto
    var tamanoMaximo = 500;
    //Para guardar el texto que se va a cambiar
    var restantes = document.getElementById("restantes");
    //Cantidad de caracteres actuales
    var tamanio = descripcion.value;
    //Mientras que el tamaño no llegue al tamaño maximo
    if(tamanio.length<tamanoMaximo){
        //Resta del tamaño maximo menos el tamaño actual
        valor = tamanoMaximo-document.getElementById("descripcion").value.length;
        //Se pone la resta en el campo de texto
        restantes.innerHTML=""+valor;
    }
}