<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<?php  if ($perfil == 1 || $perfil == 2){

  if (isset($_POST['inicio']) || isset($_POST['fin'])) {
    if ($_POST['inicio']!="" || $_POST['fin']!="") {
      $inicio=$_POST['inicio'];
      $fin=$_POST['fin'];
      $query=" WHERE R.cabecera_resultado_fechai Between '$inicio' and '$fin' ";
      $fechas="Fecha desdes ".$inicio." hasta ".$fin;
    }else {
      $query="";
      $fechas="";
    }
  }else {
    $query="";
    $fechas="";
  }

?>

<!--================Header Menu Area =================-->
<link rel="stylesheet" type="text/css" href="report/jqplot/jquery.jqplot.min.css" />
<link rel="stylesheet" type="text/css" href="report/jqplot/examples.min.css" />
<link type="text/css" rel="stylesheet" href="report/jqplot/shCoreDefault.min.css" />
<link type="text/css" rel="stylesheet" href="report/jqplot/shThemejqPlot.min.css" />
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<style media="screen">
  .jqplot-table-legend td{
    background: #ffffff;
    color: #494747;
  }
  .jqplot-title{
    color: #201f1f;
  }
</style>
  <!--================ Banner Area =================-->

  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content text-left">
          <h2>GRAFICA DE EXAMENES POR FOTMATO</h2>
          <div class="page_link">
            <a href="inicio.php">Inicio</a>
            <a href="graficas_formt_exa.php">Grafica de Examenes po Formato</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container-login100" style="background: #B8E1F7;">


        <div class="col1" id="example-content">
          <div id="chart4" style="margin-top:20px; margin-left:20px; width:700px; height:450px; color:#fff;"></div>
        </div>



    </div>
  <!--================ End Appointment Area =================-->
  <!--================ End footer Area =================-->
  <?php include('scripts.php'); ?>


  <script type="text/javascript">$(document).ready(function(){
    var goog = [];
    var n_exa=0;
    var tip_exa=0;
<?php

$consulta1=mysqli_query($con,"SELECT cabecera_tipo_formato, COUNT(cabecera_resultado_id) num ,formato_nombre FROM cabecera_resultado R inner join tipo_formato F on F.formato_id=R.cabecera_tipo_formato ".$query." GROUP BY R.cabecera_tipo_formato  ");
 while($row1=mysqli_fetch_array($consulta1)){
   $t_ex=$row1['formato_nombre'];
   $n_ex=$row1['num'];
?>
var tip_exa='<?php echo $t_ex; ?>';
var n_exa='<?php echo $n_ex; ?>';
  goog.push([n_exa+' '+tip_exa,parseInt(n_exa)]);
<?php } ?>
var txtfechas='<?php echo $fechas; ?>';

    plot4 = jQuery.jqplot('chart4', [goog], {
        title: txtfechas,
        seriesDefaults: {shadow: false, renderer: jQuery.jqplot.PieRenderer, rendererOptions: { sliceMargin: 4, showDataLabels: true } },
        legend: { show:true, location: 'e' }
      }
    );
  });
  </script>

  <script  type="text/javascript" src="report/jqplot/jquery.jqplot.min.js"></script>
  <script type="text/javascript" src="report/jqplot/shCore.min.js"></script>
  <script type="text/javascript" src="report/jqplot/shBrushJScript.min.js"></script>
  <script type="text/javascript" src="report/jqplot/shBrushXml.min.js"></script>
  <script  type="text/javascript" src="report/jqplot/jqplot.pieRenderer.min.js"></script>
  <!-- <script type="text/javascript" src="report/jqplot/example.min.js"></script> -->

</body>

</html>

<?php  } else {  header("Location:../inicio.php"); } ?>
