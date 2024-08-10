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
            <!-- <a href="listar_examen_resultado.php?id=<?php echo $idpac; ?>">Lista Examenes</a> -->
            <a href="ingreso_resultado_sangre.php?idc=<?php echo $idcab; ?>&idp=<?php echo $idpac; ?>">Ingresar Resultados</a>
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
        <form class="login100-form validate-form formulario" method="post" action="app/guardarResultadoSangre.php?idc=<?php echo $idcab; ?>&idp=<?php echo $idpac; ?>" name="formix" id="formix">
        <!--abrir formulario cuando inicia sesion-->
            <span class="login100-form-title p-b-49">
                Examen de Sangre
            </span>

            <div style="display: flex;">
                <label for=""><b>Paciente: </b></label><h6 class="m-l-20 m-t-3"><?php echo $nombres; ?></h6>
            </div>

            <div class="parados">
                <spam style="margin-left: 1px; padding: 5px 10px 5px 15px; width: 100%; color: black;">
                    Perfil Bioquímicos:
                    <input type="button" value="+" class="btn_ingreso_resultado" title="Agregar" onclick="agregar()">
                    <input type="button" value="-" class="btn_ingreso_resultado" title="Quitar" onclick="borrarUltima()">
                </spam>
                <input type="text" value="Perfil Bioquímicos" name="tiposeccion[]" style="display: none;">
            </div>

            <div class="contenedor_resultado">
                <div class="fila_resultado parte_arriba">
                    <div class="nombre_res"><label for="">Nombre</label></div>
                    <div class="nombre_res"><label for="">Resultados</label></div>
                    <div class="nombre_res"><label for="">Unidades</label></div>
                    <div class="nombre_res"><label for="">Referenciales</label></div>
                </div>
                <div class="fila_resultado parte_abajo">
                    <div class="fila_contenido_resultado">
                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="glucosas" onchange="cambio1()">
                                        <option value="Glucosa">Glucosa</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="gl1" onkeypress="return valida(event)">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <select name="opcion[]" id="gl2">
                                        <option value="mg/dl">mg/dl</option>
                                        <option value="gr">gr</option>
                                        <option value="ml">ml</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <select name="opcion[]" id="gl3">
                                        <option value="30 a 60">30 a 60</option>
                                        <option value="70 a 100">70 a 100</option>
                                        <option value="110 a 130">110 a 130</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="colesterol" onchange="cambio2()">
                                        <option value="Colesterol">Colesterol</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="c1" onkeypress="return valida(event)">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <select name="opcion[]" id="c2">
                                        <option value="mg/dl">mg/dl</option>
                                        <option value="gr">gr</option>
                                        <option value="ml">ml</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <select name="opcion[]" id="c3">
                                        <option value="30 a 60">30 a 60</option>
                                        <option value="70 a 100">70 a 100</option>
                                        <option value="110 a 130">110 a 130</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="trigliceridos" onchange="cambio3()">
                                        <option value="Trigliceridos">Trigliceridos</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="t1" onkeypress="return valida(event)">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <select name="opcion[]" id="t2">
                                        <option value="mg/dl">mg/dl</option>
                                        <option value="gr">gr</option>
                                        <option value="ml">ml</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <select name="opcion[]" id="t3">
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

