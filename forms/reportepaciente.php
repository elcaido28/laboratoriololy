<!doctype html>
<html lang="en">



<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../img/favicon.png" type="image/png">
	<title>Reporte de usuarios </title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../vendors/linericon/style.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="../vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="../vendors/animate-css/animate.css">
	<link rel="stylesheet" href="../vendors/jquery-ui/jquery-ui.css">
<!-- css para tablas -->
    <link rel="stylesheet" href="../css/responsive-tables.css">
	<!-- main css -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/responsive.css">

               <link  href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        
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
					<h2>Busqueda de reportes</h2>
					<div class="page_link">
						<a href="../index.php">Inicio</a>
						<a href="agpaciente.php">Buscar reporte</a>
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

       
       <div class="box">
           <div class="container-4">
            <form  role="form" action="buscarpaciente.php" method="POST">
            <label class="glyphicon glyphicon-user" for="buscar"> Buscar reporte</label>
            
             <input type="text" name="buscar" id="buscar" placeholder="Buscar..." />
             <!--<input type="submit" name="bus" id="bus" value="Buscar" />
               <button type="submit" name="submit" class="icon"><i class="fa fa-search"></i></button>-->
               
           </div>
       </div>

           <div id="datos">
       </div>

          <br><br>

<!--<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Listado de pacientes</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>

    <div class="box-content">
    
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive"> 
    <thead>
    <tr>
        <th>Nombres</th>
        <th>Cédula de identidad</th>
        <th>Dirección</th>
        <th>Celular</th>
        <th>Acción</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>David R</td>
        <td class="center">0987654363</td>
        <td class="center">Sauces 3</td>
        <td class="center">
            <span class="label-success label label-default">0974747474</span>
        </td>
        <td class="center">
            <a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Ver
            </a>
            <a class="btn btn-info" href="#">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Editar
            </a>
          
        </td>
    </tr>
    <tr>
        <td>Chris Jack</td>
        <td class="center">0946373838</td>
        <td class="center">Miraflores</td>
        <td class="center">
            <span class="label-success label label-default">0973546737</span>
        </td>
        <td class="center">
            <a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Ver
            </a>
              <a class="btn btn-info" href="#">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Editar
            </a>
           
        </td>
    </tr>
      <tr>
        <td>Chris Jack</td>
        <td class="center">0946373838</td>
        <td class="center">Miraflores</td>
        <td class="center">
            <span class="label-success label label-default">0973546737</span>
        </td>
        <td class="center">
            <a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Ver
            </a>
             <a class="btn btn-info" href="#">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Editar
            </a>
            
        </td>
    </tr>
      <tr>
        <td>Chris Jack</td>
        <td class="center">0946373838</td>
        <td class="center">Miraflores</td>
        <td class="center">
            <span class="label-success label label-default">0973546737</span>
        </td>
        <td class="center">
            <a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Ver
            </a>
             <a class="btn btn-info" href="#">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Editar
            </a>
            
        </td>
    </tr>
      <tr>
        <td>Chris Jack</td>
        <td class="center">0946373838</td>
        <td class="center">Miraflores</td>
        <td class="center">
            <span class="label-success label label-default">0973546737</span>
        </td>
        <td class="center">
            <a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Ver
            </a>
             <a class="btn btn-info" href="#">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Editar
            </a>
           
        </td>
    </tr>
      <tr>
        <td>Chris Jack</td>
        <td class="center">0946373838</td>
        <td class="center">Miraflores</td>
        <td class="center">
            <span class="label-success label label-default">0973546737</span>
        </td>
        <td class="center">
            <a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Ver
            </a>
              <a class="btn btn-info" href="#">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Editar
            </a>
            
        </td>
    </tr>
    <tr>
        
        <td>Ana Herrera</td>
        <td class="center">0987897678</td>
        <td class="center">Tulcan</td>
        <td class="center">
            <span class="label-warning label label-default">0987654534</span>
        </td>
        <td class="center">
            <a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Ver
            </a>
            <a class="btn btn-info" href="#">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Editar
            </a>
           
        </td>
    </tr>
    </tbody>
    </table>-->



    <!-- <ul class="pagination pagination-centered">
                        <li><a href="#">Prev</a></li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>-->
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->





</div>
                       
                </div>
            </div>
        </div>
        </form> 
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
    <!-- scrip paa tablas -->
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="../js/responsive-tables.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>