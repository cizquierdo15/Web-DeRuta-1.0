
<?php
	session_start();
	include_once "../Model/Usuario.php";

  	include_once "head.php";
  	

  	/*Se unserializa de la variable sesión USER para recuperar el objeto Usuario, previamente
  	recuperado desde BBDD*/

  	if (isset($_SESSION['user'])) {
  		$Susuario=unserialize($_SESSION['user']);
  	
?>

		<header>
			<nav class="menu">
			    <ul>
			        <li><a href="../View/main.php">Consultar Rutas</a></li>

			<?php
			        if ($Susuario->getTipo()=='2') { /*Si el tipo de usuario es el 2 admin*/
						
						echo "<li><a href='../View/form_Ruta.php'>Grabar Ruta</a></li>";
			        	echo "<li><a href='eliminarRuta.php'>Eliminar Ruta</a></li>";
			        }

			        if ($Susuario->getTipo()=='1') { /*Si el tipo de usuario es el 1 usuario*/
			
			        echo "<li><a href='form_Mail.php'>Contacto</a></li>";
			    	}

			?>
			        <li><a href="../Controller/close_Sesion.php">Cerrar sesion</a></li>
			    </ul>
			</nav>
		</header>
<?php
	}
	else{
		echo'<script type="text/javascript">
                           alert("No estas logueado");
                           window.location.href="../Controller/index.php";
                          </script>';
	}	