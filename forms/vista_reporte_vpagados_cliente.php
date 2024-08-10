<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<?php  if ($perfil == 1 || $perfil == 2){ ?>
<!--================Header Menu Area =================-->
<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" type="text/css" href="css/bvselect.css"> -->

<link rel="stylesheet" href="css/jquery-ui.css">

<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
  <!--================ Banner Area =================-->
  <style media="screen" type="text/css">
    .espacio_combo{
      position: absolute;
    }
    .select_busq2{
      position:  relative;
    }
    .espacio_combo{
      position: absolute;
    }
  </style>

  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content text-left">
          <h2></h2>
          <div class="page_link">
            <a href="inicio.php">Inicio</a>
            <a href="vista_reporte_vpagados_cliente.php">Reporte Pagos por Paciente</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container-login100" style="background: #B8E1F7;">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54 m-b-50">
        <form class="login100-form validate-form" method="post" action="report\reporte_vp_cliente.php" name="formix" id="formix" target="_blank">   <!--abrir formulario cuando inicia sesion-->
          <span class="login100-form-title p-b-49">
            Pagos por Paciente
          </span>
          <div class="parados">
          <div class="wrap-input40 validate-input m-b-23" data-validate = "Nombre es requerido">
            <span class="label-input40">Fecha Inicio</span>
            <input class="input40" type="date" name="inicio" id="fecha1" onchange="validar_fecha1(this.value);">
          </div>
          <div class="wrap-input40 validate-input m-b-23" data-validate = "Nombre es requerido">
            <span class="label-input40">Fecha Fin</span>
            <input class="input40" type="date" name="fin" id="fecha2" onchange="validar_fecha2(this.value);">
          </div>
        </div>

<?php
  $result = mysqli_query($con,"SELECT * FROM paciente");
  $array = array();
  if($result){
    while ($row = mysqli_fetch_array($result)) {
      $equipos = utf8_encode($row['id_paciente']."-".$row['nombres']." ".$row['apellidos']);
      $equipo = utf8_decode($equipos);
      array_push($array, $equipo); // equipos
    }
  }
?>
        <div class="row">
          <div class="col-md-10">
            <div class="wrap-input100 validate-input m-b-23 m-r-10">
              <span class="label-input100">Paciente</span>
              <input class="input100" type="text" name="paciente" id="busqueda" onkeypress="return soloLetras(event)" placeholder="Buscar Paciente" title="Digite el nombre del paciente" required>
              <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>
          </div>
        </div>
          

          <br><br>
          <div class="container-login100-form-btn">
            <div class="wrap-login40-form-btn-aceptar">
              <div class="login100-form-bgbtn-aceptar"></div>
              <input class="login100-form-btn-aceptar" type="submit" value="Guardar">
            </div>
            <div class="wrap-login40-form-btn-cancelar">
              <div class="login100-form-bgbtn-cancelar"></div>
              <a href="inicio.php" class="txt2">
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
<script type="text/javascript">
  $(document).ready(function () {
    var items = <?= json_encode($array); ?>;

    $("#busqueda").autocomplete({
      source: items,
      select: function (event, item) {
        var params = {
          equipo: item.item.value
        };
        $.get("getEquipo.php", params, function (response) {
          var json = JSON.parse(response);
          if (json.status == 200){
          }else{
            
          }
        }); // ajax
        
        var dtid = params['equipo'].split("-");
        var url2='report/reporte_vp_cliente.php?id='+dtid[0];
	    document.getElementById('formix').action=url2;
      }
    });
  });
</script>

<script type="text/javascript">
  function validar_fecha1() {
    var fecha = new Date();
    var dd = fecha.getDate();
    var mm = fecha.getMonth()+1;
    var yyyy = fecha.getFullYear();
    if(dd<10){ dd='0'+dd; }
    if(mm<10){ mm='0'+mm; }
    fecha_actual=yyyy+'-'+mm+'-'+dd;
    var fecha_ini=document.getElementById('fecha1').value;

    if (fecha_ini>fecha_actual) {
      Swal.fire("Fecha Incorrecta");
      document.getElementById('fecha1').value="";
    }
  }

  function validar_fecha2() {
    var fecha_ini=document.getElementById('fecha1').value;
    var fecha_fin=document.getElementById('fecha2').value;
    if (fecha_fin<fecha_ini) {
      Swal.fire("Fecha Incorrecta");
      document.getElementById('fecha2').value="";
    }
  }
</script>
<!--================ End footer Area =================-->
<?php //include('scripts.php'); ?>

</body>
</html>

<?php  } else {  header("Location:inicio.php"); } ?>
