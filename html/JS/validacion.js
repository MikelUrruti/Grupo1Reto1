// let caja = source.id;

// function validar(source) {
//     let s = source.target;
//     if (!validarCampo(s)) {
//         s.style.border = "3px solid red";
//     }else {
//         s.style.border = "3px solid green";
//     }
// }

// function validarCampo(source) {

//     let cajaId = source.id;

//     if (cajaId == nombre.id || cajaId == apellidos.id) {
//         return validarNombre(source);
//     } else if (cajaId == email.id) {
//         return validarEmail(source);
//     } else if (cajaId == telefono.id) {
//         return validarTelefono(source);
//     } 
// }

// function  validarLogin(source) {

//     let cajaId = source.id;

//     if(cajaId == usuario.id){
//         return validarEmail(source);
//     } else if(cajaId == contrasena.id){
//         return validarContrasena(source);
//     }
// }

function validar(source, correcto) {
    let s = source.target;
    if (!correcto) {
        s.style.border = "3px solid red";
    }else {
        s.style.border = "3px solid green";
    }
}

function validarNombre(source, id) {

    let regexNom = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ(?!\s)]{2,30}$/;
    let regexApe = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ(?!\s)]{2,100}$/;
    
    if (source.value.length > 0) {
        console.log("primera comprobacion");
        if (source.value != null) {
            console.log("segunda comprobacion");
            if (!(/^\s+$/.test(source.value))) {
                console.log("tercera comprobacion");
                if(id == "nombre"){
                    console.log(id);
                    if(regexNom.test(source.value)){
                        return true;
                    }
                }else if(id == "apellidos"){
                    console.log(id);
                    if(regexApe.test(source.value)){
                        return true;
                    }
                }
            }
        }
    }

    return false;

}

function validarEmail(source) {

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