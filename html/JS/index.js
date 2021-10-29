

window.onload = function() {
   cerrarMenuMovil();
    const btnTest = document.getElementById("btnTest");
    const txt = document.getElementById("txtEscribir");
    btnTest.addEventListener("click", escribirTexto);

    txt.innerHTML = "Aprende";
    
    let intervaloFrase= 0
    setInterval(function () {
        let frases = ["Repara","Comparte","Aprende"];
        
        txt.innerHTML = frases[intervaloFrase];
        txt.style.animation = "animacionH1 2s infinite";
        
        intervaloFrase++;
        if (intervaloFrase >= frases.length) {
            intervaloFrase =0;
        }
        console.log(intervaloFrase);
       
      
        // alert(txt.innerHTML);
    }, 2000)

        // setInterval(function () {      
        //     var primchar = txt.textContent;
        //     console.log(cambio);
        //     var cambio=primchar.substring(1);

        //     // txt.innerHTML=cambio;

        //     txt.innerHTML=cambio+primchar.charAt(0);
        // }, 180)
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