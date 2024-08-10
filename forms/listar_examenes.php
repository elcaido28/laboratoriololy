<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<?php  if ($perfil >= 1){ ?>
<?php
  $idpac=$_GET['id'];
  $consultar=mysqli_query($con,"SELECT * FROM paciente WHERE id_paciente='$idpac'");
  $row=mysqli_fetch_array($consultar);
  $nombrepac=$row['nombres']." ".$row['apellidos'];
?>
<!--================Header Menu Area =================-->

<!--================ Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container" >
      <div class="banner_content text-left">
        <h2>Exámenes del Paciente </h2><h3 style="color: #1D78B2;"><?php echo $nombrepac; ?></h3>
        <div class="page_link">
          <a href="inicio.php">Inicio</a>
          <a href="buscar_examen.php">Buscar Examen</a>
          <a href="listar_examenes.php?id=<?php echo $idpac; ?>">Lista Examenes</a>
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

    <div class="table-responsive" style="margin-top: -270px;">
            <div class="cont_tabla">
              <table class="tabla" >
                  <thead>
                    <tr>
                      <th>TIPO</th>
                      <th>PRECIO</th>
                      <th>FECHA Y HORA</th>
                      <th>ESTADO</th>
                      <th>EDITAR</th>
                    </tr>
                  </thead>
                  <tr>
                  <?php
                    $consulta3=mysqli_query($con,"SELECT * FROM cabecera_examen C INNER JOIN estado_examen ES ON C.estado_Exa_id=ES.estado_exa_id WHERE id_paciente='$idpac'");
                    while($row3=mysqli_fetch_array($consulta3)){
                      $partes = explode('*', $row3['tipo_examen']);
                      $conjunto = implode(', ', $partes);
                  ?>
                    <td><?php echo $conjunto; ?> </td>
                    <td><?php echo $row3['precio_examen']; ?> </td>
                    <td><?php echo $row3['fecha_ingreso_exa']; ?> </td>
                    <td><?php echo $row3['estado_exa_dscrp']; ?> </td>
                    <td>
                        <div class="cont_tbn_tb">
                          <a href="editar_examen.php?idc=<?php echo $row3['cabecera_exa_id']; ?>&idp=<?php echo $idpac; ?>">
                            <button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit" aria-hidden="true"></i></button>
                          </a>

                        </div>

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

<script src="js/jquery.dataTables.min.js" charset="utf-8"></script>
<script>
$(document).ready( function () {
    $('.tabla').DataTable();
} );
</script>
<!--================ End footer Area =================-->
</body>

</html>

<!-- EDITADO -->
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
  title: 'Cambios Guardados'
})
}
ejecutarEjemplo();
</script>
<?php $_SESSION['confirmar']=0; } }?>

<?php  } else {
  header("Location:inicio.php");
} ?>