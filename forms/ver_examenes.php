<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<?php
    if (isset($_REQUEST['idc']) && isset($_REQUEST['idp']) ) {
        $idcab=$_REQUEST['idc'];
        $idpac=$_REQUEST['idp'];
    }else{
        $idpac="";
        $idcab="";
    }
    $consulta=mysqli_query($con,"SELECT * FROM cabecera_examen CE INNER JOIN paciente P ON CE.id_paciente=P.id_paciente WHERE cabecera_exa_id='$idcab'");
    $row=mysqli_fetch_array($consulta);
    $fecha=explode(' ', $row['fecha_ingreso_exa']);
    $fechan=$fecha[0];

    $consulta2=mysqli_query($con,"SELECT detalle_examen_dscrp FROM detalle_examen WHERE cabecera_exa_id='$idcab'");
    $examenes= array();
    while ($c = mysqli_fetch_assoc($consulta2)) {
        //var_dump($c);
        $examenes[] = $c['detalle_examen_dscrp'];
    }
?>
<!--================Header Menu Area =================-->

<!--================ Banner Area =================-->

<link rel="stylesheet" href="../css/estilos1.css">

<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container" >
      <div class="banner_content text-left">
        <h2>Detalle del Examen</h2>
        <div class="page_link">
            <a href="inicio.php">Inicio</a>
            <a href="buscar_examenes.php">Buscar Examen</a>
            <!-- <a href="https://www.laboratoriololy.com/forms/buscar_examenes.php">Buscar Examen</a> -->
            <a href="ver_examenes.php?idp=<?php echo $idpac; ?>&idc=<?php echo $idcab; ?>">Detalle Examen</a>
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

    <div class="wrap-login600 p-l-55 p-r-55 p-t-65 p-b-54 formu_grande">
      <!-- <form class="login100-form validate-form" method="post" action="" name="formix" id="formix"onsubmit=" return fun_insertar()"> -->
        <form class="login100-form validate-form formulario" method="post" action="" name="formix" id="formix">
        <!--abrir formulario cuando inicia sesion-->
            <span class="login100-form-title p-b-49">
              Detalle de Examen
            </span>

            <div class="parados">
                <div class="col-md-2">
                    <div class="wrap-input100 m-b-23">
                    <span class="label-input100">Fecha</span>
                    <p class="input100" style="padding-left: 25px; padding-top: 20px; height: 35px;"> <?php echo $fechan; ?> </p>
                    <span class="focus-input100" data-symbol=""></span>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5" data-validate = "Nombre es requerido">
                    <div class="wrap-input100 m-b-23">
                    <span class="label-input100">Paciente</span>
                    <p class="input100" style="padding-left: 30px; padding-top: 20px; height: 35px;"> <?php echo $row['nombres'].' '.$row['apellidos']; ?> </p>
                    <span class="focus-input100" data-symbol=""></span>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3" data-validate = "Nombre es requerido">
                    <div class="wrap-input100 m-b-23">
                    <span class="label-input100">Cédula</span>
                    <p class="input100" style="padding-left: 25px; padding-top: 20px; height: 35px;"> <?php echo $row['identificacion']; ?> </p>
                    <span class="focus-input100" data-symbol=""></span>
                    </div>
                </div>
            </div>

<link href="https://www.jqueryscript.net/css/jquerysctipttop.css?v3" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<style>
body { min-height: 100vh;  font-family: 'Roboto'; }
#carbonads {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
  Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial,
  sans-serif;
}

#carbonads {
  display: block;
  overflow: hidden;
  max-width: 728px;
  position: relative;
  font-size: 22px;
  box-sizing: content-box;
}

#carbonads > span {
  display: block;
}

#carbonads a {
  color: inherit;
  text-decoration: none;
}

#carbonads a:hover {
  color: inherit;
}

.carbon-wrap {
  display: flex;
  align-items: center;
}

.carbon-img {
  display: block;
  margin: 0;
  line-height: 1;
}

.carbon-img img {
  display: block;
  height: 90px;
  width: auto;
}

.carbon-text {
  display: block;
  padding: 0 1em;
  line-height: 1.35;
  text-align: left;
}

.carbon-poweredby {
  display: block;
  position: absolute;
  bottom: 0;
  right: 0;
  padding: 6px 10px;
  hsla(203, 11%, 95%, 0.8);
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  font-weight: 600;
  font-size: 8px;
  border-top-left-radius: 4px;
  line-height: 1;
  color:#aaa !important
}
.row {
  background: #f8f9fa;
  margin-top: 20px;
}

.col {
  border: solid 1px #6c757d;
  padding: 10px;
}
.nuevo_select{
    background: red;
    display: none;
}
.nueva_clase span{
    color: #475757;
}
.custom-control-label{
    width: 250px;
}
.dropdown-menu{
    column-count: 2;
}
.form-control{
    margin-top: 22px;
}
@media only screen and (min-width: 320px) and (max-width: 759px) {
  .carbon-text {
    font-size: 14px;
  }
}
</style>
            <br>
