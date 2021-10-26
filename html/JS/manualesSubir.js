window.onload = function () {

    const nombre = document.getElementById("nombre");
    const apellidos = document.getElementById("apellidos");
    const email = document.getElementById("email");
    const telefono = document.getElementById("telefono");

    nombre.addEventListener("keyup", validar);
    apellidos.addEventListener("keyup", validar);
    email.addEventListener("keyup", validar);
    telefono.addEventListener("keyup", validar);

}