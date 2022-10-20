<?php
//incluir los archivos
	include_once 'cabecera.php';
	include_once '../Model/Ruta.php'; 
	include_once '../Model/funcionesBD.php';
	include_once '../Model/Comentarios.php';
	include "../Controller/controlAdmin.php";

if ($Susuario) {
	

	$datosObjetos = getDatosRutaObjeto();

	//Carga todas las rutas

	?>

	<h2 id="eliminar">Selección de rutas a eliminar</h2>

	<?php

	foreach ($datosObjetos as $valor) { 
?>

		<!-- Muestra todas las rutas -->
	
		<div class="datoseliminar">
			<div>
				<p><b>Ruta: </b><?php echo ($valor->nombre);?></p>
				<p><b>Distancia </b><?php  echo ($valor->distancia);?> kms.</p>
				<p><b>Dificultad </b><?php  echo ($valor->dificultad)?></p>
				<p><b>Ubicación </b><?php  echo ($valor->ubicacion)?></p>
				<p><b>Media puntos: </b><?php  echo (getMediaPuntos($valor->cod_ruta))?></p>	
			</div>
			<br>
			<div>
				<?php $srcImg="images/"; echo "<IMG src=\"".$srcImg.$valor->imagen."\"/>"; ?>
			</div>
			<br>
			<!-- Se crea un formulario para seleccionar las rutas a eliminar -->

			<form action="../Controller/borrarRuta.php" method="POST">

				<input type="checkbox" name="rutas[]" id="eliminar" value="<?php echo ($valor->cod_ruta);?>">
				<input type="submit" name="borrar" value="Eliminar Ruta">
				
			</form>	
		</div>

	<?php		
	}
		
}
else{
	echo'<script type="text/javascript">
                           alert("No estas logueado");
                           window.location.href="../Controller/index.php";
                          </script>';
}