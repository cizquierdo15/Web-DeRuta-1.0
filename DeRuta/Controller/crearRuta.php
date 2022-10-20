<?php
require '../Model/Ruta.php';

//Comprobar si nos envian datos del formulario de añadir ruta
if (isset($_POST["añadirRuta"])) {
    //creamos ruta y la insertamos.
    $ruta = new Ruta($_POST["codigo"], $_POST["nombre"], $_POST["distancia"],$_POST["ubicacion"],$_POST["dificultad"]);
    
    $ruta->insert();
    
    header('Location: ../Controller/index.php');
    
} else {
    
    // Carga la cabecera
    include '../View/cabecera.php';

    // Carga el Formulario
    include '../View/form_Ruta.php';
    
    // Carga el pie de pagina
    include '../View/footer.php';

}


