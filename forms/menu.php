<script src="js/jquery.min.js"></script>
<body oncopy="return false" onpaste="return false">
<header class="header_area">
		<div class="top_menu row m0">
			<div class="container">
				<div class="float-left">
					<ul class="left_side">
						<li>
							<a href="#">
								<i class="fa fa-facebook-f"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-dribbble"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-behance"></i>
							</a>
						</li>
					</ul>
				</div>
				<div class="float-right">
					<ul class="right_side">
						<li>
							<a href="#">
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


						<!--<li>
							<a href="sesion.php">
								<i class=""></i>
								Bienvenido
							</a>
						</li>-->

					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="../index.php">
						<img src="../img/labo.png"  width="75" height="80"alt=""> usuario: <?php echo $nombre; ?> 
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
									<!-- <li class="nav-item active">
										<a class="nav-link" href="../index.php">Inicio</a>
									</li>-->
									<?php  if ($perfil == 1){ ?>

									<li class="nav-item">
										<a href="inicio.php" class="nav-link">Inicio</a>
									</li>
									<?php  } ?>
									<?php  if ($perfil == 1){ ?>

									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administracion</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="ingresar_empleado.php">
													Agregar Empleados</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="buscar_empleado.php">Buscar Empleado</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="ingresar_rol.php">
													Agregar Roles</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="ingresar_perfil.php">Agregar Perfiles</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="backupPHP/descargar.php">Respaldar B.D.</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="backupPHP/descargar.php">SUBMENU</a>
											</li>			
										</ul>								
									</li>

									<?php  } ?>
									
                                    <?php  if ($perfil == 1){ ?>

									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="reportepaciente.php">Reporte Usuario</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#">Reporte Examenes</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#">Reporte Resultados</a>
											</li>
										</ul>								
									</li>

									<?php  } ?>


									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Paciente</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="agpaciente.php">Registro</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="busqpaciente.php">Buscar paciente</a>
											</li>
										</ul>								
									</li>

									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Examen</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="rexamenes.php">Nuevo</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="buscexam.php">Buscar examen</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="regexam.php">Registar examen</a>
											</li>
										</ul>								
									</li>

								
								<!--	<li class="nav-item ">
										<a class="nav-link" href="qsomos.php">Quienes somos</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="contact.php">Contacto</a>
									</li>-->
									<li class="nav-item">
										<a class="nav-link" href="app/cerrarsesion.php">Cerrar Sesion</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<script>

	</script>
	