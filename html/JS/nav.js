
//Este Script se ejecuta al cargar el documento
//Y en el evento window.onresize



function cerrarMenuMovil() {
    //Defino chkMenu almacenando un elemento del documento
    const chkMenu = document.getElementById("chkMenu");
    //Cada vez que el ancho de la pantalla cambie...

        //...verificaré si es un dispositivo móvil...
        if (window.innerWidth <= 480) {
            //... si lo es, chkMenu se deschequeará 
            chkMenu.checked = false;
        }
}

/*
Esto sirve para que al estar en un disposiivo móvil,
el menú se oculte siempre,
aunque se le haya hecho clic antes.

Por si no se ha entendido:
El menú hamburguesa, que se oculta y se muestra de izquiera a derecha al pulsar un botón,
se controla mediante un checkbox,
inicialmente está oculto pero al pulsar sobre él su valor cambia y se muestra.

El problema de esto es que si pulsamos el botón y cambiamos de ancho,
al volver el menú no se ocultará por que el checkbox seguirá activo
(el menú se muestra siempre que no sea dispositivo móvil mediante media query; no se deschequea),
gracias a este Script, el checkbox se desactiva siempre que el ancho de la pantalla sea el de un dispositivo móvil.
*/