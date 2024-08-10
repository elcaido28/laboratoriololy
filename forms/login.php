<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Laboratorio Loly </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post" action="app/validar_ingreso.php" name="formix" id="formix">   <!--abrir formulario cuando inicia sesion-->
					<span class="login100-form-title p-b-49">
						Iniciar sesion
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Usuario es requerido">
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text" name="username" id="username" placeholder=" Ingrese usuario">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Contraseña requerida">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="pass" id="pass" placeholder="Ingrese contraseña"> <!--agregar id="username"-->
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="../index.php">
							Inicio
						</a>
						<span> | </span>
						<a href="recuperar_clave.php">
							Olvido su contraseña?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<input class="login100-form-btn-aceptar" type="button" value="Ingresar" onclick="pregunta()">
							<!-- <button class="login100-form-btn">
								Ingresar
							</button> -->
						</div>
					</div>

					<!-- <div class="txt1 text-center p-t-54 p-b-20">
						<a href="usuarios.php" class="txt2">
							Registrarse
						</a>
						<a href="../../index.php" class="txt2">
							Ir a Inicio
						</a>
					</div> -->

					<!-- <div class="txt1 text-center p-t-54 p-b-20">
						<span>
							O ingrese usando: 
						</span>
					</div> -->

					<!-- <div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div> -->

					<!-- <div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Registrarse
						</span> 

						<a href="usuarios.php" class="txt2">
							Registrarse
						</a>
						<br><br>
						<a href="../../index.php" class="txt2">
							Inicio
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script src="js/sweetalert2.min.js"></script>

</body>
</html>
<?php if (isset($_SESSION['INGRESO'])) { 
  if ($_SESSION['INGRESO']==1){ ?>
<script>
function ejecutarEjemplo2(){
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Sesión Terminada'
})
}
ejecutarEjemplo2();
</script>
<?php session_destroy(); } }?>


<!-- NOLOGIN -->
<script language="JavaScript">
function pregunta(){
  var msg = '';

  var formularios = document.forms;

  for (var i=0; i<formularios.length;i++){
    for (var j=0; j<formularios[i].elements.length-1; j++){
      
      msg = msg + '\n\nElemento '+j+ ' del formulario '+(i+1)+ ' tiene id: '+ formularios[i].elements[j].id;
      msg = msg + ' y su contenido es: ' + contenido;
      if (j==0) {
        var contenido = formularios[i].elements[j].value;
      }
      if (j==1) {
        var contenido1 = formularios[i].elements[j].value;
      }
    }
  }
  if (contenido == "" && contenido1!="") {
    Swal.fire('Complete campo usuario');
  }else if (contenido1 == "" && contenido!="") {
  	Swal.fire('Complete campo contraseña');
  }else if (contenido1 == "" && contenido=="") {
  	Swal.fire('Complete todos los campos');
  }else{
  	document.getElementById('formix').submit();
  }

  //alert (msg);
  // alert(cual);
 
}
</script>

<!-- USUARIO Y CLAVE INCORRECTO -->
<?php if (isset($_SESSION['MSJ_loginfail'])) { 
  if ($_SESSION['MSJ_loginfail']==1){ ?>
<script>
function ejecutarEjemplo2(){
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'warning',
  title: 'Usuario o Contraseña Incorrectos'
})
}
ejecutarEjemplo2();
</script>
<?php session_destroy(); } }?>

<!-- USUARIO INACTIVO-->
<?php if (isset($_SESSION['MSJ_inactivo'])) { 
  if ($_SESSION['MSJ_inactivo']==1){ ?>
<script>
function ejecutarEjemplo2(){
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'warning',
  title: 'Usuario Inhabilitado'
})
}
ejecutarEjemplo2();
</script>
<?php session_destroy(); } }?>