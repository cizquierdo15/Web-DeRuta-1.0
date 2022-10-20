<?php
//incluir los archivos
	include_once '../Model/Ruta.php'; 
	include_once '../Model/funcionesBD.php';
	include_once '../Model/Comentarios.php';

//Formulario de Búsqueda AJAX de nombre de Ruta

	include_once '../Model/buscador.php';


if ($Susuario) {

	//Se obtienen todas las Rutas y los Comentarios de la BD con la ayuda de sus funciones

	$datosObjetos = getDatosRutaObjeto();
	$arrayComentarios = getComentarios();



	//Carga todas las rutas

	foreach ($datosObjetos as $valor) { 
?>

		<!-- Muestra todas las rutas y al ser un objeto le pedimos en cada caso el acceso a sus propiedades para mostrar los valores-->

		<div class="datos">
			<a name= <?php echo str_replace(' ', '', $valor->nombre);?>><h2> Ruta: <?php echo ($valor->nombre);?></h2></a>
			
			<div class="info">
				<p><b>Distancia </b> <?php  echo ($valor->distancia);?> kms.</p>
				<p><b>Dificultad </b> <?php  echo ($valor->dificultad)?></p>
				<p><b>Ubicación </b> <?php  echo ($valor->ubicacion)?></p>

				<!-- Sacamos la media de puntos de todos los comentarios de cada ruta -->

				<div class="puntos"> <?php  echo (getMediaPuntos($valor->cod_ruta))?></div>	

			</div>

			<div class="imagen"> <?php $srcImg="images/"; echo "<IMG src=\"".$srcImg.$valor->imagen."\"/>"; ?> </div>

		<?php

			//Aquí usamos servicio web para obtener los datos en tiempo real de las localidades de las rutas

			require_once "../Controller/funcionRutaTiempo.php";

			$arrayTiempo = tiempoRuta($valor->ubicacion); 

			//obtenemos un array con los datos que hemos querido presentar y los mostramos en una lista

		?>

			<div class="clima">
				<ul>
					<li><?php echo "Temperatura <b>".$arrayTiempo[0]." grados</b><br>";?></li>
					<li><?php echo "Tº máx.  <b>".$arrayTiempo[1]." grados</b><br>"; ?></li>
					<li><?php echo "Tº mín.  <b>".$arrayTiempo[2]." grados</b><br>"; ?></li>
					<li><?php echo "Humedad <b>".$arrayTiempo[3]."%</b><br>"; ?></li>
					<li><?php echo "Cielo <b>".$arrayTiempo[4]." - ".$arrayTiempo[5]."</b><br>"; ?></li>
					<li><?php echo "Viento <b>".$arrayTiempo[6]." km/h</b><br>"; ?></li>
				</ul>

			</div>
			<div>

				<!-- Usamos un formulario para comentar la ruta, para que todo usuario pueda dejar constancia de su opinión o su puntuación-->

				<form action="form_Comentario.php" method="post">
					<input type="hidden" name="rutaComentada" id="rutaComentada" value="<?php echo $valor->nombre?>"/>
					<input type="hidden" name="codigoRuta" id="codigoRuta" value="<?php echo $valor->cod_ruta?>"/>

					<input type="submit" name="comentario" value="Comentar ruta"/>
				</form>
			</div>

		<?php

		// Siguiendo la estrategia anterior. Se cargan todos los comentarios. 

			foreach ($arrayComentarios as $valor_c) {

				//Si el comentario pertenece a la ruta lo muestra.

				if($valor_c->cod_ruta==$valor->cod_ruta){
					
					//Se muestra cada comentario y su información

					?>
					<div class="comentarios">

						<div>
							<p> Comentario de: <b><?php echo (" ".getUsu($valor_c->cod_usuario)[0]['usuario']);?></b></p>
							<p><?php echo ($valor_c->fecha_publicacion);?></p>
						</div>
						<div>
							<p><?php echo ($valor_c->contenido);?></p>
						</div>
						<div>	
							<p> Puntos: <?php echo ($valor_c->puntos);?></p>
						</div>	
					</div>	
				<?php	
				}
			}
		?>	
		</div>



		<!-- Con la siguiente instrucción, se carga el Javascript. Este código en JS actualiza la página cada 5 minutos, para ver la ínformación metereológica actualizada -->

		<script src="js/main.js"></script>
		<?php		
	}
}
else{
	echo'<script type="text/javascript">
                           alert("No estas logueado");
                           window.location.href="../Controller/index.php";
                          </script>';
}
?>		