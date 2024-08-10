<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<!--================Header Menu Area =================-->
<?php  if ($perfil == 1 || $perfil == 2){ ?>
<!--================ Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container" >
      <div class="banner_content text-left">
        <h2>Búscar Exámenes</h2>
        <div class="page_link">
          <a href="inicio.php">Inicio</a>
          <a href="buscar_examenes.php">Buscar Examen</a>
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
<div class="container-login100" style="background: #B8E1F7; margin-top: -100px;">

    <div class="table-responsive">
<br>
<br>
<br>
<br>
<br>
            <div class="cont_tabla">
              <table class="tabla" >
                  <thead>
                    <tr>
                      <th>TIPO</th>
                      <th>FECHA</th>
                      <th>ESTADO</th>
                      <th>PACIENTE</th>
                      <th>IDENTIFICACION</th>
                      <th>OPCIONES</th>
                    </tr>
                  </thead>
                  <tr>
                  <?php
                    $consulta3=mysqli_query($con,"SELECT * from paciente P inner join estado E on P.estado=E.id_estado inner join sexo S on P.sexo=S.id_sexo WHERE estado='1'");
                    while($row3=mysqli_fetch_array($consulta3)){
                      $idpac=$row3['id_paciente'];

                    $consulta4=mysqli_query($con,"SELECT * FROM cabecera_examen C INNER JOIN estado_examen ES ON C.estado_Exa_id=ES.estado_exa_id INNER JOIN paciente P ON C.id_paciente=P.id_paciente INNER JOIN estado E on P.estado=E.id_estado INNER JOIN sexo S on P.sexo=S.id_sexo WHERE C.id_paciente='$idpac' AND P.estado='1' AND C.estado_exa_id='2'");
                    while($row4=mysqli_fetch_array($consulta4)){
                      $fecha=explode(' ', $row4['fecha_ingreso_exa']);
                      $fechan=$fecha[0];
                      $partes = explode('*', $row4['tipo_examen']);
                      $conjunto = implode(', ', $partes);
                  ?>
                    <td><?php echo $conjunto; ?> </td>
                    <td><?php echo $fechan; ?> </td>
                    <td><?php echo $row4['estado_exa_dscrp']; ?> </td>
                    <td><?php echo $row4['nombres']." ".$row3['apellidos']; ?> </td>
                    <td><?php echo $row4['identificacion']; ?> </td>
                    
                    <td>
                        <div class="cont_tbn_tb">
                          <?php if ($row4['estado_exa_dscrp']=="Sin Resultados") { ?>
                          <a href="resultado_designacion.php?idc=<?php echo $row4['cabecera_exa_id']; ?>&idp=<?php echo $idpac; ?>">
                            <button type="button" title="Ingresar Resultados" class="btn-opuno" name="button"><i class="far fa-edit" aria-hidden="true"></i></button>
                          </a>
                          <?php } ?>
                          <a href="ver_examenes.php?idp=<?php echo $row4['id_paciente']; ?>&idc=<?php echo $row4['cabecera_exa_id'] ?>">
                            <button type="button" title="Ver Examenes" class="modificar" name="button"><i class="fas fa-eye" aria-hidden="true"></i></button>
                          </a>
                        </div>
                    </td>
                  </tr>

                  <?php } }?>
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