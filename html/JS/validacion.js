var contador = 0;

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
    console.log(s);
    console.log(contador);
   if (!validarCampo(s)) {
       s.style.border = "3px solid red";
       contador++;
    }
    else {
        s.style.border = "3px solid green";
    }
}

    function validarCampo(source) {
        if (source == nombre || source == apellidos) {
            if (source.value.length == 0 || !isNaN(source.value) || source.value == null || /^\s+$/.test(source.value)) {
                return false;
        }  else {return true;}
    }
        else if (source == email) {
            if ( source.value.length == 0|| source.value == null ||  !(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(source.value))) {
                return false; 
            } else {return true;}
    } 
    else if (source == telefono) {

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

