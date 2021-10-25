// let caja = source.id;

function validar(source) {
    let s = source.target;
    if (!validarCampo(s)) {
        s.style.border = "3px solid red";
    }
    else {
        s.style.border = "3px solid green";
    }
}
/*
function validarCampo(source) {
    let caja = source.id;
    let regex = /^[a-zA-Z0-9.^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/igm;
    if (caja == nombre.id || caja == apellidos.id) {
        if (source.value.length > 0) {
            if (isNaN(source.value)) {
                if (source.value != null) {
                    if (!(/^\s+$/.test(source.value))) {
                        return true;
                    } else { return false; }
                } else { return false; }
            } else { return false; }
        } else { return false; }
    }
    else if (caja == email.id) {
        if (source.value.length > 0) {
            if (source.value != null) {
                if (regex.test(source.value)) {
                    return true;
                } else { return false; }
            } else { return false; }
        } else { return false; }
    }
    else if (caja == telefono.id) {
        if (source.value.length > 0) {
            if (source.value != null) {
                if (source.value.length == 9) {
                    if (source.value.charAt(0) == 6 || source.value.charAt(0) == 7 || source.value.charAt(0) == 9) {
                        return true;
                    } else { return false; }
                } else { return false; }
            } else { return false; }
        } else { return false; }
    }
}
*/

function validarCampo(source) {

    let cajaId = source.id;

    if (cajaId == nombre.id || cajaId == apellidos.id) {
        return validarNombre(source);
    } else if (cajaId == email.id) {
        return validarEmail(source);
    } else if (cajaId == telefono.id) {
        return validarTelefono(source);
    } else if(cajaId == usuario.id){
        
    }else if(cajaId == contrasena.id){

    }

}

function validarNombre(source) {

    let regex = /^[A-Za-z]+$/;
    
    if (source.value.length > 0) {
        if (source.value != null) {
            if (!(/^\s+$/.test(source.value))) {
                if (regex.test(source.value)) {
                    return true;
                }
            }
        }
    }

    return false;

}

function validarEmail(source) {

    let regex = /^[a-zA-Z0-9.^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/igm;

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
                if (source.value.charAt(0) == 6 || source.value.charAt(0) == 7 || source.value.charAt(0) == 9) {

                    for (let index = 0; index <= source.value.length; index++) {
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