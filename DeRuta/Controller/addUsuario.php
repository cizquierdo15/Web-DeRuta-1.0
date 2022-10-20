<?php
   //comprobar si me han mandado el post
    if(isset($_POST['Entrar'])){
        //include_once '../Model/Usuario.php';
        include_once '../Model/funcionesBD.php';
        include_once '../Controller/validarEmail.php';
        //ver si los imput estan vacios o no
       if (isset($_POST['usuario']) && ($_POST['usuario']!="")) {
                $rusuario= $_POST['usuario'];
                if(usuarioRepetido($rusuario)){
                    echo'<script type="text/javascript">
                           alert("Usuario repetido. Prueba con otro usuario");
                           window.location.href="../Controller/addUsuario.php";
                          </script>';
                    exit();      
                }
        }
       if (isset($_POST['pass']) && ($_POST['pass']!="")) {
                $rpass= $_POST['pass'];
               	$rpass = hash('sha512' , $rpass);
        }
       if (isset($_POST['email']) && ($_POST['email']!="")) {
                $remail= $_POST['email'];
                $remail=validarEmail($remail);
        }
       if (isset($_POST['nombre']) && ($_POST['nombre']!="")) {
                $rnombre= $_POST['nombre'];
                $rapellido= $_POST['apellidos'];

                //crear objeto de usuario
                $usuario = new Usuario();
                $usuario->setLogin($rusuario);
                $usuario->setPassword($rpass);
                $usuario->setEmail($remail);
                $usuario->setNombre($rnombre);
                $usuario->setApellidos($rapellido);
                $usuario->setTipo(1);

                //crear usuario en DB
                if(agregarUsuario($usuario->getLogin(),$usuario->getNombre(),$usuario->getApellidos(),$usuario->getPassword(),$usuario->getEmail())){
                    
                     echo'<script type="text/javascript">
       					   alert("Usuario creado.");
        				   window.location.href="../Controller/index.php";
        				  </script>';
                    
                    exit();
                }else{
                    echo 'No se ha podido crear el usuario';
                }
        }

    }
    //sino mostrar el formulario de registro
    else{
?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>DeRuta</title>
			<link rel="stylesheet" href="../View/css/estilos.css">
		</head>
<?php

        // Carga el Formulario
        include '../View/form_Registro.php';
    
        // Carga el pie de pagina
        include '../View/footer.php';

    }

?>

