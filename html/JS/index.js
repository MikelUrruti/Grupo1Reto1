


window.onload = function () {
    const btnTest = document.getElementById("btnTest");
    const txt = document.getElementById("txtEscribir").innerHTML;
    btnTest.addEventListener("click", escribirTexto);

    

    var primchar = ""+txt.textContent;
    console.log(primchar.charAt(0));
    var cambio=primchar.substring(1);
    txt.innerHTML=cambio+primchar.charAt(0);
}



function escribirTexto() {
    let txt = document.getElementById("txtEscribir").innerHTML;
    let h1 =  document.createElement("h1")
    alert(txt);
    h1.appendChild(txt);
    document.body.appendChild(txt);
    var primchar = ""+txt.textContent;
    console.log(primchar.charAt(0));
    var cambio=primchar.substring(1);
    txt.innerHTML=cambio+primchar.charAt(0);
}