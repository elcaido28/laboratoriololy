<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<?php  if ($perfil == 1 || $perfil == 2){ ?>
<!--================Header Menu Area =================-->

  <!--================ Banner Area =================-->
  <style media="screen" type="text/css">
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
            <a href="vista_reporte_empleados.php">Reporte de Empleados</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container-login100" style="background: #B8E1F7;">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54 m-b-50">
        <form class="login100-form validate-form" method="post" action="report\reporte_empleados.php" name="formix" id="formix" target="_blank">   <!--abrir formulario cuando inicia sesion-->
          <span class="login100-form-title p-b-49">
            Reporte de Empleados
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

  <?php include('scripts.php'); ?>
  <script src="js/jquery.dataTables.min.js" charset="utf-8"></script>

</body>

</html>

<?php  } else {  header("Location:inicio.php"); } ?>
