<?php

require '../Model/Ruta.php';
include_once '../Model/funcionesBD.php';

//comprobar que nos envian datos
if(isset($_POST['borrar'])) {
	//comprobar que es un array
    if (is_array($_POST['rutas'])) {
    	//recorrer los valores y eliminar ruta seleccionada.
        foreach ($_POST['rutas'] as $valor) {

            borrarRuta($valor);
        }
    }
  
    header('Location: ../View/main.php');
    
}else{
    
?>

<p class="error"> Se ha producido un error sera redirigido a la pagina anterior en 5 segundos</p>

<?php

    header("refresh:4;url=../View/main.php");

}
?>