<?php


 	include_once '../Model/funcionesBD.php';
	include_once "cabecera.php";

	if($Susuario){
 	
?>
	
		<div class=contacto>

			<h2>Contacta con nostros</h2>

			<form method="POST" action="../Controller/archivoMail.php" class="form">
				<div>
					<label for="name">Nombre:</label>
					<input type="text" name="name" id="name">
				</div>
				<div>
					<label for="email">Email:</label>
					<input type="email" name="email" id="email">
				</div>	
				<div>
					<label for="mensaje">Mensaje:</label>
					<textarea name="mensaje" id="mensaje" rows="8" cols="20"></textarea>
				</div>
				<div>	
					<input type="submit" value="Enviar correo">
				</div>	
			</form>
		</div>
<?php

	}else{
		echo'<script type="text/javascript">
                           alert("No estas logueado");
                           window.location.href="../Controller/index.php";
                          </script>';
	}
?>