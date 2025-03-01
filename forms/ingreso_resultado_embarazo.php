<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<?php  if ($perfil == 1 || $perfil == 2){ ?>
<?php
    if (isset($_REQUEST['idc']) && isset($_REQUEST['idp']) ) {
        $idcab=$_REQUEST['idc'];
        $idpac=$_REQUEST['idp'];
    }else{
        $idpac="";
        $idcab="";
    }

    $cons=mysqli_query($con,"SELECT * FROM paciente WHERE id_paciente='$idpac'");
    $data=mysqli_fetch_array($cons);
    $nombres = $data['nombres']." ".$data['apellidos'];

    $consulta=mysqli_query($con,"SELECT * FROM cabecera_examen CE INNER JOIN paciente P ON CE.id_paciente=P.id_paciente WHERE cabecera_exa_id='$idcab'");
    $row=mysqli_fetch_array($consulta);

    $estadoexa = $row['estado_exa_id'];

    $consulta2=mysqli_query($con,"SELECT detalle_examen_dscrp FROM detalle_examen WHERE cabecera_exa_id='$idcab'");
    $examenes= array();
    while ($c = mysqli_fetch_assoc($consulta2)) {
        //var_dump($c);
        $examenes[] = $c['detalle_examen_dscrp'];
    }
?>
<!--================Header Menu Area =================-->
<script>
    function valida(e){
        tecla = (document.all) ? e.keyCode : e.which;

        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }    
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9.,]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
</script>
<!--================ Banner Area =================-->

<link rel="stylesheet" href="../css/estilos1.css">

<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container" >
      <div class="banner_content text-left">
        <h2>Ingreso de Resultados</h2>
        <div class="page_link">
            <a href="inicio.php">Inicio</a>
            <a href="buscar_examenes.php">Buscar Examen</a>
            <a href="lista_examenes.php?idc=<?php echo $idcab; ?>&idp=<?php echo $idpac; ?>">Lista Examenes</a>
            <a href="ingreso_resultado_embarazo.php?idc=<?php echo $idcab; ?>&idp=<?php echo $idpac; ?>">Ingresar Resultados</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Banner Area =================-->

<!--================ Start Appointment Area =================-->

<div class="container-login100" style="background: #B8E1F7;">

    <div class="wrap-login600 p-l-55 p-r-55 p-t-65 p-b-54 formu_grande">
      <!-- <form class="login100-form validate-form" method="post" action="" name="formix" id="formix"onsubmit=" return fun_insertar()"> -->
        <form class="login100-form validate-form formulario" method="post" action="app/guardarResultadoEmbarazo.php?idc=<?php echo $idcab; ?>&idp=<?php echo $idpac; ?>" name="formix" id="formix">
        <!--abrir formulario cuando inicia sesion-->
            <span class="login100-form-title p-b-49">
              Examen de Sangre
            </span>

            <div style="display: flex;">
                <label for=""><b>Paciente: </b></label><h6 class="m-l-20 m-t-3"><?php echo $nombres; ?></h6>
                <select class="m-l-150" name="privacidad" id="privacidad">
                    <option value="1">Normal</option>
                    <option value="2">Confidencial</option>
                </select>
            </div>  
         
            <div class="parados">
                <spam style="margin-left: 1px; padding: 5px 10px 5px 15px; width: 100%; color: black;">
                    Examen de Sangre - Embarazo:
                    <!-- <input type="button" value="+" class="btn_ingreso_resultado" title="Agregar" onclick="agregar()">
                    <input type="button" value="-" class="btn_ingreso_resultado" title="Quitar" onclick="borrarUltima()"> -->
                </spam>
                <input type="text" value="Examen de Sangre - Embarazo" name="tiposeccion[]" style="display: none;">
            </div>

            <div class="contenedor_resultado">
                <div class="fila_resultado parte_arriba">
                    <div class="nombre_res"><label for="">Nombre</label></div>
                    <div class="nombre_res"><label for="">Resultado</label></div>
                    <div class="nombre_res"><label for="">Unidades</label></div>
                    <div class="nombre_res"><label for="">Referenciales</label></div>
                </div>
                <div class="fila_resultado parte_abajo">
                    <div class="fila_contenido_resultado">
                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="text" name="resultado[]" id="pruebaemb" value="Prueba de Embarazo" style="width: 165px;" readonly>
                                </div>
                            </div>
                            <div class="columna_resultado m-l-50">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="emb2">
                                        <option value=""> - </option>
                                        <option value="POSITIVO">POSITIVO</option>
                                        <option value="NEGATIVO">NEGATIVO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <select name="opcion[]" id="emb2">
                                        <option value="-"> - </option>
                                        <option value="mg/dl">mg/dl</option>
                                        <option value="gr">gr</option>
                                        <option value="ml">ml</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-30">
                                    <select name="opcion[]" id="gl3">
                                        <option value="-"> - </option>
                                        <option value="30 a 60">30 a 60</option>
                                        <option value="70 a 100">70 a 100</option>
                                        <option value="110 a 130">110 a 130</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido">
                            <div id="contenidos" style="display: block; width: 100%; color: white;">
                                <!-- aqui aparecen los demas select -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script src="../forms/js/selecResultado.js"></script>

