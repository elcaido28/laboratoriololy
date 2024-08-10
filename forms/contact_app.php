<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="para_app/estilos_appcss">
    <script src="js/jquery.min.js"></script>
    <title></title>
  </head>
  <style media="screen">
  body{
    background: rgb(241, 241, 241);
  }
    .titulo3{
      width: 100%;
      height: auto;
      text-align: center;
      font-family: 'Acme', sans-serif;
    }
    .conten_if{
      width: 100%;
      height: auto;
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 20px;

      background: rgb(231, 231, 231);
    }
    .info{
      width: 100%;
      height: 60px;
      display: flex;
      flex-wrap: wrap;
    }
    .info h4{
      width: 90%;
      height: auto;
      padding-left: 9%;
    }
    .info p{
      width: 85%;
      height: auto;
      font-size: 12px;
      margin-top: -15px;
      padding-left: 15%;
    }
    .info i{
      color: rgb(67, 181, 154);
      margin-right: 10px;
    }
    .mapa{
      width: 100%;
      height: 300px;
      border: 1px solid rgb(19, 19, 19);
    }
    .mapa iframe{
      width: 100%;
      height: 100%;
    }
  </style>
  <body>
<h2 class="titulo3">Laboratorio Loly</h1>
  <div class="conten_if">
    <div class="info">
      <h4><i class="fas fa-home"></i>  Guayaquil, Ecuador</h4>
      <p>Km. 11 1/2 Vía a Daule (Peca)</p>
    </div>

    <div class="info">
      <h4><i class="fas fa-phone-alt"></i>  2586213</h4>
      <p>Lunes a Viernes: 9am a 5pm  - Sabados: 8am a 12 pm</p>
    </div>

    <div class="info">
      <h4><i class="far fa-envelope"></i> info@laboratoriololy.com</h4>
      <p>Envíenos su consulta en cualquier momento !</p>
    </div>
  </div>
  <div class="mapa">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.1403179136696!2d-79.93761558524493!3d-2.0993789984696223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d0d3dc7e82bb9%3A0xde772e9015f6701c!2sLaboratorio%20Cl%C3%ADnico%20Loly!5e0!3m2!1ses-419!2sec!4v1596741857184!5m2!1ses-419!2sec" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
  </body>
</html>
