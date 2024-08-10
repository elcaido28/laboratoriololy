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
            <a href="ingreso_resultado_biometria.php?idc=<?php echo $idcab; ?>&idp=<?php echo $idpac; ?>">Ingresar Resultados</a>
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
        <form class="login100-form validate-form formulario" method="post" action="app/guardarResultadoBiometria.php?idc=<?php echo $idcab; ?>&idp=<?php echo $idpac; ?>" name="formix" id="formix">
        <!--abrir formulario cuando inicia sesion-->
            <span class="login100-form-title p-b-49">
                Biometría Hemática
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
                    Biometria:
                    <input type="button" value="+" class="btn_ingreso_resultado" title="Agregar" onclick="agregar()">
                    <input type="button" value="-" class="btn_ingreso_resultado" title="Quitar" onclick="borrarUltima()">
                </spam>
                <input type="text" value="Biometria" name="tiposeccion[]" style="display: none;">
            </div>

            <div class="contenedor_resultado">
                <div class="fila_resultado parte_arriba">
                    <div class="nombre_res"><label for="">Parámteros</label></div>
                    <div class="nombre_res"><label for="">Resultados</label></div>
                    <div class="nombre_res"><label for="">Unidades</label></div>
                    <div class="nombre_res"><label for="">Referenciales</label></div>
                </div>
                <div class="fila_resultado parte_abajo">
                    <div class="fila_contenido_resultado">
                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="globulos" onchange="cambio1()">
                                        <option value="Globulos Blancos">Globulos Blancos</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="gl1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 20px; width: 100px;" name="opcion[]" id="gl2" value="10^3/ul" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 20px; width: 100px;" name="opcion[]" id="gl3" value="4,0 - 10,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="linfositos" onchange="cambio2()">
                                        <option value="Linfocitos #">Linfocitos #</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="linfo1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 20px; width: 100px;" name="opcion[]" id="linfo2" value="10^3/ul" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 20px; width: 100px;" name="opcion[]" id="linfo3" value="0,8 - 4,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="celi" onchange="cambio3()">
                                        <option value="Celulas Intermedias #">Celulas Intermedias #</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="celi1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 20px; width: 100px;" name="opcion[]" id="celi2" value="10^3/ul" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 20px; width: 100px;" name="opcion[]" id="celi3" value="0,1 - 0,9" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="segmentados" onchange="cambio4()">
                                        <option value="Segmentados #">Segmentados #</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="segmen1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 20px; width: 100px;" name="opcion[]" id="segmen2" value="10^3/ul" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 20px; width: 100px;" name="opcion[]" id="segmen3" value="2,0 - 7,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="linfositosp" onchange="cambio5()">
                                        <option value="Linfocitos %">Linfocitos %</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="linfop1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 18px; width: 100px;" name="opcion[]" id="linfop2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 13px; width: 100px;" name="opcion[]" id="linfop3" value="20,0 - 40,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="celip" onchange="cambio6()">
                                        <option value="Celulas Intermedias %">Celulas Intermedias %</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="celip1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 18px; width: 100px;" name="opcion[]" id="celip2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 20px; width: 100px;" name="opcion[]" id="celip3" value="3,0 - 9,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="segmentadosp" onchange="cambio7()">
                                        <option value="Segmentados %">Segmentados %</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="segmenp1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 18px; width: 100px;" name="opcion[]" id="segmenp2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-20">
                                    <input type="text" style="padding-left: 13px; width: 100px;" name="opcion[]" id="segmenp3" value="50,0 - 70,0" readonly="">
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

  b += "<div class='contenedor_nuevo'><div class='columna_resultado'><div class='opcion_res m-l-4'><input type='text' name='opcion2[]' id='pl'></div></div>";

  b += "<div class='columna_resultado'><div class='opcion_res'><input type='number' name='opcion2[]' id='pl'></div></div>";

  b += "<div class='columna_resultado'><div class='opcion_res m-l-58'><select name='opcion2[]' id='' style='display:none'><option value=''>NULL</option><option value='mg/dl'>mg/dl</option><option value='gr'>gr</option><option value='ml'>ml</option></select><div style='color: #777777;' class='nice-select' tabindex='0'><span class='current'>-</span><ul class='list'><li data-value='mg/dl' class='option'>mg/dl</li><li data-value='gr' class='option'>gr</li><li data-value='ml' class='option'>ml</li></ul></div></div></div>";

  b += "<div class='columna_resultado'><div class='opcion_res m-l-20'><input type='text' style='padding-left: 13px; width: 100px; name='opcion2[]' id='pl' style='width: 98px;'></div></div></div><br>";

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
                <spam style="margin-left: 1px; padding: 5px 10px 5px 15px; width: 100%; color: black;">
                    Células Atípicas:
                    <input type="button" value="+" class="btn_ingreso_resultado" title="Agregar" onclick="agregar2()">
                    <input type="button" value="-" class="btn_ingreso_resultado" title="Quitar" onclick="borrarUltima2()">
                </spam>
                <input type="text" value="Celulas Atipicas" name="tiposeccion[]" style="display: none;">
            </div>

            <div class="contenedor_resultado">
                <div class="fila_resultado parte_arriba">
                    <div class="nombre_res"><label for="">Parámteros</label></div>
                    <div class="nombre_res"><label for="">Resultados</label></div>
                    <div class="nombre_res"><label for="">Unidades</label></div>
                    <div class="nombre_res"><label for="">Referenciales</label></div>
                </div>
                <div class="fila_resultado parte_abajo">
                    <div class="fila_contenido_resultado">
                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="hemoglobina" onchange="cambio8()">
                                        <option value="Hemoglobina">Hemoglobina</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="hemoglo1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="hemoglo2" value="g/dl" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <input type="text" style="padding-left: 13px; width: 100px;" name="opcion[]" id="hemoglo3" value="11,0 - 15,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="globulosr" onchange="cambio9()">
                                        <option value="Glóbulos Rojos">Glóbulos Rojos</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="globulosr1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="globulosr2" value="10^6/ul" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <input type="text" style="padding-left: 13px; width: 100px;" name="opcion[]" id="globulosr3" value="3,50 - 5,00" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="hematocrito" onchange="cambio10()">
                                        <option value="Hematocrito">Hematocrito</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="hemato1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="hemato2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <input type="text" style="padding-left: 10px; width: 100px;" name="opcion[]" id="hemato3" value="37,0 - 48,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="vcm" onchange="cambio11()">
                                        <option value="VCM">VCM</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="vcm1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="vcm2" value="fL" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <input type="text" style="padding-left: 13px; width: 100px;" name="opcion[]" id="vcm3" value="82,0 - 95,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="hcm" onchange="cambio12()">
                                        <option value="HCM">HCM</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="hcm1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="hcm2" value="pg" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <input type="text" style="padding-left: 13px; width: 100px;" name="opcion[]" id="hcm3" value="27,0 - 31,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="chcm" onchange="cambio13()">
                                        <option value="CHCM">CHCM</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="chcm1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="chcm2" value="g/dL" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <input type="text" style="padding-left: 13px; width: 100px;" name="opcion[]" id="chcm3" value="32,0 - 36,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="wdrvc" onchange="cambio14()">
                                        <option value="WDR-VC">WDR-VC</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="wdrvc1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="wdrvc2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <input type="text" style="padding-left: 13px; width: 100px;" name="opcion[]" id="wdrvc3" value="11,5 - 14,5" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="wdrds" onchange="cambio15()">
                                        <option value="WDR-DS">WDR-DS</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="wdrds1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="wdrds2" value="fL" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <input type="text" style="padding-left: 13px; width: 100px;" name="opcion[]" id="wdrds3" value="35,0 - 56,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="plaquetas" onchange="cambio16()">
                                        <option value="Plaquetas">Plaquetas</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="plaquetas1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="plaquetas2" value="10^3/uL" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <input type="text" style="padding-left: 13px; width: 100px;" name="opcion[]" id="plaquetas3" value="150 - 450" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="mpv" onchange="cambio17()">
                                        <option value="MPV">MPV</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="mpv1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="mpv2" value="fL" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <input type="text" style="padding-left: 13px; width: 100px;" name="opcion[]" id="mpv3" value="7,0 - 11,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="wdp" onchange="cambio18()">
                                        <option value="WDP">WDP</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="wdp1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="wdp2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-15">
                                    <input type="text" style="padding-left: 13px; width: 100px;" name="opcion[]" id="wdp3" value="15,0 - 17,0" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="pct" onchange="cambio19()">
                                        <option value="PCT">PCT</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="pct1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="pct2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-25">
                                    <input type="text" style="padding-left: 13px; width: 117px;" name="opcion[]" id="pct3" value="0,108 - 0,282" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido">
                            <div id="contenidos2" style="display: block; width: 100%; color: white;">
                                <!-- aqui aparecen los demas select -->
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

  b2 += "<div class='columna_resultado'><div class='opcion_res'><input type='number' name='opcion3[]' id='pl'></div></div>";

  b2 += "<div class='columna_resultado'><div class='opcion_res m-l-25'><select name='opcion3[]' id='' style='display:none'><option value=''>NULL</option><option value='mg/dl'>mg/dl</option><option value='gr'>gr</option><option value='ml'>ml</option></select><div style='color: #777777;' class='nice-select' tabindex='0'><span class='current'>-</span><ul class='list'><li data-value='mg/dl' class='option'>mg/dl</li><li data-value='gr' class='option'>gr</li><li data-value='ml' class='option'>ml</li></ul></div></div></div>";

  b2 += "<div class='columna_resultado'><div class='opcion_res m-l-10'><input type='text' name='opcion3[]' id='pl' style='width: 98px;'></div></div></div><br>";
  
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
                    Extendido Sanguíneo:
                    <input type="button" value="+" class="btn_ingreso_resultado" title="Agregar" onclick="agregar3()">
                    <input type="button" value="-" class="btn_ingreso_resultado" title="Quitar" onclick="borrarUltima3()">
                </spam>
                <input type="text" value="Extendido Sanguineo" name="tiposeccion[]" style="display: none;">
            </div>

            <div class="contenedor_resultado">
                <div class="fila_resultado parte_arriba">
                    <div class="nombre_res"><label for="">Parámteros</label></div>
                    <div class="nombre_res"><label for="">Resultados</label></div>
                    <div class="nombre_res"><label for="">Unidades</label></div>
                    <div class="nombre_res"><label for="">Referenciales</label></div>
                </div>
                <div class="fila_resultado parte_abajo">
                    <div class="fila_contenido_resultado">
                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="segmenext" onchange="cambio20()">
                                        <option value="SEGMENTADOS">SEGMENTADOS</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="segmenext1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="segmenext2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <!-- <div class="opcion_res m-l-30">
                                    <select name="opcion[]" id="segmenext3">
                                        <option value="">-</option>
                                        <option value="30 a 60">30 a 60</option>
                                        <option value="70 a 100">70 a 100</option>
                                        <option value="110 a 130">110 a 130</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="linfoext" onchange="cambio21()">
                                        <option value="LINFOCITOS">LINFOCITOS</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="linfoext1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="linfoext2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <!-- <div class="opcion_res m-l-30">
                                    <select name="opcion[]" id="linfoext3">
                                        <option value="">-</option>
                                        <option value="30 a 60">30 a 60</option>
                                        <option value="70 a 100">70 a 100</option>
                                        <option value="110 a 130">110 a 130</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="monocitos" onchange="cambio22()">
                                        <option value="MONOCITOS">MONOCITOS</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="monocitos1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="monocitos2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <!-- <div class="opcion_res m-l-30">
                                    <select name="opcion[]" id="monocitos3">
                                        <option value="">-</option>
                                        <option value="30 a 60">30 a 60</option>
                                        <option value="70 a 100">70 a 100</option>
                                        <option value="110 a 130">110 a 130</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="neutrofilos" onchange="cambio23()">
                                        <option value="NEUTROFILOS">NEUTROFILOS</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="neutrofilos1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="neutrofilos2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <!-- <div class="opcion_res m-l-30">
                                    <select name="opcion[]" id="neutrofilos3">
                                        <option value="">-</option>
                                        <option value="30 a 60">30 a 60</option>
                                        <option value="70 a 100">70 a 100</option>
                                        <option value="110 a 130">110 a 130</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="eosinofilos" onchange="cambio24()">
                                        <option value="EOSINOFILOS">EOSINOFILOS</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="eosinofilos1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="eosinofilos2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <!-- <div class="opcion_res m-l-30">
                                    <select name="opcion[]" id="eosinofilos3">
                                        <option value="">-</option>
                                        <option value="30 a 60">30 a 60</option>
                                        <option value="70 a 100">70 a 100</option>
                                        <option value="110 a 130">110 a 130</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido m-b-7">
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <select name="resultado[]" id="basofilos" onchange="cambio25()">
                                        <option value="BASOFILOS">BASOFILOS</option>
                                        <option value="Null">NULL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res">
                                    <input type="number" name="opcion[]" id="basofilos1" onkeypress="return valida(event)" value="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <div class="opcion_res m-l-10">
                                    <input type="text" style="padding-left: 18px; width: 90px;" name="opcion[]" id="basofilos2" value="%" readonly="">
                                </div>
                            </div>
                            <div class="columna_resultado">
                                <!-- <div class="opcion_res m-l-30">
                                    <select name="opcion[]" id="basofilos3">
                                        <option value="">-</option>
                                        <option value="30 a 60">30 a 60</option>
                                        <option value="70 a 100">70 a 100</option>
                                        <option value="110 a 130">110 a 130</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>

                        <div class="fila_agrupa_contenido">
                            <div id="contenidos3" style="display: block; width: 100%; color: white;">
                                <!-- aqui aparecen los demas select -->
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

  b3 += "<div class='columna_resultado'><div class='opcion_res'><input type='number' name='opcion4[]' id='pl'></div></div>";

  b3 += "<div class='columna_resultado'><div class='opcion_res m-l-12'><input type='text' name='opcion4[]' id='pl' style='width: 95px;'></div></div>";

  // b3 += "<div class='columna_resultado'><div class='opcion_res m-l-20'><select name='opcion4[]' id='' style='display:none'><option value=''>NULL</option><option value='mg/dl'>mg/dl</option><option value='gr'>gr</option><option value='ml'>ml</option></select><div style='color: #777777;' class='nice-select' tabindex='0'><span class='current'>-SELECCIONAR-</span><ul class='list'><li data-value='mg/dl' class='option'>mg/dl</li><li data-value='gr' class='option'>gr</li><li data-value='ml' class='option'>ml</li></ul></div></div></div>";

  b3 += "<div class='columna_resultado'><div class='opcion_res'></div></div></div><br>";
  
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
            <br>

            <div class="container-login100-form-btn">
                <div class="wrap-login40-form-btn-aceptar">
                    <div class="login100-form-bgbtn-aceptar"></div>
                    <!-- <button class="login100-form-btn-aceptar">
                          Guardar
                    </button> -->
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
            var contenido = formularios[i].elements[j].value;
            var estachk = formularios[i].elements[j].checked;
            if (contenido=="") {
                verificar = verificar + 1; //cuantos check estan sin checkear
            }
            // alert(j);
            // msg = msg + '\n\nElemento '+j+ ' del formulario '+(i+1)+ ' tiene id: '+ formularios[i].elements[j].id;
            // msg = msg + '\n\nElemento '+j+ ' del formulario '+(i+1)+ ' tiene id: '+ formularios[i].elements[j].value;
      // msg = msg + ' y name: ' + formularios[i].elements[j].name;  
        } //FIN DEL SEGUNDO FOR

    } //FIN DEL PRIMER FOR
    // alert(verificar);
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
<script src="../forms/js/selecResultadoBiometria.js"></script>
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