<script type="text/javascript">
var contLin = 0;
localStorage.setItem("conta_tb",contLin);
function agregar() {
  var contenidog, b;
  contLin = contLin + 1;

  b += "<div class='contenedor_nuevo'><div class='columna_resultado'><div class='opcion_res'><input type='text' name='opcion2[]' id='pl'></div></div>";

  b += "<div class='columna_resultado'><div class='opcion_res'><input type='number' name='opcion2[]' id='pl'></div></div>";

  b += "<div class='columna_resultado'><div class='opcion_res'><select name='opcion2[]' id='' style='display:none'><option value=''>NULL</option><option value='mg/dl'>mg/dl</option><option value='gr'>gr</option><option value='ml'>ml</option></select><div style='color: #777777;' class='nice-select' tabindex='0'><span class='current'>-SELECCIONAR-</span><ul class='list'><li data-value='mg/dl' class='option'>mg/dl</li><li data-value='gr' class='option'>gr</li><li data-value='ml' class='option'>ml</li></ul></div></div></div>";

  b += "<div class='columna_resultado'><div class='opcion_res'><input type='text' name='opcion2[]' id='pl' style='width: 98px;'></div></div></div><br>";

  contenidog = document.getElementById('contenidos').innerHTML;
  

  b = contenidog + b;
    document.getElementById('contenidos').innerHTML=b;
    localStorage.setItem("conta_tb",contLin);

  // if (contenidog!='') {
    
  // }else{
  //   alert ();
  // }
  
}
function borrarUltima() {
  //ultima = document.all.tabla2.rows.length - 1;
  var contenidog = document.getElementById('contenidos').innerHTML;
  if(contenidog != ''){
    var p='';
    //vr = contenidog.split('<br>')[0];
    pr = parseInt(localStorage.getItem('conta_tb'))-1;
    //alert (pr);
    for (var i = 0; i < parseInt(pr); i++) {
        p += contenidog.split('<br>')[i]+"<br>";
        //alert (p);
    }
    
    document.getElementById('contenidos').innerHTML=p;
    //document.all.tabla2.deleteRow(ultima);
    contLin--;
    localStorage.setItem("conta_tb",contLin);
  }
}
</script>


            <div class="parados">
            </div>

            <br><br>

            <div class="container-login100-form-btn">
          		<div class="wrap-login40-form-btn-aceptar">
          			<div class="login100-form-bgbtn-aceptar"></div>
          			<input class="login100-form-btn-aceptar" type="button" value="Guardar" onclick="pregunta()">
                </div>
                <div class="wrap-login40-form-btn-cancelar">
                    <div class="login100-form-bgbtn-cancelar"></div>
                    <a href="lista_examenes.php?idc=<?php echo $idcab; ?>&idp=<?php echo $idpac; ?>" class="txt2">
                        <button type="button" name="botones" id="botones" class="login100-form-btn">
                          Regresar
                        </button>
                    </a>
                </div>
            </div>
        </form>
    

  </div>
<!--================ End Appointment Area =================-->

<script language="JavaScript">
function pregunta(){
    var msg = '';
    var msn = '';
    var verificar=0;

    var formularios = document.forms;

    for (var i=0; i<formularios.length;i++){
        for (var j=0; j<formularios[i].elements.length-2; j++){
            // if (j<2) {
            //     var primero = formularios[i].elements[0].value;
            //     var primeros = formularios[i].elements[0];
            //     var segundo = formularios[i].elements[1].value;
            //     var segundos = formularios[i].elements[1];
            // }
            if (j>1) {
                var contenido = formularios[i].elements[j].value;
                var estachk = formularios[i].elements[j].checked;
                if (contenido=="") {
                    verificar = verificar + 1; //cuantos check estan sin checkear
                }
            }
      // msg = msg + '\n\nElemento '+j+ ' del formulario '+(i+1)+ ' tiene id: '+ formularios[i].elements[j].id;
      // msg = msg + ' y name: ' + formularios[i].elements[j].name;  
        } //FIN DEL SEGUNDO FOR
    } //FIN DEL PRIMER FOR
    if(verificar>=1){
        Swal.fire('Complete todos los campos');
    }else{
        verificar = '';
        const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: 'Guardar Datos?',
                  text: "",
                  icon: 'question',
                  showCancelButton: true,
                  confirmButtonText: 'Si, guardar!',
                  cancelButtonText: 'No, cancelar!',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                      document.getElementById('formix').submit();
                  } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                  ) {

                  }
                })
}
}
</script>

<!--================ start footer Area =================-->

<?php include('scripts.php'); ?>
<!--================ End footer Area =================-->
</body>

</html>

<?php  } else {
  header("Location:inicio.php");
} ?>

<!-- GUARDADO -->
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