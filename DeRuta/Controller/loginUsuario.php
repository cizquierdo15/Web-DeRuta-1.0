<?php
    //iniciamos la sesion
    session_start();
   //comprobar si me han mandado el post
    if(isset($_POST['Entrar'])){
        include_once '../Model/funcionesBD.php';
        //ver si los imput estan vacios o no
       if (isset($_POST['usuario']) && ($_POST['usuario']!="")) {
                $rusuario= $_POST['usuario'];
        }
       if (isset($_POST['pass']) && ($_POST['pass']!="")) {
                $rpass= $_POST['pass'];
                $rpass = hash('sha512' , $rpass);
               

                //comprobar usuario en DB
                if(comprobarUsuario($rusuario, $rpass)){
                    
                    $codUsu = getIdUsuario($rusuario);
                    $id = $codUsu[0]['cod_usuario'];

                    $usuario = getDatosUsu($id);
                    //serializar el obj
                    $objserializado = serialize($usuario);

                    //meter datos usuario en $_sesion 
                      //crear variables de sesion
                      $_SESSION["user"] = $objserializado;
              


                    echo'<script type="text/javascript">
                           alert("Login Correcto");
                           window.location.href="../View/main.php";
                          </script>';
                    //si existe recojo los datos del usuario
                   // header('Location: index.php');
                    exit();
                }else{
                    echo'<script type="text/javascript">
                           alert("Usuario y/o pass incorrectos");
                           window.location.href="loginUsuario.php";
                          </script>';
                }
        }
    }

    //si no mostrar el formulario de registro
    else{
?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>DeRuta</title>
			<link rel="stylesheet" href="../View/css/estilos.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
			<!--RECORDAR QUE LA RUTA CSS CAMBIA -->
		</head>
<?php

        // Carga el Formulario
        include '../View/form_Acceso.php';
    
        // Carga el pie de pagina
        include '../View/footer.php';

    }

?>