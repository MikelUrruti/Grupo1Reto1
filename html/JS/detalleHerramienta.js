window.onload = function () {
    const section = document.querySelector("section");
    const descH2 = document.getElementById("descripcion").innerHTML;
    const img = document.querySelector("#section1 img");
    var imgClick = false;
    for (let i = 0;i<descH2.length;i++) {
        if (contieneGuion(descH2.charAt(i))) {
           
        }
    }

    // Si hago click en algún elemento del documento...
    document.onclick = function (source) {
        source = source.target;
        // ...Compruebo imgClick...
        switch (imgClick) {
            // ...En caso de que sea falso...
            case false:
            // ...Si lo que he pinchado es la imagen...
                if (source==img) {
                    // ...La imagen se agrandará e imgClick será true
                    img.style.width = "400px";
                    imgClick = true;
                }
            break;
                // ...En caso de que...
            case true:
                img.style.width = "220px";
                imgClick = false;
            break;
        }
    }
} 



    // document.body.onclick = function(){
    //     if (imgClick == true) {
    //         img.style.width= "220px";
    //         imgClick = false;
    //         console.log("no yeah")
    //     }
    // }



function contieneGuion(p) {
    return p.includes("-");
}

