<?php
	//incluye la cabecera
	include "../View/cabecera.php";
?>
	<section>

		<?php
		$ruta = "../View/images/";  

		/*Ponemos la ruta de las fotos, escapando la barra y luego creamos la ruta con el nombre real del archivo*/

		$ruta = $ruta.$_FILES['foto_subida']['name'];   

		include "funcionesBD.php";

		$tipo = $_FILES['foto_subida']['type'];
		if(!((strpos($tipo, "jpg") || strpos($tipo, "png") || strpos($tipo, "gif") || strpos($tipo, "jpeg")))){
			echo '<h2>Solo se permiten archivos .jpeg, .gif, .jpg, .png. </h2>';

			/*Aquí solo permitimos archivos de tipo imagen y estos en concreto*/

		}else{
			if(move_uploaded_file($_FILES['foto_subida']['tmp_name'], $ruta)) {  

				/*Si hemos movido correctamente el archivo a la ruta indicada empezamos la magia de las bases de datos*/
				
				if(isset ($_POST['nombre'])){
					añadirRuta($_POST['nombre'],$_POST['distancia'],$_POST['ubicacion'],$_POST['Dificultad'], $_FILES['foto_subida']['name']);

				}
				//Si le ponemos la ruta que ya sabemos y  el nombre del archivo original, así no se tienen que usar regex para saber la ruta correcta.
								
				echo'<script type="text/javascript">
        alert("Ruta introducida");
        window.location.href="../View/form_Ruta.php";
        </script>';
				
        	//si no se ha conseguido mover el archivo
			} else{  
				echo "Archivo no subido, inténtalo de nuevo";  
			}
		}	  
		?>

	</section>
	
<?php
	//incluye el pie
	include "../View/footer.php";
?>