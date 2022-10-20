<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$pathPHPMailer = "/opt/lampp/htdocs/DWES/SegundaEvaluacion/MailPHP";
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
require("PHPMailer/src/Exception.php");

//capturamos el mensaje que nos deja el usuario en una variable
$contenido=$_POST['mensaje'];

//capturamos nombre del usuario en una variable
$nombre=$_POST['name'];

//Creamos el objeto PHPMailer
$mail = new PHPMailer();

$mail->isSMTP();

$mail->SMTPDebug = SMTP::DEBUG_OFF;

//Host
$mail->Host = 'smtp.gmail.com';

//Puerto
$mail->Port = 587;


$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;


$mail->SMTPAuth = true;

//Nuestra cuenta de Gmail(CAMBIAR CUANDO TENGAMOS CUENTA)
$mail->Username = 'DeRutaDAW@gmail.com';

//Nuestra contraseña de Gmail(CAMBIAR CUANDO TENGAMOS CUENTA)
$mail->Password = 'rutadaw2';

//Usuario que nos manda la consulta
$mail->setFrom('henochbu@gmail.com',$nombre);


//El mail del admin
$mail->addAddress('DeRutaDAW@gmail.com', 'Administrador');

//Subjet del correo
$mail->Subject = 'Contactar con el Admin';


//convertimos un HTML en texto plano
$mail->msgHTML($contenido);



//Comprobamos y notificamos si el mail se envia 
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo'<script type="text/javascript">
        alert("Correo enviado");
        window.location.href="../View/main.php";
        </script>';
}


