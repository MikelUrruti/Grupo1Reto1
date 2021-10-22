window.onload = function () {

    const nombre = document.getElementById("nombre");
    const apellidos = document.getElementById("apellidos");
    const email = document.getElementById("email");
    const telefono = document.getElementById("telefono");

    nombre.addEventListener("keyup", validar);
    apellidos.addEventListener("keydown", validar);
    email.addEventListener("keypress", validar);
    telefono.addEventListener("keyup", validar);

}

function validar(source) {
    let s = source.target;
   if (!validarCampo(s)) {
       s.style.border = "3px solid red";
    }
    else {
        s.style.border = "3px solid green";
    }
}

    function validarCampo(source) {
        if (source == nombre || source == apellidos) {
            if (source.value.length == 0) {
                if(!isNaN(source.value)){
                    if(source.value == null){
                        if(/^\s+$/.test(source.value)){
                            salida = 0;
                            return false;
                        }else {return true;}
                    }else {return true;}
                }else {return true;}                
        }  else {return true;}
    }
        else if (source == email) {
            if ( source.value.length == 0) {
                if(source.value == null){
                    if(!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(source.value))){
                        return false; 
                    }else {return true;}
                }else {return true;}  
            } else {return true;}
    } 
    else if (source == telefono) {
        console.log(source.value);
        if(source.value.length == 0){
            if(source.value == null){
                if(source.length != 9){
                    if(source.value.charAt(0) != 6){
                        if(source.value.charAt(0) != 7){
                            if(source.value.charAt(0) != 9){
                                return false;
                            }else{return true;}
                        }else{return true;}
                    }else{return true;}
                }else{return true;}
            }else{return true;}
        }else{return true;}
    } 

}    

        
    // switch (xd) {
    //     case nombre:
    //       if (xd.value.length == 0 || !isNaN(xd.value) || xd.value == null || /^\s+$/.test(xd.value)) {
    //         xd.style.border = "3px solid red";
    //       }
    //       else {
    //         xd.style.border = "3px solid green";
    //       }
    //       alert("bien");
    //       break;
    //     default:
    //         alert("mal");
    //         break;
    // }


    // return false;

// function validarNombre() {
//     // campo vacio - introducir numeros - campo nulo - espacios en blanco
//     if (nombre.value.length == 0 || !isNaN(nombre.value) || nombre.value == null || /^\s+$/.test(nombre.value)) {
//         return false;
//     } else {
//         return true;
//     }
// }
// function validarApellidos() {
//     // campo vacio - introducir numeros - campo nulo - espacios en blanco
//     if (apellidos.value.length == 0 || !isNaN(apellidos.value) || apellidos.value == null || /^\s+$/.test(apellidos.value)) {
//         apellidos.style.border = "3px solid red";
//     } else {
//         apellidos.style.border = "3px solid green";
//     }
// }

// function validarEmail(){
//     if(!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(email.value)) ) {
//         email.style.border="3px solid red";
//     }else{
//         email.style.border="3px solid green";
//     }
// }

// function validarTelefono(){
    
// }

