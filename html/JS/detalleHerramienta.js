window.onload = function () {
    const img = document.querySelector("#section1 img");
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
                    // ...La imagen se agrandará e imgClick será true
                    img.style.width = "400px";
                    imgClick = true;
                }
            break;
                // ...En caso de que que sea true...
            case true:
                //..Cualquier cosa que pinche decrecerá la imagen...
                //...e imgClick será false
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

