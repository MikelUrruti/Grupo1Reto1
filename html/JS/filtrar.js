window.onload = function(){

    var checkboxes = document.querySelectorAll(".checkbox");

    for (let i = 0; i < checkboxes.length; i++) {
        
        checkboxes[i].addEventListener("change",enviar,true);
        
    }

}

function enviar(evento) {
    
    document.getElementById("filtros").submit();


}