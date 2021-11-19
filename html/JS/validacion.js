// Pintar los input en tiempo real
function validar(source, correcto) {
    let s = source.target;
    if (!correcto) {
        s.style.border = "3px solid red";
    }else {
        s.style.border = "3px solid green";
    }
}

//Para comprobar el nombre, apellido, usuario y el nombre de la herramienta
function validarNombre(source, id) {
    // validar nombre-apellidos permitiendo texto a-z y varios simbolos(tildes, ñ...), 
    // espacios en blanco entre texto y se ajusta el limite de caracteres
    let regex = {
        //El nombre de usuario acepta cualquier letra, en mayus y minus, vocales con tilde y espacios en blanco
        //Esplicacion mas mejor abajo del todo
        "regexNom" : /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ(?!\s)]{2,30}$/,
        "regexApe" : /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ(?!\s)]{2,100}$/,
        //El nombre de usuario acepta cualquier letra, sin contar con tilde, y numeros
        "regexUser" : /^[a-zA-Z0-9]{2,30}$/,
        "regexTi" : /^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚüÜ(?!\s)]{2,30}$/
    };
    
    //Si el tamaño es mayor a 0
    if (source.value.length > 0) {
        if (source.value != null) {
            //Comprobación de espacios en blanco como unico texto introducido
            if (!(/^\s+$/.test(source.value))) {
                if(id == "nombre"){
                    if(regex["regexNom"].test(source.value)){
                        return true;
                    }
                }else if(id == "apellidos"){
                    if(regex["regexApe"].test(source.value)){
                        return true;
                    }
                }else if(id == "usuario"){
                    if(regex["regexUser"].test(source.value)){
                        return true;
                    }
                }else if(id == "titulo"){
                    if(regex["regexTi"].test(source.value)){
                        return true;
                    }
                }
            }
        }
    }
    return false;
}

//Validar email
function validarEmail(source) {
    // Se hacen comprobaciones para cada seccion de un email (usuario, dominio y extension)
    // Explicacion mas mejor de este regex abajo
    let regex = /^([a-zA-Z0-9.])+(@{1})+([a-zA-Z0-9]{2,30})+(\.[a-zA-Z0-9]{2,3}){1}$/igm;

    if (source.value.length > 0) {
        if (source.value != null) {
            if (regex.test(source.value)) {
                return true;
            }
        }
    }
    return false;
}

//Validar telefono
function validarTelefono(source) {
    if (source.value.length > 0 || source.value != null) {
        if (source.value.length == 9) {
            // Se comprueba el primer digito introducido
            if (source.value.charAt(0) == 6 || source.value.charAt(0) == 7 || source.value.charAt(0) == 9) {
                for (let index = 0; index <= source.value.length; index++) {
                    // Se asegura que se introduzca un numero
                    if (isNaN(source.value.charAt(index))) {
                        return false;
                    }
                }
                return true;
            }
        }
    }
    return false;
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
    if(tamanio.length<=tamanoMaximo){
        //Resta del tamaño maximo menos el tamaño actual
        valor = tamanoMaximo-parseInt(tamanio.length);
        //Se pone la resta en el campo de texto
        restantes.innerHTML=""+valor;
    }
}

//Validar stock
function validarStock(source) {
    for (let index = 0; index <= source.value.length; index++) {
        // Se asegura que se introduzca un numero
        if (isNaN(source.value.charAt(index))) {
            return false;
        }
    }
    return true;
}

//Validar cantidad
function validarCant(source){
    var objetivo = source.target;
    var regex = /^[0-9]+$/;
    console.log(objetivo.value);
    if(objetivo.value.length > 0){
        if (objetivo.value != null){
            if (regex.test(objetivo.value)){
                return true;
            }
        }
    }
    return false;
}

/*Regex
    /^ -> es para iniciar el regex
    Lo de dentro de la llave es lo que tiene que cumplir
        Hacepta letras, ya sean en mayus o minus y con tilde y letras especiales
    ?! -> indica que lo que vendra despues es posibilidad
    \s -> es para espacios en blanco
    $/ -> es para finalizar el regex
*/

/*Regex de comprobar cantidad
    /^ -> es para iniciar el regex
    [0-9] -> indica que solo acepta numeros
    + -> indica que tiene que buscar una o mas ocurrencias de la restriccion anterior
    $\ -> es para finalizar el regex
*/

/*Regex del correo
    /^ -> es para iniciar el regex
    ([a-zA-Z0-9.]) -> solo permite meter letras, mayus o minus, numeros y punto
    + -> sirve para añadir otra restriccion seguida de la anterior
    (@{1}) -> esto solo permite un arroba
    + -> sirve para añadir otra restriccion seguida de la anterior
    (\.[a-zA-Z0-9]{2,30}) -> permite letras, mayus o minus, numeros. Minimo de 2 y maximo de 30 caracteres. \. -> el parentesis de despues esta obligado a escribirlo despues de un punto
    + -> sirve para añadir otra restriccion seguida de la anterior
    ([a-zA-Z0-9]{2,3}) -> permite letras, mayus o minus, numeros. Minimo de 2 y maximo de 30 caracteres
    {1} -> esto hace que solo lo comprueba una vez, si copias y pegas te sale error
    $/ -> es para finalizar el regex

*/