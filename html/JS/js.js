window.onload = function () {
    var checkbox = document.querySelectorAll("input[name=checkbox]");
    checkbox.forEach(element => {
        element.addEventListener("change", cambiarTexto);
    }); 
   
   
}

function cambiarTexto(){

    var mostrar = document.querySelectorAll("input[class=checkbox]");

    for (let index = 1; index <= mostrar.length; index++) {
        var check = document.getElementById("mostrar"+index);
        var ver = document.getElementById("ver"+index);
        if(check.checked){
            ver.innerHTML="Ver menos";
        }else{
            ver.innerHTML="Ver más";
        }   
    }
}