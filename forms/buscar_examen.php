<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<!--================Header Menu Area =================-->
<?php  if ($perfil >= 1){ ?>
<!--================ Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container" >
      <div class="banner_content text-left">
        <h2>Búsqueda Exámen</h2>
        <div class="page_link">
          <a href="inicio.php">Inicio</a>
          <a href="buscar_examen.php">Buscar Examen</a>
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

    <div class="table-responsive">
            <div class="cont_tabla">
              <table class="tabla" >
                  <thead>
                    <tr>
                      <th>NOMBRE</th>
                      <th>EDAD</th>
                      <th>IDENTIFICACION</th>
                      <th>SEXO</th>
                      <th>EXAMENES</th>
                    </tr>
                  </thead>
                  <tr>
                  <?php
                    $consulta3=mysqli_query($con,"SELECT * from paciente P inner join estado E on P.estado=E.id_estado inner join sexo S on P.sexo=S.id_sexo inner join cabecera_examen CE on P.id_paciente=CE.id_paciente WHERE estado='1'");
                    while($row3=mysqli_fetch_array($consulta3)){
                  ?>
                    <td><?php echo $row3['nombres']." ".$row3['apellidos']; ?> </td>
                    <td><?php echo $row3['edad']; ?> </td>
                    <td><?php echo $row3['identificacion']; ?> </td>
                    <td><?php echo $row3['sexo']; ?> </td>
                    <td>
                        <div class="cont_tbn_tb">
                          <a href="listar_examenes.php?id=<?php echo $row3['id_paciente']; ?>">
                            <button type="button" title="Listado de Examenes" class="modificar" name="button"><i class="fas fa-paste" aria-hidden="true"></i></button>
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

<?php  } else {
  header("Location:inicio.php");
} ?>