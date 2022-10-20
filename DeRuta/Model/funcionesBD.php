<?php
	//acceso bd incluye la conf de base de datos desde el archivo xml
	include_once "accesoBD.php";
	//se incluye la clase de usuario ya que se necesitara crear un objeto en alguna funcion
	include_once "Usuario.php";

	//conexion a la BD
	function conectarADB(){
		//variables
		global $dbhost;
		global $dbname;
		global $dbusu;
		global $dbpass;
		//iniciamos la conex
		try {
			$dbcon = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusu,$dbpass, array(PDO::ATTR_PERSISTENT => true));
			//si se conecta Establece los atributos en el manejador de la BD
			$dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e) {
			echo "Fallo al conectar en la db ". $e->getMessage();
			die();
		}
		return $dbcon;
	}

	//FUNCIONES USUARIO------------------------------------------------------

	//Devuelve el usu y pass del usuario con el codigo que se pasa
	function getUsuyPass($cod_usuario){
			$dbcon= conectarADB();
			try {
				//prepara la sentencia
				$sql= "SELECT usuario, pass FROM usuarios WHERE cod_usuario = ?";
				$consulta=$dbcon->prepare($sql);
				//poner parametros
				$consulta->bindParam('1',$cod_usuario);
				//por cada ? , un elemento del array si se ejecuta la consulta hay un resultado
				if($consulta->execute()){
					//fetchAll() devuelve array contiene todas las filas de resultados. O vacio si son 0 resultados, false
					$respuesta=$consulta->fetchAll();
					$dbcon=null;
				}
					
			} catch (Exception $e) {
				//si falla vuelve atras antes de hacer la transaccion
				$dbcon->rollBack();
				echo "Fallo ".$e->getMessage();
				die();
			}
			return ($respuesta);
	}

	//funcion que devuelve el usuario
	function getUsu($cod_usuario){
			$dbcon= conectarADB();
			try {
				//prepara la sentencia
				$sql= "SELECT usuario FROM usuarios WHERE cod_usuario = ?";
				$consulta=$dbcon->prepare($sql);
				//poner parametros
				$consulta->bindParam('1',$cod_usuario);
				//por cada ? , un elemento del array si se ejecuta la consulta hay un resultado
				if($consulta->execute()){
					//fetchAll() devuelve array contiene todas las filas de resultados. O vacio si son 0 resultados, false
					$respuesta=$consulta->fetchAll();
					$dbcon=null;
				}
					
			} catch (Exception $e) {
				//si falla vuelve atras antes de hacer la transaccion
				$dbcon->rollBack();
				echo "Fallo ".$e->getMessage();
				die();
			}
			return ($respuesta);
	}

	//funcion que devuelve el tipo del cod usuario que se le pasa 
	function getTipoUsu($cod_usuario){
			$dbcon= conectarADB();
			try {
				//prepara la sentencia
				$sql= "SELECT tipo FROM usuarios WHERE cod_usuario = ?";
				$consulta=$dbcon->prepare($sql);
				//poner parametros
				$consulta->bindParam('1',$cod_usuario);
				//por cada ? , un elemento del array si se ejecuta la consulta hay un resultado
				if($consulta->execute()){
					//fetchAll() devuelve array contiene todas las filas de resultados. O vacio si son 0 resultados, false
					$respuesta=$consulta->fetchAll();
					$dbcon=null;
				}
					
			} catch (Exception $e) {
				//si falla vuelve atras antes de hacer la transaccion
				$dbcon->rollBack();
				echo "Fallo ".$e->getMessage();
				die();
			}
			return ($respuesta);
	}

	//get fecha de borrado del usuario
	function getFBorrado($cod_usuario){
			$dbcon= conectarADB();
			try {
				//prepara la sentencia
				$sql= "SELECT fecha_borrado FROM usuarios WHERE cod_usuario = ?";
				$consulta=$dbcon->prepare($sql);
				//poner parametros
				$consulta->bindParam('1',$cod_usuario);

				if($consulta->execute()){
					$respuesta=$consulta->fetchAll();
					$dbcon=null;
				}
					
			} catch (Exception $e) {
				//si falla vuelve atras antes de hacer la transaccion
				$dbcon->rollBack();
				echo "Fallo ".$e->getMessage();
				die();
			}
			return ($respuesta);
	}

	//devuelve el id del usuario con el nombre del usuario
	function getIdUsuario($usuario){
			$dbcon= conectarADB();
			try {
				//prepara la sentencia
				$sql= "SELECT cod_usuario FROM usuarios WHERE usuario = ?";
				$consulta=$dbcon->prepare($sql);
				//poner parametros
				$consulta->bindParam('1',$usuario);

				if($consulta->execute()){
					$respuesta=$consulta->fetchAll();
					$dbcon=null;
				}
					
			} catch (Exception $e) {
				//si falla vuelve atras antes de hacer la transaccion
				$dbcon->rollBack();
				echo "Fallo ".$e->getMessage();
				die();
			}
			return ($respuesta);
	}

	//comprueba usuario, comprueba si el usuario existe en la BD y no esta borrado
	function comprobarUsuario($nusuario, $pass){
		$dbcon= conectarADB();
		$respuesta=false;
		try {
			$sql="SELECT usuario , pass FROM usuarios WHERE usuario=? AND pass=? AND fecha_borrado is null";
			$consulta = $dbcon->prepare($sql);
			$mono = $nusuario;
			$consulta -> bindParam('1',$nusuario);
			$consulta -> bindParam('2',$pass);
			

			if ($consulta->execute()) {
				$respuesta=$consulta->fetchAll();
				$dbcon=null;
			}

		} catch (Exception $e) {
				//si falla vuelve atras antes de hacer la transaccion
				$dbcon->rollBack();
				echo "Fallo ".$e->getMessage();
				die();
			}
		return ($respuesta);
	}

	//Comprobar si el usuario existe en la DB 
	//AND fecha_borrado is null

	function usuarioRepetido($nusuario){
        $dbcon= conectarADB();
        $respuesta=false;
        try {
            $sql="SELECT usuario FROM usuarios WHERE usuario=? AND fecha_borrado is null";
            $consulta = $dbcon->prepare($sql);

            $consulta -> bindParam('1',$nusuario);

            if ($consulta->execute()) {
                $respuesta=$consulta->fetchAll();
                $dbcon=null;
            }

        } catch (Exception $e) {
                //si falla vuelve atras antes de hacer la transaccion
                $dbcon->rollBack();
                echo "Fallo ".$e->getMessage();
                die();
            }
        return ($respuesta);
    }

	//fucion agrega usuario a la BD
	function agregarUsuario($usuario,$nombre,$apellidos,$pass,$email){
		//variable a retornar, si agrega el usu cambia a true
		$respuesta=false;
		//por defecto son tipo 1, es el tipo de usu basico
		$tipo=1;
		$dbcon= conectarADB();
		try {
			//prepara la sentencia
			$sql = "INSERT INTO usuarios (usuario, nombre, apellidos, pass, tipo, email) VALUES (?, ?, ?, ?, ?, ?)";
			$consulta=$dbcon->prepare($sql);
			//pasamos los parametros
			$consulta->bindParam('1',$usuario);
			$consulta->bindParam('2',$nombre);
			$consulta->bindParam('3',$apellidos);
			$consulta->bindParam('4',$pass);
			$consulta->bindParam('5',$tipo);
			$consulta->bindParam('6',$email);

			if($consulta->execute()){
				$respuesta=true;
				//$consulta->close();			
				$dbcon=null;
			}
		} catch (Exception $e) {
			//si falla vuelve atras antes de hacer la transaccion
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $respuesta;		
	}

	//funcion datos usuario
	function getDatosUsu($id){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM usuarios WHERE cod_usuario =?";
			//por cada ? , un elemento del array si se ejecuta la consulta guarda los resultados en un array
			$consulta=$dbcon->prepare($sql);
			$consulta->bindParam('1', $id);
			if ($consulta->execute()) {
				$guarda=$consulta->fetchAll();
				$objusu = new Usuario();
				$objusu -> setId($guarda[0]['cod_usuario']);
				$objusu -> setLogin($guarda[0]['usuario']);
				$objusu -> setNombre($guarda[0]['nombre']);
				$objusu -> setApellidos($guarda[0]['apellidos']);
				$objusu -> setTipo($guarda[0]['tipo']);
				$objusu -> setEmail($guarda[0]['email']);

				$dbcon=null;
			}			
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $objusu;
	}

	//funcion borrar usuario
	function borrarUsuario($cod_usu){
		//variable a retornar, si agrega el usu cambia a true
		$respuesta=false;
		$dbcon = conectarADB();
		try {
			//Preparar sentencia
			$sql = "UPDATE usuarios SET fecha_borrado= current_timestamp WHERE cod_usuario=?";
			$consulta = $dbcon->prepare($sql);
			//pasar parametros
			$consulta->bindParam('1',$codigo);

			$codigo=$cod_usu;

			if ($consulta->execute()) {
				$respuesta = true;
				$dbcon=null;
			}		
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Error ".$e->getMessage();
			die();
		}
		return $respuesta;
	}

	//FUNCIONES RUTA----------------------------------------------------------


	//funcion crea una ruta en la DB
	function añadirRuta($nombre,$distancia,$ubicacion,$dificultad, $imagen){
		//variable a retornar, si agrega el usu cambia a true
		$respuesta=false;
		$dbcon = conectarADB();
		try {
			//Preparar sentencia
			$sql = "INSERT INTO rutas (nombre , distancia, ubicacion, dificultad, imagen) VALUES (?, ?, ?, ?, ?)";
			$consulta = $dbcon->prepare($sql);
			//pasar parametros
			$consulta->bindParam('1',$nombre);
			$consulta->bindParam('2',$distancia);
			$consulta->bindParam('3',$ubicacion);
			$consulta->bindParam('4',$dificultad);
			$consulta->bindParam('5',$imagen);

			if ($consulta->execute()) {
				$respuesta = true;
				$dbcon=null;
			}
			
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Error ".$e->getMessage();
			die();
		}
		return $respuesta;
	}

	//funcion get datos ruta devuelve array con todos los datos de la ruta que queramos
	function getDatosRuta($id){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM rutas WHERE cod_ruta =?";
			$consulta=$dbcon->prepare($sql);
			
			if($consulta->execute()){
				$guarda=$consulta->fetchAll(PDO::FETCH_ASSOC);	
				$dbcon=null;	
			}
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	//funcion get datos ruta devuelve un array objeto de bd con todos los datos de las rutas que hay en la tabla, cada objeto es una ruta

	function getDatosRutaObjeto(){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM rutas WHERE fecha_borrado is null";
			$consulta=$dbcon->prepare($sql);
			
			if($consulta->execute()){
				$guarda=$consulta->fetchAll(PDO::FETCH_OBJ);	
				$dbcon=null;	
			}
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	function getDatosRutaObjetoBusqueda($ruta){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM rutas WHERE fecha_borrado is null and nombre = ?";
			$consulta=$dbcon->prepare($sql);
			
			if($consulta->execute()){
				$guarda=$consulta->fetchAll(PDO::FETCH_OBJ);	
				$dbcon=null;	
			}
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}


	// BUSCADOR NOMBRE RUTA

	function getRuta(){
		$dbcon= conectarADB();
		try {
			$sql="SELECT nombre FROM rutas WHERE fecha_borrado is null";
			$consulta=$dbcon->prepare($sql);
			
			if($consulta->execute()){
				$guarda=$consulta->fetchAll(PDO::FETCH_ASSOC);	
				$dbcon=null;	
			}
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	//FILTRAR RUTAS DIFICULTAD FACIL

	function getRutasFaciles(){
				$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM rutas WHERE dificultad =? AND fecha_borrado is null";
			$consulta=$dbcon->prepare($sql);
			if ($consulta->execute(array('facil'))) {
				$guarda=$consulta->fetchAll();
				$dbcon=null;
			}		
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}


	//FILTRAR RUTAS DIFICULTAD MODERADA
	function getRutasModeradas(){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM rutas WHERE dificultad =? AND fecha_borrado is null";
			$consulta=$dbcon->prepare($sql);
			if ($consulta->execute(array('moderada'))) {
				$guarda=$consulta->fetchAll();
				$dbcon=null;
			}	
			
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	//FILTRAR RUTAS DIFICULTAD DIFICIL
	function getRutasDificiles(){
			$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM rutas WHERE dificultad =? AND fecha_borrado is null";
			$consulta=$dbcon->prepare($sql);
			if ($consulta->execute(array('dificil'))) {
				$guarda=$consulta->fetchAll();
				$dbcon=null;
			}	
			
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}
	//funcion Devuelve la url de la IMG
	function getUrlImagen($cod_ruta){
		$dbcon=conectarADB();
		try {
			$sql="SELECT imagen FROM rutas WHERE cod_ruta=?";
			$consulta=$dbcon->prepare($sql);

			$consulta=bindParam('1',$cod_ruta);

			//$codigo=$cod_ruta;
			if ($consulta->execute()) {
				$guarda= $consulta->fetchAll();
				$dbcon=null;
			}

		}catch (Exception $e) {
			$dbcon->rollBack();
			echo "Error ".$e->getMessage();
			die();
		}
		return $respuesta;
	}
	//funcion añadir imagen a ruta
	//añadir ruta imagen en la db
	function añadirImagenRuta($cod_ruta, $ruta_img){
		//variable a retornar, si agrega el usu cambia a true
		$respuesta=false;
		$dbcon = conectarADB();
		try {
			//Preparar sentencia
			$sql = "UPDATE comentarios SET imagen=? WHERE cod_ruta=?";
	
			$consulta = $dbcon->prepare($sql);
			//pasar parametros
			$consulta->bindParam('1',$url);
			$consulta->bindParam('2',$codigo);

			$url=$ruta_img;
			$codigo=$cod_ruta;

			if ($consulta->execute()) {
				$respuesta = true;
				$dbcon=null;
			}		
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Error ".$e->getMessage();
			die();
		}
		return $respuesta;
	}

	//funcion borrar ruta
	function borrarRuta($cod_ruta){
		//variable a retornar, si agrega el usu cambia a true
		$respuesta=false;
		$dbcon = conectarADB();
		try {
			//Preparar sentencia
			$sql = "UPDATE rutas SET fecha_borrado= current_timestamp WHERE cod_ruta=?";
			$consulta = $dbcon->prepare($sql);
			//pasar parametros
			$consulta->bindParam('1',$codigo);

			$codigo=$cod_ruta;

			if ($consulta->execute()) {
				$respuesta = true;
				$dbcon=null;
			}		
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Error ".$e->getMessage();
			die();
		}
		return $respuesta;
	}

	//FUNCIONES COMENTARIOS----------------------------------------------------

	//FUNCION CREAR COMENTARIO

	//esta funcion agrega un comentario a la db
	function insertarComentario($cod_ruta, $cod_usuario, $contenido, $puntos){
			//por defecto el valor de la respuesta es false, cambia si se agrega correctamente
			$respuesta=false;
			$dbcon = conectarADB();
			try {
				//Preparar sentencia
				$sql = "INSERT INTO comentarios (cod_ruta, cod_usuario, contenido, puntos) VALUES (?, ?, ?, ?)";
				$consulta = $dbcon->prepare($sql);
				//pasar parametros
				$consulta->bindParam('1',$cod_ruta);
				$consulta->bindParam('2',$cod_usuario);
				$consulta->bindParam('3',$contenido);
				$consulta->bindParam('4',$puntos);

				if ($consulta->execute()) {
					$respuesta = true;
					$dbcon=null;
					echo "Comentario guardado!";
				}

			} catch (Exception $e) {
				//$dbcon->rollBack();
				echo "Error ".$e->getMessage();
				die();
			}
			return $respuesta;
		}

	//funcion para editar un comentario existente
	function modificarComentario($contenido,$cod_comentario){
		//variable a retornar, si agrega ejecuta correctamente cambia a true
		$respuesta=false;
		$dbcon = conectarADB();
		try {
			//Preparar sentencia
			$sql = "UPDATE comentarios SET contenido=?, fecha_modificacion= current_timestamp WHERE cod_comentario=?";
			$consulta = $dbcon->prepare($sql);
			//pasar parametros
			$consulta->bindParam('1',$texto);
			$consulta->bindParam('2',$codigo);

			$texto=$contenido;
			$codigo=$cod_comentario;

			if ($consulta->execute()) {
				$respuesta = true;
				$dbcon=null;
			}		
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Error ".$e->getMessage();
			die();
		}
		return $respuesta;
	}

	//funcion get Comentario, coge los datos del comentario seleccionado en forma de un array
	function getDatosComentario($cod_comentario){
		$dbcon= conectarADB();
		try {
			$sql= "SELECT * FROM comentarios WHERE cod_comentario= '$cod_comentario'";
			$conexion=$dbcon->query($sql);
			$guarda= $conexion->fetchAll();
			$dbcon=null;
			
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	//funcion get Comentarios, coge todos los datos de los comentarios los devuelve en forma de un array de objetos de la bd, cada objeto es un comentario
	function getComentarios(){
		$dbcon= conectarADB();
		try {
			$sql= "SELECT * FROM comentarios";
			$conexion=$dbcon->query($sql);
			$guarda= $conexion->fetchAll(PDO::FETCH_OBJ);
			$dbcon=null;
			
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	//get puntuacion de un comentario seleccionado
	function getPuntosComentario($cod_comentario){
		$dbcon= conectarADB();
		try {
			$sql= "SELECT puntos FROM comentarios WHERE cod_comentario= ?";
			$conexion=$dbcon->prepare($sql);
			$conexion->bindParam('1', $cod_comentario);
			if ($conexion->execute()) {
				$guarda= $conexion->fetchAll();
				$dbcon=null;
			}
			
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	//get media puntos de un comentario, seleccionandolo por el codigo de la ruta
	function getMediaPuntos($cod_ruta){
		$dbcon= conectarADB();
		try {
			$sql= "SELECT COUNT(*) FROM comentarios WHERE cod_ruta= ?";
			$conexion=$dbcon->prepare($sql);
			$conexion->bindParam('1', $cod_ruta);
			if ($conexion->execute()) {
				//consigo el numero de comentarios que hay con ese ocd ruta
				$numcoments= $conexion->fetchAll();
				if ($numcoments[0][0] > 0) {
					//coseguir los puntos que tiene la ruta con cada comentario
					$puntos = getPuntosDeRuta($cod_ruta);
					$total=0;
					foreach ($puntos as  $value) {
						$total = $total + $value['puntos'];
					}
					//conseguir la media
					$media = floor($total / $numcoments[0] [0]);

					$dbcon=null;
				}else{
					$media= 0;
				}
			}
			
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $media;
	}

	//get puntos de una ruta en concreto
	function getPuntosDeRuta($cod_ruta){
		$dbcon= conectarADB();
		try {
			$sql= "SELECT puntos FROM comentarios WHERE cod_ruta= ?";
			$conexion=$dbcon->prepare($sql);
			$conexion->bindParam('1', $cod_ruta);
			if ($conexion->execute()) {
				$guarda= $conexion->fetchAll();
				$dbcon=null;
			}
			
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	//puntuar comentario
	function puntuarComentario($num,$cod_comentario){
		//variable a retornar, si agrega el usu cambia a true
		$respuesta=false;
		$puntos=getPuntosComentario($cod_comentario);
		$total=$puntos[0]['puntos']+$num;
		$dbcon = conectarADB();
		try {
			//Preparar sentencia
			$sql = "UPDATE comentarios SET puntos= '$total' WHERE cod_comentario= '$cod_comentario'";
			$consulta = $dbcon->prepare($sql);
			//pasar parametros
			$consulta->bindParam('1',$total);
			$consulta->bindParam('2',$cod_comentario);

			if ($consulta->execute()) {
				$respuesta = true;
				$dbcon=null;
			}		
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Error ".$e->getMessage();
			die();
		}
		return $respuesta;
	}

	//eliminar comentario, cambia la fecha de borrado a la acctual
	function borrarComentario($cod_comentario){
		//variable a retornar, si agrega el usu cambia a true
		$respuesta=false;
		$dbcon = conectarADB();
		try {
			//Preparar sentencia
			$sql = "UPDATE comentarios SET fecha_borrado= current_timestamp WHERE cod_comentario=?";
			$consulta = $dbcon->prepare($sql);
			//pasar parametros
			$consulta->bindParam('1',$codigo);

			$codigo=$cod_comentario;

			if ($consulta->execute()) {
				$respuesta = true;
				$dbcon=null;
			}		
		} catch (Exception $e) {
			$dbcon->rollBack();
			echo "Error ".$e->getMessage();
			die();
		}
		return $respuesta;
	}
?>