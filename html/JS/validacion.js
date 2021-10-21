window.onload = function(){
    validarNombre();

    // var apellidos = document.getElementById("apellidos");
    // var email = document.getElementById("email");
    // var telefono = document.getElementById("telefono");
}

function validarNombre(){
    var nombre = document.getElementById("nombre").value;
    
    if(nombre.lengh > 1){
        document.getElementById("nombre").style.backgroundColor="red";
    }
}