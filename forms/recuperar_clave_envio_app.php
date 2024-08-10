  <?php
  require 'ENVIAR_CORREOS/PHPMailer.php';
  require 'ENVIAR_CORREOS/SMTP.php';
  require 'ENVIAR_CORREOS/Exception.php';
  require 'ENVIAR_CORREOS/OAuth.php';

  include ("../config/config.php");
  $fecha=date('Y-m-d');

  $cedula= $_POST['cedula'];
  $email= $_POST['correo'];

  $consulta3=mysqli_query($con,"SELECT * from paciente P WHERE identificacion='$cedula' and correo='$email' and estado='1'");
  $nrow3=mysqli_num_rows($consulta3);
  if ($nrow3>0) {
    $row3=mysqli_fetch_assoc($consulta3);
    $clave=$row3['paciente_clave'];
    $cedu=$row3['identificacion'];
    $correo=$row3['correo'];

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
    $mail->Subject = 'Restauracion de Contraseña';
    $mail->Body = "<div style='padding:5px;'> <br> usuario : ".$cedu."<br><br>Contraseña: ".$clave."  <br> <br>   INGRESAR: <a href='http://laboratoriololy.com/forms/login.php'>http://laboratoriololy.com/forms/login.php</a> <br> </div>";
    //$mail->addAttachment('/levox2.png', 'My uploaded file'); <img src='/levox2.png' width='150' height='110'>
    $mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
    $mail->IsHTML(true);

    if (!$mail->send())
    {
    
    }
    else
    {
    header("Location:http://laboratoriololy.com/forms/recuperar_clave_app.php");
    	
    }
    header("Location:http://laboratoriololy.com/forms/recuperar_clave_app.php");


  }


  ?>
