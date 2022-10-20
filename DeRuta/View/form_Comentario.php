<?php
	include '../Model/funcionesBD.php';
	include 'cabecera.php';

	//Si hemos recibido un post con el nombre de la ruta que queremos comentar, sacaremos el cod_ruta y cod_usuario para pasarlo a un insert posterior.

	
	if(isset($_POST['rutaComentada'])){
		$ruta=$_POST['rutaComentada'];
		$cod_ruta=$_POST['codigoRuta'];
		$cod_usuario=getIdUsuario($Susuario->getLogin())[0]['cod_usuario']; 

		?>

		<h2 class="coment"> Ruta: <?php echo $ruta ?></h2>

		<?php

	//En este formulario pedimos un comentario al usuario y una puntuación de la ruta que aparece encabezando la página.
?>

	<div class="puntuar">
		<form action="#" method="post" class="form" autocomplete="off">
			<div>
				<label for="comentario">Comentario:</label>
			</div>
			<div>	
				<textarea name="comentario" id="comentario" rows="8" cols="20"></textarea>
			</div>
			<div>
				<label for="puntos">Puntua la ruta: </label>
				<input type="text" name="puntos" size="4" list="puntos" required/>
				<datalist id="puntos" >
					<option value="5"></option>
					<option value="4"></option>
					<option value="3"></option>
					<option value="2"></option>
					<option value="1"></option>
					<option value="0"></option>
				</datalist>
			</div>	
			<input type="hidden" name="cod_ruta" id="cod_ruta" value="<?php echo $cod_ruta?>"/>
			<input type="hidden" name="cod_usuario" id="cod_usuario" value="<?php echo $cod_usuario?>"/>
			<br>

			<div>
				<input type="submit" value="Comentar"/>
			</div>
		</form>
	</div>	
<?php

	//pasaremos los datos recopilados a la misma página por el post de este formulario. Abajo en caso de que recibamos el POST de puntos, que es requerido, haremos un insert del comentario en la base de datos.

	} if ( isset ($_POST['puntos'])){

		insertarComentario($_POST['cod_ruta'], $_POST['cod_usuario'], $_POST['comentario'], $_POST['puntos']);

		echo "<br> <p>Accede a CONSULTAR RUTAS para ver el comentario</p>";


	
	}else {

			header ("main.php");



	}
?>