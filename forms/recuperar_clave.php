<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
    <title></title>
  </head>
  <style media="screen">
  body{
    background: rgb(238, 238, 238);
  }
    .cont_form{
      width: 100%;
      height: auto;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 10%;
    }
    .formul{
      width: 550px;
      height: auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 20px 10px;
      background: rgb(233, 233, 233);
      border-radius: 7px;
      box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.31);
    }
    .titu_formu{
      width: 90%;
      height: 35px;
      font-size: 20px;
      font-family: cursive;
      font-weight: bold;
      margin: 15px 0px;
      text-align: center;
    }
    .ctext{
      border: 0;
      width: 90%;
      height: 35px;
      border: 1px;
      border-radius: 5px;
      margin-bottom: 15px;
      padding-left: 15px;
      border: 1px solid rgb(135, 133, 133);

    }
    .acao3{
      width: 85%;
      background: #17b4b6;
      color:#ffffff;
      text-transform: uppercase;
      border: 1px solid #156f70;
      font-weight: bold;
      padding: 12px 0;
      float: left;
      border-radius: 6px;
      margin-top: 20px;
    }
    .acao3:hover{
      background:#268687;
      border: 1px solid #03cbcd;
      box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.17);
      cursor: pointer;
    }

    .cancelar{
      display: block;
      width: 85%;
      height: 40px;
      background: #c73131;
      color:#ffffff;
      border: 1px solid #6c0b0b;
      font-family: inherit;
      font-weight: bold;
      display: flex;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      border-radius: 6px;
      margin-top: 20px;
    }
    .cancelar:hover{
      background:#7d0c0c;
      border: 1px solid #ee1818;
      box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.17);
      cursor: pointer;
    }
    .login100-form-btn-cancelar a{
      text-decoration: none;
      color: white;
    }
  </style>
  <body>
      
      <?php
      if (isset($_POST['cedula'])) {
         include('recuperar_clave_envio.php');
      }
     ?>
     <div class="cont_form">

       <form class="formul" action="" method="post">
        <label class="titu_formu">Recupera Contraseña</label>
        <input type="text" class="ctext" name="cedula" maxlength="13" value="" placeholder="IDENTIFICACIÓN" required autocomplete="off">
        <input type="text" class="ctext" name="correo" value="" placeholder="CORREO" required autocomplete="off">


        <div class="wrap-login40-form-btn-aceptar">
          <div class="login100-form-bgbtn-aceptar"></div>
            <input class="login100-form-btn-aceptar" type="submit" value="Guardar">
        </div>

        <div class="wrap-login40-form-btn-cancelar">
          <div class="login100-form-bgbtn-cancelar"></div>
          <a href="inicio.php" class="txt2">
            <button type="button" name="botones" id="botones" class="login100-form-btn-cancelar">
              <a href="login.php" class="login100-form-btn-cancelar">Cancelar</a>
            </button>
          </a>
        </div>
        
       </form>
     </div>
  </body>
</html>
