<?php 

require("../plantillasphp/validaciones.php");
require("../plantillasphp/operacionesDb.php");
require("../plantillasphp/redirecciones.php");

session_start();

if (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["telefono"]) && isset($_FILES["manual"])) {
    $correcto = true;
    if ($_POST["nombre"] == "") {
        
        $_SESSION["errorNombre"] = "Debes indicar el nombre";
        $correcto = false;

    }if ($_POST["apellidos"] == "") {
        
        $_SESSION["errorApellidos"] = "Debes indicar el apellido";
        $correcto = false;

    } if (!validarEmail($_POST["email"])) {
        
        $_SESSION["errorEmail"] = "Debes introducir un email adecuado";
        $correcto = false;

    } if ($_FILES['manual']["name"] == "") {
            
        $_SESSION["errorManual"] = "Debes seleccionar un manual";
        $correcto = false;

    }
    if ($correcto) {

        if (validarManual($_FILES['manual'])) {
        
            //La ruta de origen es de donde viene la foto
            $rutaOrigen = $_FILES['manual']['tmp_name'];

            //La ruta a la que queremos mandar la foto
            $rutaDestino = '../../herramientas/' . $_POST["nombre"].".".pathinfo($_FILES["manual"]["name"], PATHINFO_EXTENSION);

            try {
                // hago una copia de la imagen subida y la almaceno
                move_uploaded_file($rutaOrigen, $rutaDestino);

            }
                catch (Exception $e) {
                    $correcto = false;
            }
            if ($correcto) {
                
                $crearCategoria = manipularDatoBD("insert into Manual values (?,?,?,?,?);",array($_POST["nombre"],$_POST["apellidos"],$_POST["email"],$_POST["telefono"],$_POST["nombre"].".".pathinfo($_FILES["manual"]["name"], PATHINFO_EXTENSION)));

                if ($crearCategoria === 1062) {
                    
                    $_SESSION["errorNombre"]=erroresInsertar(1062,array("nombre"));
                    unlink($rutaDestino);

                } else {
                    
                    $_SESSION["exito"] = "Manual enviado con exito";

                }

            } else {
                
                $_SESSION["errorManual"] = "Error al subir el manual. Intentelo más tarde";

            }

        } else {
            
            $_SESSION["errorManual"] = "El manual no debe pesar más de 32Mb y debe tener los formatos: PDF, DOC o DOCX";
        }
    }
}
redireccionar("../formularioCrearHerramienta.php");
?>