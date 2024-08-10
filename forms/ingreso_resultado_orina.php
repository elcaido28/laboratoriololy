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
            <a href="ingreso_resultado_orina.php?idc=<?php echo $idcab; ?>&idp=<?php echo $idpac; ?>">Ingresar Resultados</a>
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
        <form class="login100-form validate-form formulario" method="post" action="app/guardarResultadoOrina.php?idc=<?php echo $idcab; ?>&idp=<?php echo $idpac; ?>" name="formix" id="formix">
        <!--abrir formulario cuando inicia sesion-->
            <span class="login100-form-title p-b-49">
              Examen de Orina
            </span>

            <div style="display: flex;">
                <label for=""><b>Paciente: </b></label><h6 class="m-l-20 m-t-3"><?php echo $nombres; ?></h6>
                <select class="m-l-150" name="privacidad" id="privacidad">
                    <option value="1">Normal</option>
                    <option value="2">Confidencial</option>
                </select>
            </div>
         
<script src="../forms/js/selecResultadoOrina.js"></script>

            <div class="parados">
                <spam style="margin-left: 1px; padding: 5px 10px 5px 15px; width: 100%; color: black">
                    Bacteriología Cultivo - Antibiograma de Orina:
                    <input type="button" value="+" class="btn_ingreso_resultado" title="Agregar" onclick="agregar2()">
                    <input type="button" value="-" class="btn_ingreso_resultado" title="Quitar" onclick="borrarUltima2()">
                </spam>
                <input type="text" value="Bacteriologia Cultivo - Antibiograma de Orina" name="tiposeccion[]" style="display: none;">
            </div> 

            <div class="contenedor_resultado">
                <div class="fila_resultado parte_abajo">
                    <div class="fila_contenido_resultado">
                        <div class="fila_agrupa_contenido">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="contcol" onchange="cambio4()">
                                        <option value="Contaje de Colonias">Contaje de Colonias</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="text" name="opcion[]" id="opcontcol">
                                </div>
                            </div>
                            <div class="columna_resultado">
                            </div>
                            <div class="columna_resultado">
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="microorganismo" onchange="cambio5()">
                                        <option value="Microorganismo">Microorganismo</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="text" name="opcion[]" id="opmicroorganismo" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                            </div>
                            <div class="columna_resultado">
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido">
                            <div id="contenidos2" style="display: block; width: 100%; color: white;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript">
