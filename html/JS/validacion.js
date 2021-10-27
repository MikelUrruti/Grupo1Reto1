// Pintar los input en tiempo real
function validar(source, correcto) {
    let s = source.target;
    if (!correcto) {
        s.style.border = "3px solid red";
    }else {
        s.style.border = "3px solid green";
    }
}

function validarNombre(source, id) {
    // validar nombre-apellidos permitiendo texto a-z y varios simbolos(tildes, ñ...), 
    // espacios en blanco entre texto y se ajusta el limite de caracteres
    let regex = {
        "regexNom" : /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ(?!\s)]{2,30}$/,
        "regexApe" : /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ(?!\s)]{2,100}$/,
        "regexUser" : /^[a-zA-Z]{2,30}$/
    };
    
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
                }
            }
        }
    }
    return false;
}

function validarEmail(source) {
    // Se hacen comprobaciones para cada seccion de un email (usuario, dominio y extension)
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

function validarTelefono(source) {

    if (source.value.length > 0) {
        if (source.value != null) {
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
    }
    return false;
}

function validarUsuario(source) {
    
}