<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<!--================Header Menu Area =================-->
<?php  if ($perfil == 1){ ?>
<!--================ Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container" >
      <div class="banner_content text-left">
        <h2>Restaurar Pacientes</h2>
        <div class="page_link">
          <a href="inicio.php">Inicio</a>
          <a href="restaurar_paciente.php">Restaurar Pacientes</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Banner Area =================-->

<!--================ Script Area =================-->

<script>
  function soloLetras(e){
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
     especiales = "8-37-39-46";

     tecla_especial = false
     for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }
      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }
</script>

<script>
  function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
      }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
  }
</script>
<!--================ End Script Area =================-->

<!--================ Start Appointment Area =================-->
<div class="container-login100" style="background: #B8E1F7;">
<br><br>
            <div class="table-responsive">
                <div class="cont_tabla">
                    <table class="tabla" >
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>IDENTIFICACION</th>
                                <th>ROL</th>
                                <th>CORREO</th>
                                <th>OPCION</th>
                            </tr>
                        </thead>
                        <tr>
                        <?php
                            $consulta3=mysqli_query($con,"SELECT * from empleado E inner join estado ES on E.id_estado=ES.id_estado inner join rol R on E.id_rol=R.id_rol inner join perfil P on E.id_perfil=P.id_perfil WHERE E.id_estado='2'");
                            while($row3=mysqli_fetch_array($consulta3)){
                        ?>
                            <td><?php echo $row3['nombres']." ".$row3['apellidos']; ?> </td>
                            <td><?php echo $row3['cedula']; ?> </td>
                            <td><?php echo $row3['nombre_rol']; ?> </td>
                            <td><?php echo $row3['correo']; ?> </td>
                            <td>
                                <div class="cont_tbn_tb">
                                    <button type="button" class="eliminar" title="Restaurar" id="<?php echo $row3['id_empleado'] ?>" name="button" id="elim"><i class="fas fa-redo-alt" id="<?php echo $row3['id_empleado'] ?>"></i>
                                    </button>
                                </div>

                            </td>
                        </tr>
<script type="text/javascript">
$('.eliminar').click(function(e){

  var id_emp= e.target.id;
            
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
    title: 'Esta Seguro?',
    text: "Desea restaurar los datos",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, restaurar!',
    cancelButtonText: 'No, cancelar!',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      document.location.href="app/restaurarEmpleado.php?id="+id_emp;
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {

    }
  })
})
</script>
                        <?php } ?>
                    </table>
                </div>
            </div>
  </div>
<!--================ End Appointment Area =================-->

<!--================ start footer Area =================-->
<?php include('scripts.php'); ?>

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

<!-- RESTAURAR -->
<?php if (isset($_SESSION['eliminar'])) { 
  if ($_SESSION['eliminar']==1){ ?>
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
  title: 'Empleado Restaurado'
})
}
ejecutarEjemplo2();
</script>
<?php $_SESSION['eliminar']=0; } }?>