<?php  ?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="images/logoo.png" type="image/png">
	<title>App Loly</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../vendors/linericon/style.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="../vendors/animate-css/animate.css">
	<link rel="stylesheet" href="../vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/responsive.css">
</head>

<body>

	<!--================Header Menu Area =================-->
        <header class="header_area">
		<div class="top_menu row m0">
			<div class="container">
				<div class="float-left">
					<ul class="left_side">
						<li>
							<a href="login.html">
								<i class="fa fa-facebook-f"></i>
							</a>
						</li>
						<li>
							<a href="login.html">
								<i class="fa fa-twitter"></i>
							</a>
						</li>
						<li>
							<a href="login.html">
								<i class="fa fa-dribbble"></i>
							</a>
						</li>
						<li>
							<a href="login.html">
								<i class="fa fa-behance"></i>
							</a>
						</li>
					</ul>
				</div>
				<div class="float-right">
					<ul class="right_side">
						<li>
							<a href="login.html">
								<i class="lnr lnr-phone-handset"></i>
								2586213
							</a>
						</li>

						<li>
							<a href="#">
								<i class="lnr lnr-envelope"></i>
								info@laboratoriololy.com
							</a>
						</li>


						<li>
							<a href="login.php">
								<i class=""></i>
								Iniciar Sesión
							</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="../index.php">
						<img src="../img/labo.png"  width="75" height="80"alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row ml-0 w-100">
							<div class="col-lg-12 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item">
										<a class="nav-link" href="../index.php">Inicio</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="qsomos.php">Quienes somos</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="contact.php">Contacto</a>
									</li>
									<!--<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servicios</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="about.php">Resultados</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="services.php">Cotiza tus examenes</a>
											</li>
										</ul>
									</li>-->
									<li class="nav-item active">
										<a class="nav-link" href="nuestra_app.php">Nuestra App</a>
									</li>
									<!--<li class="nav-item">
										<a class="nav-link" href="contact.php">Contacto</a>
									</li>-->
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--<?php include("cabecera1.php") ?>-->

	<!--================Header Menu Area =================-->

	<!--================ Banner Area =================-->
	<section class="banner_area_publicitario">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-left">
					<h2>App Loly !!</h2>
					<div class="page_link">
						<a href="../index.php">Inicio</a>
						<a href="nuestra_app.php">Nuestra App</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Banner Area =================-->

	<!--================ Procedure Category Area =================-->
	<section class="procedure_category section_gap">
		<div class="container">
			<div class="row justify-content-center section-title-wrap" style="margin-bottom: 10px;">
				<div class="col-lg-12">
					<h1>Descarga Nuestra App</h1>
					<p>
						Debe estar registrado para poder acceder a las funcionalidades de la aplicación.
						Escanea el codigo QR a continuación...
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
				</div>

				<div class="col-lg-4">

					<!-- MEDIANO -->
					<div class="container">
						<div id="qrcode" style="display: flex; flex-wrap: wrap; justify-content: center;align-items: center;">
							<img src="../img/qr_app.png" alt="Generador de Códigos QR Codes"/>
							<br/>
							<p>...O da Click <a href="http://laboratoriololy.com/forms/descargas/app-debug.apk" target="_blank" id="qrgenerator">Aquí</a> para descargar</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
				</div>
			</div>
		</div>
	</section>
	<!--================ End Procedure Category Area =================-->

	<!-- start footer Area -->
	<footer id="footer-area section_gap">
			<?php include("footer.php"); ?>
	</footer>

	<!-- End footer Area -->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="../js/jquery.ajaxchimp.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
	<script src="../js/mail-script.js"></script>
	<script src="../js/custom.js"></script>
</body>

</html>