var contLin2 = 0;
localStorage.setItem("conta_tb2",contLin2);
function agregar2() {
  var contenidog2, b2;
  contLin2 = contLin2 + 1;

  b2 += "<div class='contenedor_nuevo'><div class='columna_resultado'><div class='opcion_res'><input type='text' name='opcion3[]' id='pl'></div></div>";

  b2 += "<div class='columna_resultado'><div class='opcion_res'><input type='text' name='opcion3[]' id='pl'></div></div>";

  b2 += "<div class='columna_resultado'></div>";

  b2 += "<div class='columna_resultado'></div></div><br>";
  
  contenidog2 = document.getElementById('contenidos2').innerHTML;
  

  b2 = contenidog2 + b2;
    document.getElementById('contenidos2').innerHTML=b2;
    localStorage.setItem("conta_tb2",contLin2);

  // if (contenidog!='') {
    
  // }else{
  //   alert ();
  // }
  
}
function borrarUltima2() {
  //ultima = document.all.tabla2.rows.length - 1;
  var contenidog2 = document.getElementById('contenidos2').innerHTML;
  if(contenidog2 != ''){
    var p2='';
    //vr = contenidog.split('<br>')[0];
    pr2 = parseInt(localStorage.getItem('conta_tb2'))-1;
    // alert (pr);
    for (var i2 = 0; i2 < parseInt(pr2); i2++) {
        p2 += contenidog2.split('<br>')[i2]+"<br>";
        //alert (p);
    }
    
    document.getElementById('contenidos2').innerHTML=p2;
    //document.all.tabla2.deleteRow(ultima);
    contLin2--;
    localStorage.setItem("conta_tb2",contLin2);
  }
}
</script>



            <div class="parados">
                <spam style="margin-left: 1px; padding: 5px 10px 5px 15px; width: 100%; color: black">
                    Antibiograma:
                    <input type="button" value="+" class="btn_ingreso_resultado" title="Agregar" onclick="agregar3()">
                    <input type="button" value="-" class="btn_ingreso_resultado" title="Quitar" onclick="borrarUltima3()">
                </spam>
                <input type="text" value="Antibiograma" name="tiposeccion[]" style="display: none;">
            </div>
            <div class="contenedor_resultado">
                <div class="fila_resultado parte_abajo">
                    <div class="fila_contenido_resultado">
                        <div class="fila_agrupa_contenido">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="acinal" onchange="cambio6()">
                                        <option value="Acido Nalidixico">Acido Nalidixico</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <select name="opcion[]" id="opacinal">
                                        <option value="Sensible">Sensible</option>
                                        <option value="No sensible">No sensible</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                            </div>
                            <div class="columna_resultado">
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="amikacina" onchange="cambio7()">
                                        <option value="Amikacina">Amikacina</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <select name="opcion[]" id="opamikacina">
                                        <option value="Sensible">Sensible</option>
                                        <option value="No sensible">No sensible</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                            </div>
                            <div class="columna_resultado">
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="ampicilina" onchange="cambio8()">
                                        <option value="Ampicilina Sulbactam">Ampicilina Sulbactam</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <select name="opcion[]" id="opampicilina">
                                        <option value="Sensible">Sensible</option>
                                        <option value="No sensible">No sensible</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                            </div>
                            <div class="columna_resultado">
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="amoxicilina" onchange="cambio9()">
                                        <option value="Amoxicilina + AC Clavulanico">Amoxicilina + AC Clavulanico</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <select name="opcion[]" id="opamoxicilina">
                                        <option value="Sensible">Sensible</option>
                                        <option value="No sensible">No sensible</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                            </div>
                            <div class="columna_resultado">
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="nitrofuran" onchange="cambio10()">
                                        <option value="Nitrofurantoina">Nitrofurantoina</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <select name="opcion[]" id="opnitrofuran">
                                        <option value="Sensible">Sensible</option>
                                        <option value="No sensible">No sensible</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                            </div>
                            <div class="columna_resultado">
                            </div>
                        </div>
                        <div class="fila_agrupa_contenido">
                            <div id="contenidos3" style="display: block; width: 100%; color: white;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript">
var contLin3 = 0;
localStorage.setItem("conta_tb3",contLin3);
function agregar3() {
  var contenidog3, b3;
  contLin3 = contLin3 + 1;

  b3 += "<div class='contenedor_nuevo'><div class='columna_resultado'><div class='opcion_res'><input type='text' name='opcion4[]' id='pl'></div></div>";

  b3 += "<div class='columna_resultado'><div class='opcion_res m-l-20'><input type='text' name='opcion4[]' id='pl'></div></div>";

  b3 += "<div class='columna_resultado'></div>";

  b3 += "<div class='columna_resultado'></div></div><br>";
  
  contenidog3 = document.getElementById('contenidos3').innerHTML;
  

  b3 = contenidog3 + b3;
    document.getElementById('contenidos3').innerHTML=b3;
    localStorage.setItem("conta_tb3",contLin3);

  // if (contenidog!='') {
    
  // }else{
  //   alert ();
  // }
  
}
function borrarUltima3() {
  //ultima = document.all.tabla2.rows.length - 1;
  var contenidog3 = document.getElementById('contenidos3').innerHTML;
  if(contenidog3 != ''){
    var p3='';
    //vr = contenidog.split('<br>')[0];
    pr3 = parseInt(localStorage.getItem('conta_tb3'))-1;
    // alert (pr);
    for (var i3 = 0; i3 < parseInt(pr3); i3++) {
        p3 += contenidog3.split('<br>')[i3]+"<br>";
        //alert (p);
    }
    
    document.getElementById('contenidos3').innerHTML=p3;
    //document.all.tabla2.deleteRow(ultima);
    contLin3--;
    localStorage.setItem("conta_tb3",contLin3);
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
            if (j>2) {
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