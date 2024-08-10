<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<!--================Header Menu Area =================-->
<?php  if ($perfil == 1){ ?>
<?php
$id_usu=$_REQUEST['idu'];
$consulta=mysqli_query($con,"SELECT * from usuario U inner join empleado E on U.id_empleado=E.id_empleado WHERE U.id_usuario='$id_usu' AND E.id_estado='1'");
$row=mysqli_fetch_array($consulta);
$id_emp = $row['id_empleado']
?>
  <!--================ Banner Area =================-->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content text-left">
          <h2>Asignar Usuario</h2>
          <div class="page_link">
            <a href="inicio.php">Inicio</a>
            <a href="ingresar_empleado.php">Ingresar Empleado</a>
            <a href="asignar_usuario.php?ide=<?php echo $id_emp; ?>">Asignar Usuario</a>
            <a href="editar_usuario.php?idu=<?php echo $id_usu; ?>">Editar Usuario</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Banner Area =================-->

  <!--================ Script Area =================-->
  <!--================ End Script Area =================-->

  <!--================ Start Appointment Area =================-->
  <div class="container-login100" style="background: #B8E1F7;">
      <div class="wrap-login600 p-l-55 p-r-55 p-t-65 p-b-54">
        <!-- <form class="login100-form validate-form" method="post" action="" name="formix" id="formix"onsubmit=" return fun_insertar()"> -->
        <form class="login100-form validate-form" method="post" action="app/modificarUsuario.php?idu=<?php echo $id_usu; ?>" name="formix" id="formix"> 
          <!--abrir formulario cuando inicia sesion-->
          <span class="login100-form-title p-b-49">
            Datos
          </span>

          <div class="parados">
            <div class="wrap-input100 validate-input m-b-23 m-r-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Usuario</span>
              <input class="input100" type="text" name="usuario" id="usuario" onkeypress="return soloLetras(event)" value="<?php echo $row['usuario'] ?>" placeholder="Ej: Nnombre" required>
              <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-23 m-l-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Contraseña</span>
              <input class="input100" type="text" name="clave" id="clave" onkeypress="return soloLetras(event)" value="<?php echo $row['clave'] ?>" placeholder="Ej:NB123*" required>
              <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>
          </div>
          
          <br><br>

          <div class="container-login100-form-btn">
            <div class="wrap-login40-form-btn-aceptar">
              <div class="login100-form-bgbtn-aceptar"></div>
              <input class="login100-form-btn-aceptar" type="button" value="Guardar" onclick="pregunta()">
            </div>
            <div class="wrap-login40-form-btn-cancelar">
              <div class="login100-form-bgbtn-cancelar"></div>
              <a href="asignar_usuario.php?ide=<?php echo $row['id_empleado']; ?>" class="txt2">
              <button type="button" name="botones" id="botones" class="login100-form-btn-cancelar">
                Regresar
              </button>
              </a>
            </div>
          </div>      
        </form>
      </div>
    </div>
  <!--================ End Appointment Area =================-->
<script language="JavaScript">
function pregunta(){
  var msg = '';
  var verificar;

  var formularios = document.forms;

  for (var i=0; i<formularios.length;i++){
    for (var j=0; j<formularios[i].elements.length-2; j++){
      // msg = msg + '\n\nElemento '+j+ ' del formulario '+(i+1)+ ' tiene id: '+ formularios[i].elements[j].id;
      // msg = msg + ' y name: ' + formularios[i].elements[j].name;
      var contenido = formularios[i].elements[j].value;
      msg = msg + '\n\nElemento '+j+ ' del formulario '+(i+1)+ ' tiene id: '+ formularios[i].elements[j].id;
      msg = msg + ' y su contenido es: ' + contenido;
      
      if (contenido == '') {
        verificar = 1;
      }
    }
  }

  if (verificar == 1) {
    verificar = '';
    Swal.fire('Complete todos los campos');
  }else{
        verificar = '';
        const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: 'Guardar Cambios?',
                  text: "",
                  icon: 'question',
                  showCancelButton: true,
                  confirmButtonText: 'Si, guardar!',
                  cancelButtonText: 'No, cancelar!',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                      document.getElementById('formix').submit();
                  } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                  ) {

                  }
                })
  }

  //alert (msg);
  // alert(cual);
 
}
</script>

  <!--================ start footer Area =================-->
  <?php include('scripts.php'); ?>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.dataTables.min.js" charset="utf-8"></script>
  <!--================ End footer Area =================-->
</body>

</html>

<?php  } else {
  header("Location:inicio.php");
} ?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- MENSAJE GUARDAR -->
<?php if (isset($_SESSION['confirmar'])) { 
  if ($_SESSION['confirmar']==1){ ?>
<script>
function ejecutarEjemplo(){
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
  title: 'Datos Editados Correctamente'
})
}
ejecutarEjemplo();
</script>
<?php $_SESSION['confirmar']=0; } }?>