

window.onload = function() {
   cerrarMenuMovil();
    const txt = document.getElementById("txtEscribir");
    const articulo3 = document.getElementById("articulo3");
    
    const frases = ["Repara","Comparte","Aprende"];
    txt.innerHTML = frases[frases.length-1];
    // txt.style.animation = "animacionH1 2s infinite";
    let intervaloFrase= 0;

    setInterval(function () {
        txt.innerHTML = frases[intervaloFrase];
        txt.style.animation = "animacionH1 2s infinite";
        
        intervaloFrase++;
    if (intervaloFrase >= frases.length) {
        intervaloFrase =0;
    } }, 2000)   

    articulo3.onclick = function() {
        window.location.href="donar.php";
    }
    
    articulo3.addEventListener(onmouseover,articulo3.style.cursor = "pointer");


}


      
      
      
    

        // setInterval(function () {      
        //     var primchar = txt.textContent;
        //     console.log(cambio);
        //     var cambio=primchar.substring(1);

        //     // txt.innerHTML=cambio;

        //     txt.innerHTML=cambio+primchar.charAt(0);
        // }, 180)
