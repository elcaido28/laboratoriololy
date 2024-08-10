<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../img/favicon.png" type="image/png">
	<title>Agregar Paciente</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../vendors/linericon/style.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="../vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="../vendors/animate-css/animate.css">
	<link rel="stylesheet" href="../vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/responsive.css">
        
        
</head>

<body>

	<!--================Header Menu Area =================-->

	<?php include("cabecera1.php") ?>

	<!--================Header Menu Area =================-->

	<!--================ Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-left">
					<h2>Registro de pacientes</h2>
					<div class="page_link">
						<a href="../index.php">Inicio</a>
						<a href="agpaciente.php">Registrar paciente</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Banner Area =================-->

	<!-- Start Appointment Area -->
      <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-22">

       
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Registrar Paciente</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="guardar.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <p>
                        <label for="exampleInputEmail1">Número de cédula</label>
                        <input type="text" class="form-control" name="cedula" id="cedula" value='' placeholder="">
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombres</label>
                        <input type="text" class="form-control" name="nombres" id="nombres" value='' placeholder="">
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos" value='' placeholder="">
                    </div> 

                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3 payment_label"> 
                                    <label for="exampleInputEmail1">Sexo</label>
                                </div>
                                <div class="col-md-9"> 
                                    <select class="form-control m-bot15 js-example-basic-single"  name="sexo" id="sexo" value=''> 
                                        <option value=""> </option>
                                                                                
                                            <option value="142">Masculino </option>
                                                                                
                                            <option value="143">Femenino </option>
                                                                                
                                            <option value="144">Otro </option>
                                         
                                    </select>
                                </div>
                            </div> <br>


                   <br>  <div class="form-group"> 
                        <label for="exampleInputEmail1"> Edad</label>
                        <input type="text" class="form-control" name="edad" id="edad" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Celular</label>
                        <input type="text" class="form-control" name="celular" id="celular" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo electrónico</label>
                        <input type="text" class="form-control" name="correo" id="correo" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" id="ciudad" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" value='' placeholder="">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Descuento</label>
                        <input type="text" class="form-control" name="descuento" id="descuento" value='' placeholder="">
                    </div>

                    <div class="form-group">
                    <label>Estado</label>
                    <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="estado" value="" placeholder=""> </div>

                  <div class="form-group">
                        <label for="exampleInputEmail1">Tipo de paciente</label> <br>
                        <select class="form-control m-bot15" name="tipopaciente" id="tipopaciente" value=''>
                         <option value="A+"  > Natural </option>
                         <option value="A-"  > Familiar </option>            
                        </select>
                    </div>

                     <br><br>

                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info">Guardar datos</button>
                    </section>
                </form>

           </div>

 </section>
                
                    

                  <!--  <input type="hidden" name="id" value=''>
                    <input type="hidden" name="p_id" value=''>-->






	
	<!-- End Feedback Area -->

	<!-- start footer Area -->

	<footer id="footer-area section_gap">
			<?php include("pie1.php") ?> 
	</footer>

	<!-- End footer Area -->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="../js/jquery.ajaxchimp.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
	<script src="../js/mail-script.js"></script>
	<script src="../js/custom.js"></script>
</body>

</html>