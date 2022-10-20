<?php
    // Comprueba que es el usuario ADMIN, sino redirige a la galería y muestra un mensaje de error
    if($Susuario->getTipo() !== '2') {
        echo'<script type="text/javascript">
                           alert("Acceso exclusivo a administradores");
                           window.location.href="main.php";
                          </script>';;
        exit();
    }