<script type="text/javascript">
var contLin = 0;
localStorage.setItem("conta_tb",contLin);
function agregar() {
  var contenidog, b;
  contLin = contLin + 1;

  b += "<div class='contenedor_nuevo'><div class='columna_resultado'><div class='opcion_res'><input type='text' name='opcion2[]' id='pl'></div></div>";

  b += "<div class='columna_resultado'><div class='opcion_res'><input type='number' name='opcion2[]' id='pl'></div></div>";

  b += "<div class='columna_resultado'><div class='opcion_res m-l-20'><select name='opcion2[]' id='' style='display:none'><option value=''>NULL</option><option value='mg/dl'>mg/dl</option><option value='gr'>gr</option><option value='ml'>ml</option></select><div style='color: #777777;' class='nice-select' tabindex='0'><span class='current'>-SELECCIONAR-</span><ul class='list'><li data-value='mg/dl' class='option'>mg/dl</li><li data-value='gr' class='option'>gr</li><li data-value='ml' class='option'>ml</li></ul></div></div></div>";

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
<script>
function calculo(){
    var cont_tabla=localStorage.getItem('conta_tb');

    if(cont_tabla=="0"){
    var producto=document.getElementById("producto").value;
    var cantidad=document.getElementById("cantidad").value;
    var presentacion=document.getElementById("presentacion").value;
}else if(cont_tabla>"0") {
    var id_producto='producto'+cont_tabla;
    var id_cantidad='cantidad'+cont_tabla;
    var id_presentacion='presentacion'+cont_tabla;
    var producto1=document.getElementById(id_producto).value;
    var cantidad1=document.getElementById(id_cantidad).value;
    var presentacion1=document.getElementById(id_presentacion).value;
}
var con=localStorage.getItem('conta_tb');
var url1='guardar_receta.php?cont='+con+'';
document.getElementById('form21').action=url1;
}
</script>



            <div class="parados">
                <spam style="margin-left: 1px; padding: 5px 10px 5px 15px; width: 100%; color: black">
                    Examen Físico-Químico de Orina:
                    <input type="button" value="+" class="btn_ingreso_resultado" title="Agregar" onclick="agregar2()">
                    <input type="button" value="-" class="btn_ingreso_resultado" title="Quitar" onclick="borrarUltima2()">
                </spam>
                <input type="text" value="Examen Físico-Químico de Orina" name="tiposeccion[]" style="display: none;">
            </div> 

            <div class="contenedor_resultado">
                <div class="fila_resultado parte_abajo">
                    <div class="fila_contenido_resultado">
                        <div class="fila_agrupa_contenido">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="color" onchange="cambio4()">
                                        <option value="Color">Color</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opcolor">
                                        <option value="Amarillo">Amarillo</option>
                                        <option value="Rojo">Rojo</option>
                                        <option value="Naranja">Naranja</option>
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
                                    <select name="resultado[]" id="aspecto" onchange="cambio5()">
                                        <option value="Aspecto">Aspecto</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opaspecto">
                                        <option value="Turbio">Turbio</option>
                                        <option value="Turbio">Claro</option>
                                        <option value="Turbio">Denso</option>
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
                                    <select name="resultado[]" id="densidad" onchange="cambio6()">
                                        <option value="Densidad">Densidad</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="text" name="opcion[]" id="txtdensidad">
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
                                    <select name="resultado[]" id="ph" onchange="cambio7()">
                                        <option value="PH">PH</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="text" name="opcion[]" id="txtph">
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
                                    <select name="resultado[]" id="glucosaColesterol" onchange="cambio8()">
                                        <option value="Glucosaplus">Glucosa</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opglucosa">
                                        <option value="Negativo">NEGATIVO</option>
                                        <option value="Positivo">POSITIVO</option>
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
                                    <select name="resultado[]" id="nitritos" onchange="cambio9()">
                                        <option value="Nitritos">Nitritos</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opnitritos">
                                        <option value="Negativo">NEGATIVO</option>
                                        <option value="Positivo">POSITIVO</option>
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
                                    <select name="resultado[]" id="cetonicos" onchange="cambio10()">
                                        <option value="C. Cetonicos">C. Cetonicos</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opcetonico">
                                        <option value="Negativo">NEGATIVO</option>
                                        <option value="Positivo">POSITIVO</option>
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
                                    <select name="resultado[]" id="proteina" onchange="cambio11()">
                                        <option value="Proteínas">Proteínas</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opproteina">
                                        <option value="Negativo">NEGATIVO</option>
                                        <option value="Positivo">POSITIVO</option>
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
                                    <select name="resultado[]" id="uroblino" onchange="cambio12()">
                                        <option value="Uroblinogeno">Uroblinogeno</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opuroblino">
                                        <option value="Negativo">NEGATIVO</option>
                                        <option value="Positivo">POSITIVO</option>
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
                                    <select name="resultado[]" id="bilirrubin" onchange="cambio13()">
                                        <option value="Bilirrubinas">Bilirrubinas</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opbilirrubin">
                                        <option value="Negativo">NEGATIVO</option>
                                        <option value="Positivo">POSITIVO</option>
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
                                    <select name="resultado[]" id="sangre" onchange="cambio14()">
                                        <option value="Sangre">Sangre</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opsangre">
                                        <option value="Negativo">NEGATIVO</option>
                                        <option value="Positivo">POSITIVO</option>
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
                                    <select name="resultado[]" id="acidoasc" onchange="cambio15()">
                                        <option value="Acido Ascorbico">Acido Ascorbico</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opacidoasc">
                                        <option value="Negativo">NEGATIVO</option>
                                        <option value="Positivo">POSITIVO</option>
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
                                    <select name="resultado[]" id="leucocitos" onchange="cambio16()">
                                        <option value="Leucocitos">Leucocitos</option>
                                        <option value="Null2">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opleucocitos">
                                        <option value="Negativo">NEGATIVO</option>
                                        <option value="Positivo">POSITIVO</option>
                                    </select>
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

  b2 += "<div class='columna_resultado'><div class='opcion_res'><select name='opcion3[]' id='' style='display:none;'><option value='Null'>NULL</option><option value='Positivo'>POSITIVO</option><option value='Negativo'>NEGATIVO</option></select><div style='color: #777777;' class='nice-select' tabindex='0'><span class='current'>-SELECCIONAR-</span><ul class='list'><li data-value='Positivo' class='option'>POSITIVO</li><li data-value='Negativo' class='option'>NEGATIVO</li></ul></div></div></div>";

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
                    Sedimento:
                    <input type="button" value="+" class="btn_ingreso_resultado" title="Agregar" onclick="agregar3()">
                    <input type="button" value="-" class="btn_ingreso_resultado" title="Quitar" onclick="borrarUltima3()">
                </spam>
                <input type="text" value="Sedimento" name="tiposeccion[]" style="display: none;">
            </div>
            <div class="contenedor_resultado">
                <div class="fila_resultado parte_abajo">
                    <div class="fila_contenido_resultado">
                        <div class="fila_agrupa_contenido">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="celepitel" onchange="cambio17()">
                                        <option value="Cell Epiteliales Escamosas">Cell Epiteliales Escamosas</option>
                                        <option value="Null3">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opcelepitel">
                                        <option value="Moderadas">Moderadas</option>
                                        <option value="Graves">Graves</option>
                                        <option value="Agudas">Agudas</option>
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
                                    <select name="resultado[]" id="bacteriasbac" onchange="cambio18()">
                                        <option value="Bacterias Bacilares">Bacterias Bacilares</option>
                                        <option value="Null3">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opbacteriasbac">
                                        <option value="++">++</option>
                                        <option value="+">+</option>
                                        <option value="--">- -</option>
                                        <option value="-">-</option>
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
                                    <select name="resultado[]" id="procitos" onchange="cambio19()">
                                        <option value="Procitos">Procitos</option>
                                        <option value="Null3">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opprocitos">
                                        <option value="3 a 4 xc">3 a 4 xc</option>
                                        <option value="5 a 6 xc">5 a 6 xc</option>
                                        <option value="7 a 8 xc">7 a 8 xc</option>
                                        <option value="9 a 10 xc">9 a 10 xc</option>
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
                                    <select name="resultado[]" id="oxacal" onchange="cambio20()">
                                        <option value="C. Oxalato de Calcio">C. Oxalato de Calcio</option>
                                        <option value="Null3">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opoxacal">
                                        <option value="++">++</option>
                                        <option value="+">+</option>
                                        <option value="--">- -</option>
                                        <option value="-">-</option>
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
                                    <select name="resultado[]" id="filamentosm" onchange="cambio21()">
                                        <option value="Filamentos Mucosos">Filamentos Mucosos</option>
                                        <option value="Null3">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opfilamentosm">
                                        <option value="++">++</option>
                                        <option value="+">+</option>
                                        <option value="--">--</option>
                                        <option value="-">-</option>
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

  b3 += "<div class='columna_resultado'><div class='opcion_res'><select name='opcion4[]' id='' style='display:none;'><option value='Null'>NULL</option><option value='Positivo'>POSITIVO</option><option value='Negativo'>NEGATIVO</option></select><div style='color: #777777;' class='nice-select' tabindex='0'><span class='current'>-SELECCIONAR-</span><ul class='list'><li data-value='Positivo' class='option'>POSITIVO</li><li data-value='Negativo' class='option'>NEGATIVO</li></ul></div></div></div>";

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
                <spam style="margin-left: 1px; padding: 5px 10px 5px 15px; width: 100%; color: black">
                    Examen de Heces:
                    <input type="button" value="+" class="btn_ingreso_resultado" title="Agregar" onclick="agregar4()">
                    <input type="button" value="-" class="btn_ingreso_resultado" title="Quitar" onclick="borrarUltima4()">
                </spam>
                <input type="text" value="Examen de Heces" name="tiposeccion[]" style="display: none;">
            </div>
            <div class="contenedor_resultado">
                <div class="fila_resultado parte_abajo">
                    <div class="fila_contenido_resultado">
                        <div class="fila_agrupa_contenido">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="colorheces" onchange="cambio22()">
                                        <option value="Colorhe">Color</option>
                                        <option value="Null4">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opcolorheces">
                                        <option value="Cafe">Cafe</option>
                                        <option value="Gris">Gris</option>
                                        <option value="Amarillo">Amarillo</option>
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
                                    <select name="resultado[]" id="aspectoheces" onchange="cambio23()">
                                        <option value="Aspectohe">Aspecto</option>
                                        <option value="Null4">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opaspectoheces">
                                        <option value="Solidas">Solidas</option>
                                        <option value="Blandas">Blandas</option>
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
                                    <select name="resultado[]" id="reaccion" onchange="cambio24()">
                                        <option value="Reaccion">Reaccion</option>
                                        <option value="Null4">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opreaccion">
                                        <option value="3 a 4 xc">3 a 4 xc</option>
                                        <option value="5 a 6 xc">5 a 6 xc</option>
                                        <option value="7 a 8 xc">7 a 8 xc</option>
                                        <option value="9 a 10 xc">9 a 10 xc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                            </div>
                            <div class="columna_resultado">
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido">
                            <div id="contenidos4" style="display: block; width: 100%; color: white;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript">
var contLin4 = 0;
localStorage.setItem("conta_tb4",contLin4);
function agregar4() {
  var contenidog4, b4;
  contLin4 = contLin4 + 1;

  b4 += "<div class='contenedor_nuevo'><div class='columna_resultado'><div class='opcion_res'><input type='text' name='opcion5[]' id='pl'></div></div>";

  b4 += "<div class='columna_resultado'><div class='opcion_res'><select name='opcion5[]' id='' style='display:none;'><option value='Null'>NULL</option><option value='Positivo'>POSITIVO</option><option value='Negativo'>NEGATIVO</option></select><div style='color: #777777;' class='nice-select' tabindex='0'><span class='current'>-SELECCIONAR-</span><ul class='list'><li data-value='Positivo' class='option'>POSITIVO</li><li data-value='Negativo' class='option'>NEGATIVO</li></ul></div></div></div>";

  b4 += "<div class='columna_resultado'></div>";

  b4 += "<div class='columna_resultado'></div></div><br>";
  
  contenidog4 = document.getElementById('contenidos4').innerHTML;
  

  b4 = contenidog4 + b4;
    document.getElementById('contenidos4').innerHTML=b4;
    localStorage.setItem("conta_tb4",contLin4);

  // if (contenidog!='') {
    
  // }else{
  //   alert ();
  // }
  
}
function borrarUltima4() {
  //ultima = document.all.tabla2.rows.length - 1;
  var contenidog4 = document.getElementById('contenidos4').innerHTML;
  if(contenidog4 != ''){
    var p4='';
    //vr = contenidog.split('<br>')[0];
    pr4 = parseInt(localStorage.getItem('conta_tb4'))-1;
    // alert (pr);
    for (var i4 = 0; i4 < parseInt(pr4); i4++) {
        p4 += contenidog4.split('<br>')[i4]+"<br>";
        //alert (p);
    }
    
    document.getElementById('contenidos4').innerHTML=p4;
    //document.all.tabla2.deleteRow(ultima);
    contLin4--;
    localStorage.setItem("conta_tb4",contLin4);
  }
}
</script>




            <div class="parados">
                <spam style="margin-left: 1px; padding: 5px 10px 5px 15px; width: 100%; color: black">
                    Observación Microscópica:
                    <input type="button" value="+" class="btn_ingreso_resultado" title="Agregar" onclick="agregar5()">
                    <input type="button" value="-" class="btn_ingreso_resultado" title="Quitar" onclick="borrarUltima5()">
                </spam>
                <input type="text" value="Observación Microscópica" name="tiposeccion[]" style="display: none;">
            </div>
            <div class="contenedor_resultado">
                <div class="fila_resultado parte_abajo">
                    <div class="fila_contenido_resultado">
                        <div class="fila_agrupa_contenido">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="parasitos" onchange="cambio25()">
                                        <option value="Parásitos">Parásitos</option>
                                        <option value="Null5">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opparasitos">
                                        <option value="No presencia de parasitos en la muestra">No presencia de parasitos en la muestra</option>
                                        <option value="Presencia de parasitos en la muestra">Presencia de parasitos en la muestra</option>
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
                                    <select name="resultado[]" id="predominio" onchange="cambio26()">
                                        <option value="Predominio Bacterias Bacilares">Predominio Bacterias Bacilares</option>
                                        <option value="Null5">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <select name="opcion[]" id="oppredominio">
                                        <option value="++">++</option>
                                        <option value="+">+</option>
                                        <option value="--">- -</option>
                                        <option value="-">-</option>
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
                                    <select name="resultado[]" id="granulos" onchange="cambio27()">
                                        <option value="Granulos de almidon">Granulos de almidon</option>
                                        <option value="Null5">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="opcion[]" id="opgranulos">
                                        <option value="++">++</option>
                                        <option value="+">+</option>
                                        <option value="--">--</option>
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                            </div>
                            <div class="columna_resultado">
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido">
                            <div id="contenidos5" style="display: block; width: 100%; color: white;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript">
var contLin5 = 0;
localStorage.setItem("conta_tb5",contLin5);
function agregar5() {
  var contenidog5, b5;
  contLin5 = contLin5 + 1;

  b5 += "<div class='contenedor_nuevo'><div class='columna_resultado'><div class='opcion_res'><input type='text' name='opcion6[]' id='pl'></div></div>";

  b5 += "<div class='columna_resultado'><div class='opcion_res'><select name='opcion6[]' id='' style='display:none;'><option value='Null'>NULL</option><option value='Positivo'>POSITIVO</option><option value='Negativo'>NEGATIVO</option></select><div style='color: #777777;' class='nice-select' tabindex='0'><span class='current'>-SELECCIONAR-</span><ul class='list'><li data-value='Positivo' class='option'>POSITIVO</li><li data-value='Negativo' class='option'>NEGATIVO</li></ul></div></div></div>";

  b5 += "<div class='columna_resultado'></div>";

  b5 += "<div class='columna_resultado'></div></div><br>";
  
  contenidog5 = document.getElementById('contenidos5').innerHTML;
  

  b5 = contenidog5 + b5;
    document.getElementById('contenidos5').innerHTML=b5;
    localStorage.setItem("conta_tb5",contLin5);

  // if (contenidog!='') {
    
  // }else{
  //   alert ();
  // }
  
}
function borrarUltima5() {
  //ultima = document.all.tabla2.rows.length - 1;
  var contenidog5 = document.getElementById('contenidos5').innerHTML;
  if(contenidog5 != ''){
    var p5='', pr5;
    //vr = contenidog.split('<br>')[0];
    pr5 = parseInt(localStorage.getItem('conta_tb5'))-1;
    // alert (pr);
    for (var i5 = 0; i5 < parseInt(pr5); i5++) {
        p5 += contenidog5.split('<br>')[i5]+"<br>";
        //alert (p);
    }
    
    document.getElementById('contenidos5').innerHTML=p5;
    //document.all.tabla2.deleteRow(ultima);
    contLin5--;
    localStorage.setItem("conta_tb5",contLin5);
  }
}
</script>



            <div class="parados">
            </div>

            <!-- <div class="form">
                <a href="#" class="btn btn-success" title="Ingresar Resultados">Ingresar Resultados</a>
                <a href="#" class="btn btn-dark" title="Ver Detalles de Orden de Examen">Ver</a>
            </div> -->

            <br><br>

            <div class="container-login100-form-btn">
          		<?php if ($estadoexa==2) { ?>
                <div class="wrap-login40-form-btn-aceptar">
                    <div class="login100-form-bgbtn-aceptar"></div>
                    <input class="login100-form-btn-aceptar" type="button" value="Guardar" onclick="pregunta()">
                </div>
                <?php } ?>
                <div class="wrap-login40-form-btn-cancelar">
                    <div class="login100-form-bgbtn-cancelar"></div>
                    <a href="buscar_examenes.php" class="txt2">
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
            if (j<2) {
                var primero = formularios[i].elements[0].value;
                var primeros = formularios[i].elements[0];
                var segundo = formularios[i].elements[1].value;
                var segundos = formularios[i].elements[1];
            }
            if (j>1) {
                var contenido = formularios[i].elements[j].value;
                var estachk = formularios[i].elements[j].checked;
                if (estachk) {
                    verificar = verificar + 1; //cuantos check estan sin checkear
                }
            }
      // msg = msg + '\n\nElemento '+j+ ' del formulario '+(i+1)+ ' tiene id: '+ formularios[i].elements[j].id;
      // msg = msg + ' y name: ' + formularios[i].elements[j].name;  
        } //FIN DEL SEGUNDO FOR
    } //FIN DEL PRIMER FOR

    // if (verificar == 0 && primero == '' && segundo == '') {
    //     verificar = 0;
    //     Swal.fire('Complete todos los campos');
    // }else if (primero == '' && segundo == '') {
    //     verificar = 0;
    //     Swal.fire('Seleccione tipo y precio');
    // }else if (primero == '' && verificar == 0) {
    //     verificar = 0;
    //     Swal.fire('Seleccione tipo y al menos un examen');
    // }else if (segundo == '' && verificar == 0) {
    //     verificar = 0;
    //     Swal.fire('Seleccione menos un examen y el precio');
    // }else if (primero == '') {
    //     verificar = 0;
    //     primeros.focus();
    //     Swal.fire('Seleccione tipo de examen');
    // }else if (segundo == '') {
    //     verificar = 0;
    //     segundos.focus();
    //     Swal.fire('Complete campo Precio');
    // }else if (verificar == 0) {
    //     verificar = 0;
    //     Swal.fire('Seleccione al menos un examen');
    // }else{
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
    //}

  //alert(msg);
  // alert(cual);
 
}
</script>

<!--================ start footer Area =================-->
<?php include('scripts.php'); ?>
<script src="../forms/js/selecResultado.js"></script>
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