<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
  	<script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kelly+Slab&display=swap" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="para_app/estilos_app.css">
    <script src="js/jquery.min.js"></script>
    <title></title>
  </head>
  <style media="screen">
  @import url('https://fonts.googleapis.com/css?family=Montserrat');

  h1 {
    text-align: center;
    margin: 2rem 0;
    font-size: 2.5rem;
  }

  .accordion {
    width: 90%;
    max-width: 1000px;
    margin: 2rem auto;
  }
  .accordion-item {
    background-color: #fff;
    color: #111;
    margin: 1rem 0;
    border-radius: 0.5rem;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.25);
  }
  .accordion-item-header {
    padding: 0.5rem 3rem 0.5rem 1rem;
    min-height: 3.5rem;
    line-height: 1.25rem;
    font-weight: bold;
    display: flex;
    align-items: center;
    position: relative;
    cursor: pointer;
    font-size: 18px;
  }
  .accordion-item-header::after {
    content: "\002B";
    font-size: 2rem;
    position: absolute;
    right: 1rem;
  }
  .accordion-item-header.active::after {
    content: "\2212";
  }
  .accordion-item-body {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
  }
  .accordion-item-body-content {
    padding: 1rem;
    line-height: 1.5rem;
    border-top: 1px solid;
    border-image: linear-gradient(to right, transparent, #34495e, transparent) 1;
  }

  @media(max-width:767px) {
    html {
      font-size: 14px;
    }
  }

  .formula3{
    width: 100%;
    height: auto;
  }
  .cont_cajas3{
    width: 95%;
    height: auto;
    margin: 0px 20px 0px 5px;
    text-align: left;
  }
  .etiq_caja3 {
    width: 100%;
    height: auto;
    padding-left: 5px;
    font-family: 'Kelly Slab', cursive;
  }
  .caja_input{
  padding: 10px;
  border: 1px solid rgba(43, 161, 172, 0.91);;
  border-radius: 4px;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  outline: none;
  box-sizing:border-box;
  width: 100%;
  font:14px "Trebachet MS",tahoma,arial;
  color: rgb(1, 24, 83);
  margin-bottom: 10px;
  }
  .conten_botom_formu3{
    width: 95%;
    height: auto;
    margin: 0px 20px 0px 5px;
    display: flex;
    justify-content: center;
    align-items: center;
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

  </style>
  <body>
    <?php
  		include('config/config.php');
  		$id=$_REQUEST['id'];


      $consult1=mysqli_query($con,"SELECT * from paciente where id_paciente='$id' ");
      $row1=mysqli_fetch_array($consult1);

      ?>

  <div class="accordion">
    <div class="accordion-item">
      <div class="accordion-item-header active">
        Datos Personales
      </div>
      <div class="accordion-item-body" style="max-height: 370px;">
        <div class="accordion-item-body-content">
          <form id="" class="formula3" action="guardar_perfil.php?id=<?php echo $id; ?>" method="post" >
          <div class="cont_cajas3">
            <label class="etiq_caja3">Nombres</label>
            <input type="text" class="caja_input" name="nombre" value="<?php echo $row1['nombres']; ?>" required readonly>
          </div>
          <div class="cont_cajas3">
            <label class="etiq_caja3">Apellidos</label>
            <input type="text" class="caja_input" name="apellidos" value="<?php echo $row1['apellidos']; ?>" required readonly>
          </div>
          <div class="cont_cajas3">
            <label class="etiq_caja3">Correo</label>
            <input type="text" class="caja_input" name="correo" value="<?php echo $row1['correo']; ?>" required>
          </div>
          <div class="cont_cajas3">
            <label class="etiq_caja3">Telefono</label>
            <input type="number" class="caja_input" name="telefono" value="<?php echo $row1['celular']; ?>" required >
          </div>
          <div class="conten_botom_formu3">
            <input  type="submit" name="enviar" value="Actualizar" class="acao3">
          </div>
        </form>
        </div>

      </div>
    </div>

    <div class="accordion-item">
      <div class="accordion-item-header">
        Cambiar Contraseña
      </div>
      <div class="accordion-item-body">
        <div class="accordion-item-body-content">
          <form id="" class="formula3" action="guardar_perfil2.php?id=<?php echo $id; ?>" method="post" >
          <div class="cont_cajas3">
            <label class="etiq_caja3">Actual Contraseña</label>
            <input type="text" class="caja_input" name="contrasena" value="" required autocomplete="off">
          </div>
          <div class="cont_cajas3">
            <label class="etiq_caja3">Nueva Contraseña</label>
            <input type="text" class="caja_input" name="clave" value="" required autocomplete="off">
          </div>
          <div class="cont_cajas3">
            <label class="etiq_caja3">Repita Nueva Contraseña</label>
            <input type="text" class="caja_input" name="rclave" value=""  required autocomplete="off">
          </div>
          <div class="conten_botom_formu3">
            <input  type="submit" name="enviar" value="Cambiar" class="acao3">
          </div>
        </form>
        </div>
      </div>
    </div>

  </div>


  	<script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
  	<script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>

  <script type="text/javascript">
  const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");
  accordionItemHeaders.forEach(accordionItemHeader => {
  accordionItemHeader.addEventListener("click", event => {

    // Uncomment in case you only want to allow for the display of only one collapsed item at a time!
    // const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");
    // if(currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader!==accordionItemHeader) {
    //   currentlyActiveAccordionItemHeader.classList.toggle("active");
    //   currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
    // }
    accordionItemHeader.classList.toggle("active");
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    if(accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
    }
    else {
      accordionItemBody.style.maxHeight = 0;
    }

  });
  });
  </script>
  </body>
</html>
