<?php
require '../ENVIAR_CORREOS/PHPMailer.php';
require '../ENVIAR_CORREOS/SMTP.php';
require '../ENVIAR_CORREOS/Exception.php';
require '../ENVIAR_CORREOS/OAuth.php';

$cedula = $_REQUEST["cedula"];
$clave = $_REQUEST["clave"];
$correo = $_REQUEST["correo"];

  $mail = new PHPMailer\PHPMailer\PHPMailer();

  $mail->isSMTP();
  /*
  Enable SMTP debugging
  0 = off (for production use)
  1 = client messages
  2 = client and server messages
  */
  $mail->SMTPDebug = 0;
  $mail->Host = 'mail.laboratoriololy.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "info@laboratoriololy.com";
  $mail->Password = "Informacion_2020*";
  $mail->setFrom('info@laboratoriololy.com', 'Lab. LOLY');
  $mail->addAddress($correo, 'Lab. Loly'); // $correo_cli
  $mail->Subject = 'Asignación de Contraseña';
  $mail->Body = "<div style='padding:5px;'> <br> usuario : ".$cedula."<br><br>Contraseña: ".$clave."  <br> <br>   INGRESAR: <a href='http://laboratoriololy.com/forms/login.php'>http://laboratoriololy.com/forms/login.php</a> <br> </div>";
  //$mail->addAttachment('/levox2.png', 'My uploaded file'); <img src='/levox2.png' width='150' height='110'>
  $mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
  $mail->IsHTML(true);

  if (!$mail->send())
  {
  	//echo "Error al enviar el E-Mail: ".$mail->ErrorInfo;
  }
  else
  {
  
  }




?>
