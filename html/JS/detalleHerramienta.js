window.onload = function () {
    const modal = document.getElementById("imgGrande")
    const img = document.querySelector("#section1 img");
    const imgGrande = document.querySelector("#imgGrande img");
    const imgGrandeQuitar = document.querySelector("#imgGrande span")
    const imgGrandeTexto = document.querySelector("#imgGrande div");
    var imgClick = false;

    // Si hago click en algún elemento del documento...
    document.onclick = function (source) {
        source = source.target;
        // ...Compruebo imgClick...
        switch (imgClick) {
            // ...En caso de que sea false...
            case false:
            // ...Si lo que he pinchado es la imagen...
                if (source==img) {
                    // ...Aparecerá un modal e imgClick será true
                    modal.style.display = "block";
                    imgGrande.src = img.src;
                    imgGrandeTexto.innerHTML = img.alt;
                    modal.style.transition = "1s";
                    imgClick = true;
                }
            break;
                // ...En caso de que que sea true...
            case true:
                //..Si pincho cualquier cosa que no sea la imagen o el texto...
                if (source!=imgGrande && source!=imgGrandeTexto) {
                    // ... Desaparece el modal...
                    modal.style.display = "none";
                    //...e imgClick será false
                    imgClick = false;
                }
            break;
        }
    }
} 