<?php
$datos = explode('*',$row['tipo_examen']);
$cuenta = count($datos);
$parte = $datos[0];
$arreglo = array($datos);
?>
            <div class="parados">
                <div class="col-md-7 nueva_clase">
                    <span class="label-input100 m-b-30">Tipo de Exámen</span>
                    <select name="states[]" id="example" class="form-control nuevo_select"  multiple="multiple" readonly>
                        <option <?php $val='Examen Orina'; if(in_array($val, $arreglo)){$sel='selected="selected"'; }else{$sel=''; } ?> value="Examen Orina">Examen Orina</option>
                        <option <?php $val='Examen Físico - Químico de Orina'; if(in_array($val, $datos)){$sel='selected="selected"'; }else{$sel=''; } echo $sel; ?> value="Examen Físico - Químico de Orina">Examen Físico - Químico de Orina</option>
                        <option <?php $val='Examen de Sangre'; if(in_array($val, $datos)){$sel='selected="selected"'; }else{$sel=''; } echo $sel; ?> value="Examen de Sangre">Examen de Sangre</option>
                        <option <?php $val='Examen de Sangre - Embarazo'; if(in_array($val, $datos)){$sel='selected="selected"'; }else{$sel=''; } echo $sel; ?> value="Examen de Sangre - Embarazo">Examen de Sangre - Embarazo</option>
                        <option <?php $val='Examen de Secreción'; if(in_array($val, $datos)){$sel='selected="selected"'; }else{$sel=''; } echo $sel; ?> value="Examen de Secreción">Examen de Secreción</option>
                        <option <?php $val='Nuevo Examen'; if(in_array($val, $datos)){$sel='selected="selected"'; }else{$sel=''; } echo $sel; ?> value="Nuevo Examen">Nuevo Examen</option>
                    </select>
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-3">
                    <div class="wrap-input100 m-b-23 m-r-12">
                        <span class="label-input100">Precio</span>
                        <input class="input100" type="text" name="precio" id="precio" onkeypress="return valida(event)" maxlength="6" value="<?php echo $row['precio_examen']; ?>" readonly>
                        <span class="focus-input100" data-symbol=""></span>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>
            <br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" ></script>
<script src="multi_select/dist/js/BsMultiSelect.js"></script>
<script>
$("select").bsMultiSelect({cssPatch : {
                   choices: {columnCount:'2' },
                }});</script>
<script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

            <div class="parados">
                <div class="col-md-5" style="margin-left: -10px;">
                    <div class="wrap-input100 m-b-23">
                    <span class="label-input100">Doctor Externo</span>
                    <input class="input100" style="padding-left: 27px;" type="text" name="doctorex" id="doctorex" maxlength="75" onkeypress="return soloLetras(event)" value="<?php echo $row['doctor_externo']; ?>" readonly>
                    <span class="focus-input100" data-symbol=""></span>
                    </div>
                </div>
                <div class="wrap-input100 m-b-23 m-r-12">
                    <span class="label-input100" id="titabo">Tipo de Pago</span>
                    <input class="input100" type="text" name="abono" id="abono" maxlength="6" placeholder="0" onkeypress="return valida(event)" value="<?php if($row['tipo_pago']==1){$sel='Pagado';}else{$sel='Abonado'; } echo $sel; ?>" readonly>
                    <span class="focus-input100" data-symbol=""></span>
                </div>
                <div class="wrap-input100 m-b-23">
                    <span class="label-input100" id="titabo">Valor</span>
                    <input class="input100" type="text" name="abono" id="abono" maxlength="6" placeholder="0" onkeypress="return valida(event)" value="<?php echo $row['abono']; ?>" readonly>
                    <span class="focus-input100" data-symbol=""></span>
                </div>
            </div>
            <br>

            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">Examenes:</h2>
                <?php
                    $consulta3=mysqli_query($con,"SELECT * FROM detalle_examen WHERE cabecera_exa_id='$idcab'");
                    while($row3=mysqli_fetch_array($consulta3)){ ?>
                    <input type="checkbox" id="Hematies" name="Name[]" value="<?php echo $row3['detalle_examen_dscrp']; ?>" checked disabled>
                <label for="Hematies"><?php echo $row3['detalle_examen_dscrp']; ?></label>
                <?php } ?>
            </div>

            <div class="parados">
            </div>

            <!-- <div class="form">
                <a href="#" class="btn btn-success" title="Ingresar Resultados">Ingresar Resultados</a>
                <a href="#" class="btn btn-dark" title="Ver Detalles de Orden de Examen">Ver</a>
            </div> -->

            <br><br>

            <div class="container-login100-form-btn">

          		<!-- <div class="wrap-login40-form-btn-aceptar">
          			<div class="login100-form-bgbtn-aceptar"></div>
          			<button class="login100-form-btn-aceptar">
                      Guardar
                    </button>
                </div> -->
                <div class="wrap-login40-form-btn-cancelar">
                    <div class="login100-form-bgbtn-cancelar"></div>
                    <a href="buscar_examenes.php" class="txt2">
                    <!-- <a href="https://www.laboratoriololy.com/forms/buscar_examenes.php" class="txt2"> -->
                        <button type="button" name="botones" id="botones" class="login100-form-btn">
                          Regresar
                        </button>
                    </a>
                </div>
            </div>
        </form>
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