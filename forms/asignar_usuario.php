<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<!--================Header Menu Area =================-->
<?php  if ($perfil == 1){ ?>
<?php
$id_emp=$_REQUEST['ide'];
$consulta=mysqli_query($con,"SELECT * from usuario U inner join empleado E on U.id_empleado=E.id_empleado WHERE U.id_empleado='$id_emp' AND E.id_estado='1'");
$row=mysqli_fetch_array($consulta);

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
      <div class="wrap-login600 p-l-55 p-r-55 p-t-65 p-b-54 m-b-50">
        <!-- <form class="login100-form validate-form" method="post" action="" name="formix" id="formix"onsubmit=" return fun_insertar()"> -->
        <form class="login100-form validate-form" method="post" action="app/guardarUsuario.php?ide=<?php echo $id_emp; ?>" name="formix" id="formix"> 
          <!--abrir formulario cuando inicia sesion-->
          <span class="login100-form-title p-b-49">
            Datos
          </span>

          <div class="parados">
            <div class="wrap-input100 validate-input m-b-23 m-r-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Usuario</span>
              <input class="input100" type="text" name="usuario" id="usuario" required  onkeypress="return soloLetras(event)" placeholder="Ej: Nnombre" value="">
              <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-23 m-l-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Contraseña</span>
              <input class="input100" type="text" name="clave" id="clave" required onkeypress="return soloLetras(event)" placeholder="Ej:NB123*">
              <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>
          </div>
          
          <br><br>

          <div class="container-login100-form-btn">
            <?php  if ($row<1){ ?>
            <div class="wrap-login40-form-btn-aceptar">
              <div class="login100-form-bgbtn-aceptar"></div>
              
              <button class="login100-form-btn-aceptar">
                Guardar
              </button>
              
            </div>
            <?php } ?>
            <div class="wrap-login40-form-btn-cancelar">
              <div class="login100-form-bgbtn-cancelar"></div>
              <a href="ingresar_empleado.php" class="txt2">
              <button type="button" name="botones" id="botones" class="login100-form-btn-cancelar">
                Regresar
              </button>
              </a>
            </div>
          </div>      
        </form>
      </div>
      <div class="table-responsive">
              <div class="cont_tabla">
                <table class="tabla" >
                    <thead>
                      <tr>
                        <th>USUARIO</th>
                        <th>CONTRASEÑA</th>
                        <th>EDITAR / BORRAR</th>
                      </tr>
                    </thead>
                    <tr>
                    <?php
                      $consulta=mysqli_query($con,"SELECT * from usuario U inner join empleado E on U.id_empleado=E.id_empleado WHERE U.id_empleado='$id_emp'");
                      while($row=mysqli_fetch_array($consulta)){
                    ?>
                      <td><?php echo $row['usuario']; ?> </td>
                      <td><?php echo $row['clave']; ?> </td>
                      <td>
                          <div class="cont_tbn_tb">
                            <a href="editar_usuario.php?idu=<?php echo $row['id_usuario']; ?>">
                              <button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button>
                            </a>
                            <button type="button" class="eliminar m-l-5" title="Eliminar" name="button" id="elim"><i class="far fa-trash-alt"> </i></button>
                          </div>
<script type="text/javascript">
  $('#elim').click(function(e){
    const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: 'Desea Eliminar los Datos?',
                  text: "",
                  icon: 'question',
                  showCancelButton: true,
                  confirmButtonText: 'Si, eliminar!',
                  cancelButtonText: 'No, cancelar!',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                      document.location.href="app/eliminarUsuario.php?id=<?php echo $row['id_usuario']; ?>&ide=<?php echo $id_emp; ?>";
                  } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                  ) {

                  }
                })
  });
</script>

                      </td>
                    </tr>
                    <?php } ?>
                </table>
              </div>
          </div>
    </div>
  <!--================ End Appointment Area =================-->

  <!--================ start footer Area =================-->
  <?php include('scripts.php'); ?>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.dataTables.min.js" charset="utf-8"></script>
  <script>
  $(document).ready( function () {
      $('.tabla').DataTable();
  } );
  </script>
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
  title: 'Datos Guardados'
})
}
ejecutarEjemplo();
</script>
<?php $_SESSION['confirmar']=0; } }?>


<!-- MENSAJE ELIMINAR -->
<?php if (isset($_SESSION['eliminar'])) { 
  if ($_SESSION['eliminar']==1){ ?>
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
  title: 'Datos Eliminados'
})
}
ejecutarEjemplo();
</script>
<?php $_SESSION['eliminar']=0; } }?>

<!-- MENSAJE EDITAR -->
<?php if (isset($_SESSION['confirmar'])) { 
  if ($_SESSION['confirmar']==2){ ?>
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