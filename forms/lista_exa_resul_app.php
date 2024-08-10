<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="para_app/estilos_app.css">
    <script src="js/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
  	<script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
    <style media="screen" type="text/css">
      body{
        background: #ebe9e9;
          background-image: url(images/fond_todo.jpg);
          background-size: cover;
          background-position: 0px 0px;
          background-repeat: no-repeat;
      }
    </style>
    <title></title>
  </head>
  <body>
<?php
include('config/config.php');
$id=$_REQUEST['id'];
 ?>
    <form action="" class="cont_barr_busque">
  		<input type="text" class="barra-busqueda" id="barra-busqueda" placeholder="&#128269; Buscar">
  	</form>
  	<div class="contenedor">

  		<header>
  			<!-- <div class="logo">
  				<h1>Carlos Arturo</h1>
  				<p>Desarrollador Web</p>
  			</div> -->

  			<div class="categorias" id="categorias">
  				<a href="#" class="activo">Todos</a>
  			</div>
  		</header>

  		<section class="grid" id="grid">

        <?php
          $fecha_actual = date("d-m-Y");
          $fecha_dat=date("d-m-Y",strtotime($fecha_actual."- 3 month"));
          $consulta1=mysqli_query($con,"SELECT * from cabecera_examen E inner join paciente P on P.id_paciente=E.id_paciente inner join cabecera_resultado CR on CR.cabecera_exa_id=E.cabecera_exa_id inner join tipo_formato TF on TF.formato_id=CR.cabecera_tipo_formato WHERE E.estado_exa_id ='1' and P.id_paciente='$id' and fecha_ingreso_exa>= now()-interval 3 month ");
          while($row1=mysqli_fetch_array($consulta1)){

        ?>
  			<div class="item"
  				 data-categoria="Todos"
  				 data-etiquetas="<?php echo $row1['formato_nombre']." ".$row1['fecha_ingreso_exa']; ?>"
  				 data-descripcion="<?php echo $row1['fecha_ingreso_exa']; ?>"
  			>
        <div class="item-contenido">

					<div class="conten_info">
            <?php
                $datp="";
                if ($row1['privacidad']=='2') {
                  $datp='<br><b style="color:#D67610;">Confidencial, acerquese al laboratorio.</b>';
                    }
             ?>
            <label class="fecha"><?php echo "<b>".$row1['fecha_ingreso_exa']."</b>"; ?></label>
            <label class="descrip"><?php echo utf8_decode($row1['formato_nombre']).$datp;  ?></label>
<?php
if ($row1['privacidad']=='2') {
 echo '<a href="#"><button type="button" title="Denegado no puede Imprimir" class="boton_carrito" style="background:#D67610;" name="button"><i class="fas fa-print"></i></button></a>';
}else{
 ?>

          <a href="resultado_designacion_imprimir.php?idc=<?php echo $row1['cabecera_exa_id']; ?>&idp=&tipex=<?php echo $row1['formato_id']; ?>" target="_blank">  <button type="button" class="boton_carrito" id="boton_carrit*<?php echo $row1['cabecera_exa_id']; ?>"  name="button">
             <i class="fas fa-print" id="boton_carrit*<?php echo $row1['cabecera_exa_id']; ?>"></i></button></a>
<?php } ?>
					</div>

				</div>
      </div> <?php } ?>

  		</section>

</div>
<script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
<script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
  <script src="para_app/main_list.js"></script>
  </body>
</html>
