<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<!--================Header Menu Area =================-->
<?php  if ($perfil == 1 || $perfil == 2){ ?>
<?php
if (isset($_REQUEST['idc']) && isset($_REQUEST['idp']) ) {
  $idcab=$_REQUEST['idc'];
  $idpac=$_REQUEST['idp'];
}else{
  $idpac="";
  $idcab="";
}
$consulta=mysqli_query($con,"SELECT * FROM cabecera_examen C INNER JOIN estado_examen ES ON C.estado_Exa_id=ES.estado_exa_id INNER JOIN paciente P ON C.id_paciente=P.id_paciente INNER JOIN estado E on P.estado=E.id_estado INNER JOIN sexo S on P.sexo=S.id_sexo WHERE C.cabecera_exa_id='$idcab'");
$row=mysqli_fetch_array($consulta);
$paciente=$row['nombres']." ".$row['apellidos'];
$cedula=$row['identificacion'];
$tipexa=$row['tipo_examen'];
?>
<!--================ Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container" >
      <div class="banner_content text-left">
        <h2>Lista de Resultados</h2>
        <div class="page_link">
          <a href="inicio.php">Inicio</a>
          <a href="buscar_resultados.php">Buscar Resultados</a>
          <a href="lista_resultados.php?idc=<?php echo $idcab; ?>&idp=<?php echo $idpac; ?>">Lista de Resultados</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Banner Area =================-->

<!--================ Script Area =================-->
<!--================ End Script Area =================-->

<!--================ Start Appointment Area =================-->
<div class="container-login100" style="background: #B8E1F7; margin-top: -50px;">
    <div class="wrap-login1000 p-l-55 p-r-55 p-t-65 p-b-54 m-b-50">
      <div class="parados">
        <div class="wrap-input100 validate-input m-b-23 m-r-10" data-validate = "Nombre es requerido">
          <span class="label-input100">Paciente</span>
          <input class="input100" type="text" name="nombres" id="nombres" placeholder="Ej: Carlos Andres" value="<?php echo $paciente; ?>" readonly>
          <span class="focus-input100" data-symbol="&#xf206;"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23 m-l-10" data-validate = "Nombre es requerido">
          <span class="label-input100">Cédula</span>
          <input class="input100" type="text" name="cedula" id="cedula" placeholder="Ej: 0912345678" maxlength="10" value="<?php echo $cedula; ?>" readonly>
          <span class="focus-input100" data-symbol="&#xf2c3;"></span>
        </div>
      </div>
      <br>
      <div class="parados">
        <div class="wrap-input100 validate-input m-b-23 m-l-10" data-validate = "Nombre es requerido">
          <span class="label-input100" style="font-size: 16px;">Examenes</span>
        </div>
      </div>
<style>
  .liazul{
    color:#4EC156;
  }
</style>
      <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
          <ul>
<?php

$consultar2 = mysqli_query($con,"SELECT * FROM cabecera_resultado CR INNER JOIN tipo_formato TF ON CR.cabecera_tipo_formato=TF.formato_id WHERE CR.cabecera_exa_id='$idcab'") or die ("erro".mysqli_error());

$m=1;
  while ( $row2=mysqli_fetch_array($consultar2)) {
    $idtex = $row2['cabecera_tipo_formato'];
    $nomtex = $row2['formato_nombre'];
    echo "<li>".$m.". <a href='resultado_designacion_imprimir.php?idc=".$row['cabecera_exa_id']."&idp=".$idpac."&tipex=".$idtex."' style='color: #0C4766;' title='Imprimir' target='blank'>".utf8_decode($nomtex)."<i class='fas fa-print m-l-30' style='color: #0C4766; cursor: pointer;' title='Imprimir' aria-hidden='true'></i></a></li>";
    $m++;
  }



// $consultar = mysqli_query($con,"SELECT * FROM cabecera_examen WHERE cabecera_exa_id='$idcab'") or die ("erro".mysqli_error());
//   $recupera = mysqli_fetch_array($consultar);
//   $tipon = $recupera['tipo_examen'];
//   $forexamen = explode('*', $tipon);

//   $dt2=0;
//   $m=1;
//   $arraydt=[];
//   for ($k=0; $k < count($forexamen); $k++) {
//     $consultar2 = mysqli_query($con,"SELECT * FROM cabecera_resultado CR INNER JOIN tipo_formato TF ON CR.cabecera_tipo_formato=TF.formato_id WHERE CR.cabecera_exa_id='$idcab'") or die ("erro".mysqli_error());
//     while ( $row2=mysqli_fetch_array($consultar2)) {
     
//       $idtex=$row2['formato_id'];



//       if ($forexamen[$k] == $row2['formato_nombre']) {
          
//           $arraydt[$m]=$forexamen[$k];
//          echo "<li class='liazul'>".$m."  <b  class='liazul'>".$forexamen[$k]."</b></li>";
//         $m++;
//       }
//     }  
 
// }
       
//          $resultado = array_diff($forexamen, $arraydt);         
     
//         foreach ($resultado as $key ) {          

//          $ffdt=$key;
//        $consultar3 = mysqli_query($con,"SELECT * FROM tipo_formato WHERE formato_nombre='$ffdt'") or die ("erro".mysqli_error());
//        $row3=mysqli_fetch_assoc($consultar3);
      
//       $idtex2=$row3['formato_id'];

//          echo "<li>".$m.". <a href='resultado_designacion.php?idc=".$row['cabecera_exa_id']."&idp=".$idpac."&tipex=".$idtex2."' style='color: #2D2C2C;' title='Agregar Resultados'><b>".$key."</b></a></li>";
        
//          $m++;
//   }

?>
          </ul>
        </div>
        <div class="col-md-2">
        </div>
      </div>
    </div>
  </div>
<!--================ End Appointment Area =================-->

<!--================ start footer Area =================-->
<?php include('scripts.php'); ?>
<!--================ End footer Area =================-->
</body>

<!-- MENSAJE DE GUARDADO -->
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

<!-- MENSAJE DE SI HAY DATOS GUARDADOS -->
<?php if (isset($_SESSION['EXISTE'])) { 
  if ($_SESSION['EXISTE']==1){ ?>
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
  icon: 'info',
  title: 'Ya tiene resultados !!'
})
}
ejecutarEjemplo();
</script>
<?php $_SESSION['EXISTE']=0; } }?>

</html>
<?php  } else {
  header("Location:inicio.php");
} ?>