<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<?php  if ($perfil >= 1){ ?>
<?php
    if (isset($_REQUEST['id'])) {
        $idpac=$_REQUEST['id'];
    }else{
        $$idpac="";
    }

    $consulta=mysqli_query($con,"SELECT * from paciente P inner join estado E on P.estado=E.id_estado inner join sexo S on P.sexo=S.id_sexo WHERE P.id_paciente='$idpac' AND estado='1'");
    $row=mysqli_fetch_array($consulta);
    $nombre = $row['nombres']." ".$row['apellidos'];
?>
<!--================Header Menu Area =================-->

<!--================ Banner Area =================-->

<link rel="stylesheet" href="../css/estilos1.css">

<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container" >
      <div class="banner_content text-left">
        <h2>Ingresar Examen</h2>
        <div class="page_link">
          <a href="inicio.php">Inicio</a>
          <a href="ingreso_examen.php">Ingresar Examen</a>
          <a href="registro_examen.php?id=<?php echo $idpac; ?>">Registrar Examen</a>
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
    $(document).on('keyup','#doctorex', function(){
        var valr= $('#doctorex').val();
        if(valr!=""){
           // var texto = MaysPrimera(valr.tolowerCase());
           var texto = toTitleCase(valr); // solo la primera palabra esta en mayuscula
           // var texto = toTitleCase(valr); // todas las palabras empiezan con mayuscula
            document.getElementById('doctorex').value=texto;
        }
    });
    function toTitleCase(str){
    return str.replace(/(?:^|\s)\w/g, function(match){
      return match.toUpperCase();
    });
  }

  function MaysPrimera(string){
    return string.charAt(0).toUpperCase() + string.slice(1);
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
        patron =/[0-9.]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
</script>
<!--================ End Script Area =================-->

<!--================ Start Appointment Area =================-->

<div class="container-login100" style="background: #B8E1F7;">

    <div class="wrap-login600 p-l-55 p-r-55 p-t-65 p-b-54 formu_grande">
      <!-- <form class="login100-form validate-form" method="post" action="" name="formix" id="formix"onsubmit=" return fun_insertar()"> -->
        <form class="login100-form validate-form formulario" method="post" action="app/guardarExamen.php?id=<?php echo $idpac; ?>" name="formix" id="formix">
        <!--abrir formulario cuando inicia sesion-->
            <span class="login100-form-title p-b-49">
              Ingresar Examen
            </span>

            <div class="parados">
                <div class="col-md-6" data-validate = "Nombre es requerido">
                    <div class="wrap-input100 m-b-23">
                    <span class="label-input100">Paciente</span>
                    <p class="input100" style="padding-left: 30px; padding-top: 20px; height: 35px;"> <?php echo $nombre; ?> </p>
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
                <div class="col-md-2"></div>
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
    height: 20px;
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
            <div class="parados">
                <div class="col-md-7 nueva_clase">
                    <span class="label-input100 m-b-50">Tipo de Exámen</span>
                    <select name="states[]" id="example" class="form-control nuevo_select" multiple="multiple">
                        <option value="Examen Orina">Examen Orina</option>
                        <option value="Examen Físico - Químico de Orina">Examen Fisico - Quimico de Orina</option>
                        <option value="Examen de Sangre">Examen de Sangre</option>
                        <option value="Examen de Sangre - Embarazo">Examen de Sangre - Embarazo</option>
                        <option value="Examen de Secreción">Examen de Secreción</option>
                        <option value="Examen Biometría Hemática">Examen Biometría Hemática</option>
                    </select>
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-3">
                    <div class="wrap-input100 m-b-23 m-r-12">
                        <span class="label-input100">Precio</span>
                        <input class="input100" type="text" name="precio" id="precio" onkeypress="return valida(event)" maxlength="6" required>
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
                    <input class="input100" style="padding-left: 27px;" type="text" name="doctorex" id="doctorex" maxlength="75" onkeypress="return soloLetras(event)" required>
                    <span class="focus-input100" data-symbol=""></span>
                    </div>
                </div>
                <div class="wrap-input100 m-b-23 m-r-12">
                    <span class="label-input100">Tipo de Pago</span>
                    <select class="input100 m-b-17" name="tpago" id="tpago" onchange="tipep()">
                      <option value="">-</option><option value="1">Completo</option><option value="2">Abono</option>
                   </select>
                </div>
                <div class="wrap-input100 m-b-23">
                    <span class="label-input100" id="titabo">Valor</span>
                    <input class="input100" type="text" name="abono" id="abono" maxlength="6" placeholder="0" onkeypress="return valida(event)" disabled>
                    <span class="focus-input100" data-symbol=""></span>
                </div>
            </div>

<script>
    function tipep(){
        var tipoa = document.getElementById('tpago').value;
        if (tipoa == 1) {
            document.getElementById('abono').value='0';
            document.getElementById('abono').setAttribute('placeholder','no adeuda valores');
            document.getElementById('abono').setAttribute('onlyread','');
        }else if(tipoa == 2){
            document.getElementById('abono').value='';
            document.getElementById('abono').removeAttribute('disabled','');
        }else if(tipoa == ''){
            document.getElementById('abono').value='';
            document.getElementById('abono').setAttribute('placeholder','0');
            document.getElementById('abono').setAttribute('onlyread','');
        }
    }
</script>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">SANGRE:</h2>
                <input type="checkbox" id="Hematies" name="Name[]" value="Hematies">
                <label for="Hematies">Hematies </label>
                <input type="checkbox" id="Leucocitos" name="Name[]" value="Leucocitos">
                <label for="Leucocitos">Leucocitos</label>
                <input type="checkbox" id="Hemotocrito" name="Name[]" value="Hemotócrito">
                <label for="Hemotocrito">Hemotócrito </label>
                <input type="checkbox" id="Hemoglobina" name="Name[]" value="Hemoglobina">
                <label for="Hemoglobina">Hemoglobina </label>
                <input type="checkbox" id="HSchilling" name="Name[]" value="H. de Schilling">
                <label for="HSchilling">H. de Schilling </label>
                <input type="checkbox" id="Eritrosedimentacion" name="Name[]" value="Eritrosedimentación">
                <label for="Eritrosedimentacion">Eritrosedimentación </label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">COAGULACIÓN Y HEMOSTASIA:</h2>
                <input type="checkbox" id="Plaquetas" name="Name[]" value="Plaquetas">
                <label for="Plaquetas">Plaquetas </label>
                <input type="checkbox" id="Reticulocitos" name="Name[]" value="Reticulocitos">
                <label for="Reticulocitos">Reticulocitos </label>
                <input type="checkbox" id="HT" name="Name[]" value="HT. de sangría">
                <label for="HT">HT. de sangría  </label>
                <input type="checkbox" id="Coagulacion" name="Name[]" value="Coagulación">
                <label for="Coagulacion">Coagulación </label>
                <input type="checkbox" id="Tp" name="Name[]" value="T. de protombina">
                <label for="Tp">T. de protombina</label>
                <input type="checkbox" id="Tromboplastina" name="Name[]" value="Tromboplastina">
                <label for="Tromboplastina">Tromboplastina </label>
                <input type="checkbox" id="Fibrinogeno" name="Name[]"name="Name[]" value="Fibrinógeno">
                <label for="Fibrinogeno">Fibrinógeno </label>
                <input type="checkbox" id="Gruporh" name="Name[]" value="Grupo y R.h.">
                <label for="Gruporh">Grupo y R.h. </label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">SEROLOGIA:</h2>
                <input type="checkbox" id="Widal" name="Name[]" value="Widal">
                <label for="Widal">Widal </label>
                <input type="checkbox" id="Proteos" name="Name[]" value="Proteos O x 19">
                <label for="Proteos">Proteos O x 19</label>
                <input type="checkbox" id="VDRTN" name="Name[]" value="V.D.R. tant">
                <label for="VDRTN">V.D.R. tant </label>
                <input type="checkbox" id="VDT" name="Name[]" value="V.D.R. tantit">
                <label for="VDT">V.D.R. tantit </label>
                <input type="checkbox" id="Plasmodium" name="Name[]" value="Plasmodium">
                <label for="Plasmodium">Plasmodium </label>
                <input type="checkbox" id="RAT" name="Name[]" value="R.A. test">
                <label for="RAT">R.A. test </label>
                <input type="checkbox" id="AST" name="Name[]" value="A.S.T.O">
                <label for="AST">A.S.T.O </label>
                <input type="checkbox" id="pcr" name="Name[]" value="P.C. reactiva">
                <label for="pcr">P.C. reactiva </label>
                <input type="checkbox" id="Toxoplasmosis" name="Name[]" value="Toxoplasmosis">
                <label for="Toxoplasmosis">Toxoplasmosis</label>
                <input type="checkbox" id="Dengue" name="Name[]" value="Dengue">
                <label for="Dengue">Dengue </label>

                <hr style="margin-left: 20px;">

                <input type="checkbox" id="astoTurb" name="Name[]" value="A.S.T.O (Turb.)">
                <label for="astoTurb">A.S.T.O (Turb.) </label>
                <input type="checkbox" id="pcrTurb" name="Name[]" value="P.C.R. (Turb.)">
                <label for="pcrTurb">P.C.R. (Turb.) </label>
                <input type="checkbox" id="raTurb" name="Name[]" value="R.A. (Turb.)">
                <label for="raTurb">R.A. (Turb.) </label>
                <input type="checkbox" id="calculasLe" name="Name[]" value="Calculas L.E.">
                <label for="calculasLe">Calculas L.E. </label>
                <input type="checkbox" id="mononucleo" name="Name[]" value="Mononucleosis">
                <label for="mononucleo">Mononucleosis </label>
                <input type="checkbox" id="rhudleson" name="Name[]" value="R. de Hudlesson">
                <label for="rhudleson">R. de Hudlesson </label>
                <input type="checkbox" id="rweill" name="Name[]" value="R. de Weill Felix">
                <label for="rweill">R. de Weill Felix </label>
                <input type="checkbox" id="rwidal" name="Name[]" value="R. de Widal">
                <label for="rwidal">R. de Widal </label>
                <input type="checkbox" id="strepa" name="Name[]" value="Strep A.">
                <label for="strepa">Strep A. </label>
                <input type="checkbox" id="vdrl" name="Name[]" value="V.D.R.L.">
                <label for="vdrl">V.D.R.L. </label>

            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">BIOQUIMICOS</h2>
                <input type="checkbox" name="Name[]" id="ACU" value="Ac. urico">
                <label for="ACU">Ac. urico</label>

                <input type="checkbox" name="Name[]" id="Urea" value="Urea">
                <label for="Urea">Urea</label>

                <input type="checkbox" name="Name[]" id="Creatinina" value="Creatinina">
                <label for="Creatinina">Creatinina</label>

                <input type="checkbox" name="Name[]" id="Glucosa" value="Glucosa">
                <label for="Glucosa"> Glucosa</label>

                <input type="checkbox" name="Name[]" id="Colesterol" value="Colesterol">
                <label for="Colesterol">Colesterol</label>

                <input type="checkbox" name="Name[]" id="LDLC" value="L.D.L. colesterol">
                <label for="LDLC">L.D.L. colesterol</label>

                <input type="checkbox" name="Name[]" id="ADLC" value="H.D.L. colesterol">
                <label for="ADLC">H.D.L. colesterol</label>

                <input type="checkbox" name="Name[]" id="Trigliceridos" value="Triglicéridos">
                <label for="Trigliceridos">Triglicéridos</label>

                <input type="checkbox" name="Name[]" id="Lipidostotales" value="Lípidos totales">
                <label for="Lipidostotales"> Lípidos totales</label>

                <input type="checkbox" name="Name[]" id="Sodio" value="Sodio">
                <label for="Sodio">Sodio</label>

                <input type="checkbox" name="Name[]" id="Cloro" value="Cloro">
                <label for="Cloro">Cloro</label>

                <input type="checkbox" name="Name[]" id="Potasio" value="Potasio">
                <label for="Potasio"> Potasio</label>

                <input type="checkbox" name="Name[]" id="Calcio" value="Calcio">
                <label for="Calcio">Calcio</label>

                <hr style="margin-left: 20px;">

                <input type="checkbox" name="Name[]" id="glicemia" value="Glicemia">
                <label for="glicemia">Glicemia</label>

                <input type="checkbox" name="Name[]" id="glicemiapost" value="Glicemia Post-Prandial">
                <label for="glicemiapost">Glicemia Post-Prandial</label>

                <input type="checkbox" name="Name[]" id="glicemiatolerancia" value="Glicemia Tolerancia">
                <label for="glicemiatolerancia">Glicemia Tolerancia</label>

                <input type="checkbox" name="Name[]" id="bun" value="BUN">
                <label for="bun">BUN</label>

                <input type="checkbox" name="Name[]" id="colesteroltotal" value="Colesterol Total">
                <label for="colesteroltotal">Colesterol Total</label>

                <input type="checkbox" name="Name[]" id="lipidos" value="Lípidos">
                <label for="lipidos">Lípidos</label>

                <input type="checkbox" name="Name[]" id="fosfolipidos" value="Fosfolipidos">
                <label for="fosfolipidos">Fosfolipidos</label>

                <input type="checkbox" name="Name[]" id="betalipo" value="Beta Lipoproteína">
                <label for="betalipo">Beta Lipoproteína</label>

                <input type="checkbox" name="Name[]" id="proteinayfraccion" value="Proteínas y Fracciones">
                <label for="proteinayfraccion">Proteínas y Fracciones</label>

                <input type="checkbox" name="Name[]" id="bilirrubinasyf" value="Bilirrubinas y Fracciones">
                <label for="bilirrubinasyf">Bilirrubinas y Fracciones</label>

                <input type="checkbox" name="Name[]" id="indiceicterico" value="Indice icterico">
                <label for="indiceicterico">Indice icterico</label>

                <input type="checkbox" name="Name[]" id="got" value="GOT">
                <label for="got">GOT</label>

                <input type="checkbox" name="Name[]" id="gpt" value="GPT">
                <label for="gpt">GPT</label>

                <input type="checkbox" name="Name[]" id="ldh" value="LDH">
                <label for="ldh">LDH</label>

                <input type="checkbox" name="Name[]" id="checoli" value="CHE (Colinesferasa)">
                <label for="checoli">CHE (Colinesferasa)</label>

                <input type="checkbox" name="Name[]" id="gammagt" value="GGT (gamma GT)">
                <label for="gammagt">GGT (gamma GT)</label>

                <input type="checkbox" name="Name[]" id="fosfalcalina" value="Fof. Alcalina">
                <label for="fosfalcalina">Fof. Alcalina</label>

                <input type="checkbox" name="Name[]" id="fosfacidatoal" value="Fosf. Acida Total">
                <label for="fosfacidatoal">Fosf. Acida Total</label>

                <input type="checkbox" name="Name[]" id="fosfacidaprostatica" value="Fosf. Acida Prostática">
                <label for="fosfacidaprostatica">Fosf. Acida Prostática</label>

                <input type="checkbox" name="Name[]" id="amilasa" value="Amilasa">
                <label for="amilasa">Amilasa</label>

                <input type="checkbox" name="Name[]" id="lipasa" value="Lipasa">
                <label for="lipasa">Lipasa</label>

                <input type="checkbox" name="Name[]" id="cpknac" value="C.P.K. (Nac)">
                <label for="cpknac">C.P.K. (Nac)</label>

                <input type="checkbox" name="Name[]" id="ckkmb" value="C.K.K. (Mb)">
                <label for="ckkmb">C.K.K. (Mb)</label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">FUNCIÓN HEPATICA:</h2>
                <input type="checkbox" name="Name[]" id="Bilirrubinad" value="Bilirrubina directa">
                <label for="Bilirrubinad">Bilirrubina directa</label>

                <input type="checkbox" name="Name[]" id="Bilirrubinai" value="Bilirrubina indirecta">
                <label for="Bilirrubinai">Bilirrubina indirecta</label>

                <input type="checkbox" name="Name[]" id="Indic" value="Ind. ictérica">
                <label for="Indic">Ind. ictérica</label>

                <input type="checkbox" name="Name[]" id="Prottot" value="Prot. totales">
                <label for="Prottot">Prot. totales</label>

                <input type="checkbox" name="Name[]" id="Seroalbumina" value="Seroalbúmina">
                <label for="Seroalbumina">Seroalbúmina</label>

                <input type="checkbox" name="Name[]" id="Seroglogulina" value="Seroglogulina">
                <label for="Seroglogulina">Seroglogulina</label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">ENZIMAS:</h2>
                <input type="checkbox" name="Name[]" id="SGOT" value="S.G.O.T">
                <label for="SGOT"> S.G.O.T</label>

                <input type="checkbox" name="Name[]" id="SGPT" value="S.G.P.T">
                <label for="SGPT">S.G.P.T</label>

                <input type="checkbox" name="Name[]" id="Colinesterasa" value="Colinesterasa">
                <label for="Colinesterasa"> Colinesterasa</label>

                <input type="checkbox" name="Name[]" id="DLH" value="D.L.H">
                <label for="DLH"> D.L.H</label>

                <input type="checkbox" name="Name[]" id="Fosfatalcal" value="Fosfat alcalina">
                <label for="Fosfatalcal">Fosfat alcalina</label>

                <input type="checkbox" name="Name[]" id="FAT" value="Fosfat. acid. total">
                <label for="FAT">Fosfat. acid. total</label>

                <input type="checkbox" name="Name[]" id="FAP" value="Fosfat. acid. prost.">
                <label for="FAP">Fosfat. acid. prost.</label>

                <input type="checkbox" name="Name[]" id="GGTP" value="G.G.T.P">
                <label for="GGTP">G.G.T.P</label>

                <input type="checkbox" name="Name[]" id="CPKM" value="C.P.K.MB.">
                <label for="CPKM">C.P.K.MB.</label>

                <input type="checkbox" name="Name[]" id="Amilasao" value="Amilasa orina">
                <label for="Amilasao"> Amilasa orina</label>

                <input type="checkbox" name="Name[]" id="Amilasas" value="Amilasa sérica">
                <label for="Amilasas">Amilasa sérica</label>

                <input type="checkbox" name="Name[]" id="Lipasas" value="Lipasa sérica">
                <label for="Lipasas">Lipasa sérica</label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">ORINA (QUÍMICA):</h2>
                <input type="checkbox" name="Name[]" id="fisico" value="Físico">
                <label for="fisico">Físico</label>

                <input type="checkbox" name="Name[]" id="Quimico" value="Químico">
                <label for="Quimico">Químico</label>

                <input type="checkbox" name="Name[]" id="Sedimento" value="Sedimento">
                <label for="Sedimento">Sedimento</label>

                <input type="checkbox" name="Name[]" id="Cultivoa" value="Cultivo antibiograma">
                <label for="Cultivoa">Cultivo antibiograma</label>

                <input type="checkbox" name="Name[]" id="Gravindex" value="Gravindex">
                <label for="Gravindex">Gravindex</label>

                <hr style="margin-left: 20px;">

                <input type="checkbox" name="Name[]" id="UrinalisisEMOFQS" value="Urinalisis EMO (F.Q.S.)">
                <label for="UrinalisisEMOFQS">Urinalisis EMO (F.Q.S.)</label>

                <input type="checkbox" name="Name[]" id="Albumina24h" value="Albumina 24h">
                <label for="Albumina24h">Albumina 24h</label>

                <input type="checkbox" name="Name[]" id="AlbuminaOcasional" value="Albumina Ocasional">
                <label for="AlbuminaOcasional">Albumina Ocasional</label>

                <input type="checkbox" name="Name[]" id="CloroOrina" value="Cloro en Orina">
                <label for="CloroOrina">Cloro en Orina</label>

                <input type="checkbox" name="Name[]" id="Cocaina" value="Cocaína">
                <label for="Cocaina">Cocaína</label>

                <input type="checkbox" name="Name[]" id="Creatinina24h" value="Creatinina 24h">
                <label for="Creatinina24h">Creatinina 24h</label>

                <input type="checkbox" name="Name[]" id="Creatinina Ocasional" value="Creatinina Ocasional">
                <label for="Creatinina Ocasional">Creatinina Ocasional</label>

                <input type="checkbox" name="Name[]" id="DepuraciondeCreatinina" value="Depuración de Creatinina">
                <label for="DepuraciondeCreatinina">Depuración de Creatinina</label>

                <input type="checkbox" name="Name[]" id="DirectoBKBAAR" value="Directo de B.K. (BAAR)">
                <label for="DirectoBKBAAR">Directo de B.K. (BAAR)</label>

                <input type="checkbox" name="Name[]" id="DrogasPanel" value="Drogas Panel">
                <label for="DrogasPanel">Drogas Panel</label>

                <input type="checkbox" name="Name[]" id="Embarazo" value="Embarazo">
                <label for="Embarazo">Embarazo</label>

                <input type="checkbox" name="Name[]" id="FosforoOrina" value="Fósforo de Orina">
                <label for="FosforoOrina">Fósforo de Orina</label>

                <input type="checkbox" name="Name[]" id="Magnesio" value="Magnesio">
                <label for="Magnesio">Magnesio</label>

                <input type="checkbox" name="Name[]" id="Marihuana" value="Marihuana">
                <label for="Marihuana">Marihuana</label>

                <input type="checkbox" name="Name[]" id="Microalbuminuria" value="Microalbuminuria">
                <label for="Microalbuminuria">Microalbuminuria</label>

                <input type="checkbox" name="Name[]" id="PotasioOrina" value="Potasio en Orina">
                <label for="PotasioOrina">Potasio en Orina</label>

                <input type="checkbox" name="Name[]" id="ProteinaBenceJones" value="Proteina de Bence Jones">
                <label for="ProteinaBenceJones">Proteina de Bence Jones</label>

                <input type="checkbox" name="Name[]" id="PyrilinksD" value="Pyrilinks - D">
                <label for="PyrilinksD">Pyrilinks - D</label>

                <input type="checkbox" name="Name[]" id="RecuentoADDIS" value="Recuento de ADDIS">
                <label for="RecuentoADDIS">Recuento de ADDIS</label>

                <input type="checkbox" name="Name[]" id="Sodio24h" value="Sodio en 24h">
                <label for="Sodio24h">Sodio en 24h</label>

                <input type="checkbox" name="Name[]" id="SodioOcacional" value="Sodio Ocacional">
                <label for="SodioOcacional">Sodio Ocacional</label>

                <input type="checkbox" name="Name[]" id="TincionGram" value="Tinción de Gram">
                <label for="TincionGram">Tinción de Gram</label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">HECES:</h2>
                <input type="checkbox" name="Name[]" id="Parasitol" value="Parasitológico">
                <label for="Parasitol">Parasitológico</label>

                <input type="checkbox" name="Name[]" id="Estudiom" value="Estudio del moco fecal">
                <label for="Estudiom">Estudio del moco fecal</label>

                <input type="checkbox" name="Name[]" id="Sangreo" value="Sangre oculta">
                <label for="Sangreo"> Sangre oculta</label>

                <input type="checkbox" name="Name[]" id="Tiniciong" value="Tinición de Gram">
                <label for="Tiniciong">Tinición de Gram</label>

                <input type="checkbox" name="Name[]" id="Coprocultivo" value="Coprocultivo">
                <label for="Coprocultivo">Coprocultivo</label>

                <hr style="margin-left: 20px;">

                <input type="checkbox" name="Name[]" id="HecesParasitosConcent" value="Heces: Parásitos por Concent">
                <label for="HecesParasitosConcent">Heces: Parásitos por Concent</label>

                <input type="checkbox" name="Name[]" id="SudanIIIGrasas" value="Sudan III-Grasas">
                <label for="SudanIIIGrasas">Sudan III-Grasas</label>

                <input type="checkbox" name="Name[]" id="CitologiaMocoFecal" value="Citología Moco Fecal">
                <label for="CitologiaMocoFecal">Citología Moco Fecal</label>

                <input type="checkbox" name="Name[]" id="Funcional" value="Funcional">
                <label for="Funcional">Funcional</label>

                <input type="checkbox" name="Name[]" id="HecesAdenovirus" value="Heces Adenovirus">
                <label for="HecesAdenovirus">Heces Adenovirus</label>

                <input type="checkbox" name="Name[]" id="HecesHPylori" value="Heces H. Pylori">
                <label for="HecesHPylori">Heces H. Pylori</label>

                <input type="checkbox" name="Name[]" id="HecesNickerson" value="Heces Nickerson">
                <label for="HecesNickerson">Heces Nickerson</label>

                <input type="checkbox" name="Name[]" id="HecesRotavirus" value="Heces Rotavirus">
                <label for="HecesRotavirus">Heces Rotavirus</label>

                <input type="checkbox" name="Name[]" id="HecesSangreOculta" value="Heces Sangre Oculta">
                <label for="HecesSangreOculta">Heces Sangre Oculta</label>

                <input type="checkbox" name="Name[]" id="OxiuroaTecGraham" value="Oxiuroa Tec. Graham">
                <label for="OxiuroaTecGraham">Oxiuroa Tec. Graham</label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">ESPUTOS:</h2>
                <input type="checkbox" name="Name[]" id="Parasitos" value="Parásitos">
                <label for="Parasitos">Parásitos</label>

                <input type="checkbox" name="Name[]" id="Tinig" value="Tinición de Gram">
                <label for="Tinig">Tinición de Gram</label>

                <input type="checkbox" name="Name[]" id="ziel" value="Ziel (B de K)">
                <label for="ziel">Ziel (B de K)</label>

                <input type="checkbox" name="Name[]" id="cultivoa" value="Cultivo antibiograma">
                <label for="cultivoa">Cultivo antibiograma</label>

                <hr style="margin-left: 20px;">

                <input type="checkbox" name="Name[]" id="EsputoBkBAAR" value="Esputo de B.k. (B.A.A.R.)">
                <label for="EsputoBkBAAR">Esputo de B.k. (B.A.A.R.)</label>

                <input type="checkbox" name="Name[]" id="tincionGram" value="Tinción de Gram">
                <label for="tincionGram">Tinción de Gram</label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">SEC. ESPERMATICA:</h2>
                <input type="checkbox" name="Name[]" id="Espermatograma" value="Espermatograma">
                <label for="Espermatograma">Espermatograma</label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">EX. FARINGEO:</h2>
                <input type="checkbox" name="Name[]" id="Cultivoan" value="Cultivo antibiograma">
                <label for="Cultivoan">Cultivo antibiograma</label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">HEMATOLOGÍA:</h2>
                <input type="checkbox" name="Name[]" id="hemograma" value="Hemograma">
                <label for="hemograma">Hemograma</label>

                <input type="checkbox" name="Name[]" id="trombocitos" value="Trombocitos">
                <label for="trombocitos">Trombocitos</label>

                <input type="checkbox" name="Name[]" id="reticulocitos" value="Reticulocitos">
                <label for="reticulocitos">Reticulocitos</label>

                <input type="checkbox" name="Name[]" id="hematozoarios" value="Hematozoarios (Crom)">
                <label for="hematozoarios">Hematozoarios (Crom)</label>

                <input type="checkbox" name="Name[]" id="prolactina" value="Prolactina">
                <label for="prolactina">Prolactina</label>

                <input type="checkbox" name="Name[]" id="entrosedimentacion" value="Entrosedimentación">
                <label for="entrosedimentacion">Entrosedimentación</label>

                <input type="checkbox" name="Name[]" id="fragosmotica" value="Frag. Osmótica">
                <label for="fragosmotica">Frag. Osmótica</label>

                <input type="checkbox" name="Name[]" id="gruposanguineorh" value="Grupo Sanguíneo y Rh.">
                <label for="gruposanguineorh">Grupo Sanguíneo y Rh.</label>

                <input type="checkbox" name="Name[]" id="tsangria" value="T. de Sangría">
                <label for="tsangria">T. de Sangría</label>

                <input type="checkbox" name="Name[]" id="tcoagulacion" value="T. de Coagulación">
                <label for="tcoagulacion">T. de Coagulación</label>

                <input type="checkbox" name="Name[]" id="tp" value="T.P.">
                <label for="tp">T.P.</label>

                <input type="checkbox" name="Name[]" id="ttp" value="T.T.P.">
                <label for="ttp">T.T.P.</label>

                <input type="checkbox" name="Name[]" id="rin" value="R.I.N.">
                <label for="rin">R.I.N.</label>

                <input type="checkbox" name="Name[]" id="fibrinogino" value="Fibrinógino">
                <label for="fibrinogino">Fibrinógino</label>

                <input type="checkbox" name="Name[]" id="frotisperiferica" value="Frotis Sangre Periférica">
                <label for="frotisperiferica">Frotis Sangre Periférica</label>

                <input type="checkbox" name="Name[]" id="retraccioncoagulo" value="Retracción de Coágulo">
                <label for="retraccioncoagulo">Retracción de Coágulo</label>

                <input type="checkbox" name="Name[]" id="coombsdirecta" value="Coombs Directa">
                <label for="coombsdirecta">Coombs Directa</label>

                <input type="checkbox" name="Name[]" id="coombsindirecta" value="Coombs Indirecta">
                <label for="coombsindirecta">Coombs Indirecta</label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">ELECTROLITOS:</h2>
                <input type="checkbox" name="Name[]" id="Cloro2" value="Cloro">
                <label for="Cloro2">Cloro</label>

                <input type="checkbox" name="Name[]" id="Sodio2" value="Sodio">
                <label for="Sodio2">Sodio</label>

                <input type="checkbox" name="Name[]" id="Potasio2" value="Potasio">
                <label for="Potasio2">Potasio</label>

                <input type="checkbox" name="Name[]" id="CalcioTotal" value="Calcio Total">
                <label for="CalcioTotal">Calcio Total</label>

                <input type="checkbox" name="Name[]" id="CalcioLonico" value="Calcio Lónico">
                <label for="CalcioLonico">Calcio Lónico</label>

                <input type="checkbox" name="Name[]" id="Amonio" value="Amonio">
                <label for="Amonio">Amonio</label>

                <input type="checkbox" name="Name[]" id="Fosforo" value="Fósforo">
                <label for="Fosforo">Fósforo</label>

                <input type="checkbox" name="Name[]" id="Hierro" value="Hierro">
                <label for="Hierro">Hierro</label>

                <input type="checkbox" name="Name[]" id="Litio" value="Litio">
                <label for="Litio">Litio</label>

                <input type="checkbox" name="Name[]" id="magnesio" value="Magnesio">
                <label for="magnesio">Magnesio</label>

                <input type="checkbox" name="Name[]" id="Plomo" value="Plomo">
                <label for="Plomo">Plomo</label>

                <input type="checkbox" name="Name[]" id="ReservaAlcalina" value="Reserva Alcalina">
                <label for="ReservaAlcalina">Reserva Alcalina</label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">CULIVOS Y ANTIBIOGRAMAS:</h2>
                <input type="checkbox" name="Name[]" id="coprocultivo" value="Coprocultivo">
                <label for="coprocultivo">Coprocultivo</label>

                <input type="checkbox" name="Name[]" id="espsec" value="Esperma Secreción">
                <label for="espsec">Esperma Secreción</label>

                <input type="checkbox" name="Name[]" id="esputo" value="Esputo">
                <label for="esputo">Esputo</label>

                <input type="checkbox" name="Name[]" id="exudadofari" value="Exudado Faringeo">
                <label for="exudadofari">Exudado Faringeo</label>

                <input type="checkbox" name="Name[]" id="hemocultivo" value="Hemocultivo">
                <label for="hemocultivo">Hemocultivo</label>

                <input type="checkbox" name="Name[]" id="rinofarin" value="Rinofaringeo">
                <label for="rinofarin">Rinofaringeo</label>

                <input type="checkbox" name="Name[]" id="uretralsec" value="Uretral Secreción">
                <label for="uretralsec">Uretral Secreción</label>

                <input type="checkbox" name="Name[]" id="urocultivo" value="Urocultivo">
                <label for="urocultivo">Urocultivo</label>

                <input type="checkbox" name="Name[]" id="vaginalsec" value="Vaginal Secreción">
                <label for="vaginalsec">Vaginal Secreción</label>
            </div>


            <div class="checkbox">
                <h2 style="background-color:#CCEEFF; margin-left: 1px; padding: 5px 10px 5px 15px;">ESPECIALES:</h2>
                <div class="row" style="display: flex;">
                    <div class="col-md-4">
                        <input type="checkbox" name="Name[]" id="pembarazo" value="P. embarazo en sangre">
                        <label for="pembarazo">P. embarazo en sangre</label>
                        <input type="checkbox" name="Name[]" id="tt" value="T3-T4">
                        <label for="tt">T3-T4</label>
                        <input type="checkbox" name="Name[]" id="Clamudia" value="Clamudia">
                        <label for="Clamudia">Clamudia</label>
                        <input type="checkbox" name="Name[]" id="progresivos" value="Progresivos">
                        <label for="progresivos">Progresivos</label>
                        <input type="checkbox" name="Name[]" id="Prolactina" value="Prolactina">
                        <label for="Prolactina">Prolactina</label>
                        <input type="checkbox" name="Name[]" id="Seraam" value="Sera ameba">
                        <label for="Seraam">Sera ameba</label>
                        <input type="checkbox" name="Name[]" id="Complementoc" value="Complemento C3-C4">
                        <label for="Complementoc">Complemento C3-C4</label>
                        <hr style="margin-left: 20px;">
                        <input type="checkbox" name="Name[]" id="betaEstra" value="17 Beta-Estradiol">
                        <label for="betaEstra">17 Beta-Estradiol</label>
                        <input type="checkbox" name="Name[]" id="acadna" value="Ac Anti DNA">
                        <label for="acadna">Ac Anti DNA</label>

                        <input type="checkbox" name="Name[]" id="acanuclear" value="Ac Anti-Nucleares (ANA)">
                        <label for="acanuclear">Ac Anti-Nucleares (ANA)</label>

                        <input type="checkbox" name="Name[]" id="acarnp" value="Ac Anti-RNP/SM">
                        <label for="acarnp">Ac Anti-RNP/SM</label>

                        <input type="checkbox" name="Name[]" id="acatb" value="Ac Anti-TB">
                        <label for="acatb">Ac Anti-TB</label>

                        <input type="checkbox" name="Name[]" id="acatiro" value="Ac Anti-Tiroglobulina (ATG)">
                        <label for="acatiro">Ac Anti-Tiroglobulina (ATG)</label>

                        <input type="checkbox" name="Name[]" id="acssa" value="Ac. SS-A(Ro)/SS-B(La)B">
                        <label for="acssa">Ac. SS-A(Ro)/SS-B(La)B</label>

                        <input type="checkbox" name="Name[]" id="acidofolico" value="Acido Fólico">
                        <label for="acidofolico">Acido Fólico</label>

                        <input type="checkbox" name="Name[]" id="acidoval" value="Acido Valproico">
                        <label for="acidoval">Acido Valproico</label>

                        <input type="checkbox" name="Name[]" id="acth" value="ACTH">
                        <label for="acth">ACTH</label>

                        <input type="checkbox" name="Name[]" id="afp" value="AFP (Alfa Feto Proteína)">
                        <label for="afp">AFP (Alfa Feto Proteína)</label>

                        <input type="checkbox" name="Name[]" id="aae" value="Alergias Alergenos Específico">
                        <label for="aae">Alergias Alergenos Específico</label>

                        <input type="checkbox" name="Name[]" id="alergiasPanel" value="Alergias Panel">
                        <label for="alergiasPanel">Alergias Panel</label>

                        <input type="checkbox" name="Name[]" id="ama" value="AMA - Antimitoncondrial">
                        <label for="ama">AMA - Antimitoncondrial</label>

                        <input type="checkbox" name="Name[]" id="ancac" value="Anca C">
                        <label for="ancac">Anca C</label>

                        <input type="checkbox" name="Name[]" id="ancap" value="Anca P">
                        <label for="ancap">Anca P</label>

                        <input type="checkbox" name="Name[]" id="antiena" value="Anti - ENA">
                        <label for="antiena">Anti - ENA</label>

                        <input type="checkbox" name="Name[]" id="anitromlll" value="Antitrombina III">
                        <label for="anitromlll">Antitrombina III</label>

                        <input type="checkbox" name="Name[]" id="apolipoa" value="Apolipoproteína A1">
                        <label for="apolipoa">Apolipoproteína A1</label>

                        <input type="checkbox" name="Name[]" id="apolipob" value="Apolipoproteína B">
                        <label for="apolipob">Apolipoproteína B</label>

                        <input type="checkbox" name="Name[]" id="asmaanti" value="ASMA - Anti musculo liso">
                        <label for="asmaanti">ASMA - Anti musculo liso</label>

                        <input type="checkbox" name="Name[]" id="betaMicro" value="Beta-2 microglobulina">
                        <label for="betaMicro">Beta-2 microglobulina</label>

                        <input type="checkbox" name="Name[]" id="cacv" value="Beta 125">
                        <label for="cacv">Ca 125</label>

                        <input type="checkbox" name="Name[]" id="caqt" value="CA 15-3">
                        <label for="caqt">CA 15-3</label>

                        <input type="checkbox" name="Name[]" id="cadn" value="CA 19-9">
                        <label for="cadn">CA 19-9</label>

                        <input type="checkbox" name="Name[]" id="casc" value="CA 72-4">
                        <label for="casc">CA 72-4</label>

                        <input type="checkbox" name="Name[]" id="calcitonina" value="Calcitonina (Tirocal)">
                        <label for="calcitonina">Calcitonina (Tirocal)</label>

                        <input type="checkbox" name="Name[]" id="calculoRenal" value="Cálculo Renal">
                        <label for="calculoRenal">Cálculo Renal</label>

                        <input type="checkbox" name="Name[]" id="carbamazepina" value="Carbamazepina">
                        <label for="carbamazepina">Carbamazepina</label>

                        <input type="checkbox" name="Name[]" id="cardiolipinag" value="Cardiolipina lgG">
                        <label for="cardiolipinag">Cardiolipina lgG</label>

                        <input type="checkbox" name="Name[]" id="cardiolipinam" value="Cardiolipina lgM">
                        <label for="cardiolipinam">Cardiolipina lgM</label>

                        <input type="checkbox" name="Name[]" id="cea" value="CEA">
                        <label for="cea">CEA</label>

                        <input type="checkbox" name="Name[]" id="chagas" value="Chagas (Ac. Anti-Chagas)">
                        <label for="chagas">Chagas (Ac. Anti-Chagas)</label>

                        <input type="checkbox" name="Name[]" id="clamydiag" value="Chlamydia Ac. Anti-C lgG">
                        <label for="clamydiag">Chlamydia Ac. Anti-C lgG</label>

                        <input type="checkbox" name="Name[]" id="clamydiam" value="Chlamydia Ac. Anti-C lgM">
                        <label for="clamydiam">Chlamydia Ac. Anti-C lgM</label>

                        <input type="checkbox" name="Name[]" id="clatina" value="Cistatina C">
                        <label for="clatina">Cistatina C</label>

                        <input type="checkbox" name="Name[]" id="cisticerco" value="Cisticercosis (Ac. Anti)">
                        <label for="cisticerco">Cisticercosis (Ac. Anti)</label>

                        <input type="checkbox" name="Name[]" id="citomegag" value="Citomegalovirus (Ac. anti-lgG)">
                        <label for="citomegag">Citomegalovirus (Ac. anti-lgG)</label>

                        <input type="checkbox" name="Name[]" id="citomegam" value="Citomegalovirus (Ac. anti-lgM)">
                        <label for="citomegam">Citomegalovirus (Ac. anti-lgM)</label>

                        <input type="checkbox" name="Name[]" id="complemento3" value="Complemento C3">
                        <label for="complemento3">Complemento C3</label>

                        <input type="checkbox" name="Name[]" id="complemento4" value="Complemento C4">
                        <label for="complemento4">Complemento C4</label>


                    </div>

                    <div class="col-md-4">
                        <input type="checkbox" name="Name[]" id="cortisol" value="Cortisol">
                        <label for="cortisol">Cortisol</label>

                        <input type="checkbox" name="Name[]" id="cyfra" value="Cyfra 21-1">
                        <label for="cyfra">Cyfra 21-1</label>

                        <input type="checkbox" name="Name[]" id="dengueg" value="Dengue (Ac. Anti-lgG)">
                        <label for="dengueg">Dengue (Ac. Anti-lgG)</label>

                        <input type="checkbox" name="Name[]" id="denguem" value="Dengue (Ac. Anti-lgM)">
                        <label for="denguem">Dengue (Ac. Anti-lgM)</label>

                        <input type="checkbox" name="Name[]" id="dheas" value="DHEAS">
                        <label for="dheas">DHEAS</label>

                        <input type="checkbox" name="Name[]" id="digoxina" value="Digoxina">
                        <label for="digoxina">Digoxina</label>

                        <input type="checkbox" name="Name[]" id="dimero" value="Dimero D">
                        <label for="dimero">Dimero D</label>

                        <input type="checkbox" name="Name[]" id="embarazoSangre" value="Embarazo en sangre">
                        <label for="embarazoSangre">Embarazo en sangre</label>

                        <input type="checkbox" name="Name[]" id="epsteing" value="Epstein Barr-lgG">
                        <label for="epsteing">Epstein Barr-lgG</label>

                        <input type="checkbox" name="Name[]" id="epsteinm" value="Epstein Barr-lgM">
                        <label for="epsteinm">Epstein Barr-lgM</label>

                        <input type="checkbox" name="Name[]" id="eritopoyetina" value="Eritopoyetina">
                        <label for="eritopoyetina">Eritopoyetina</label>

                        <input type="checkbox" name="Name[]" id="estriolno" value="Estriol no Conjugado">
                        <label for="estriolno">Estriol no Conjugado</label>

                        <input type="checkbox" name="Name[]" id="factorReuma" value="Factor Reumatoideo">
                        <label for="factorReuma">Factor Reumatoideo</label>

                        <input type="checkbox" name="Name[]" id="factorVon" value="Factor de Von Willebrand">
                        <label for="factorVon">Factor de Von Willebrand</label>

                        <input type="checkbox" name="Name[]" id="factov" value="Factor V">
                        <label for="factov">Factor V</label>

                        <input type="checkbox" name="Name[]" id="factorvii" value="Factor VII">
                        <label for="factorvii">Factor VII</label>

                        <input type="checkbox" name="Name[]" id="factorviii" value="Factor VIII">
                        <label for="factorviii">Factor VIII</label>

                        <input type="checkbox" name="Name[]" id="factorix" value="Factor IX">
                        <label for="factorix">Factor IX</label>

                        <input type="checkbox" name="Name[]" id="factorx" value="Factor X">
                        <label for="factorx">Factor X</label>

                        <input type="checkbox" name="Name[]" id="factorxi" value="Factor XI">
                        <label for="factorxi">Factor XI</label>

                        <input type="checkbox" name="Name[]" id="factorxii" value="Factor XII">
                        <label for="factorxii">Factor XII</label>

                        <input type="checkbox" name="Name[]" id="fenitoina" value="Fenitoina">
                        <label for="fenitoina">Fenitoina</label>

                        <input type="checkbox" name="Name[]" id="fenobarbital" value="Fenobarbital">
                        <label for="fenobarbital">Fenobarbital</label>

                        <input type="checkbox" name="Name[]" id="ferri" value="Ferritina">
                        <label for="ferri">Ferritina</label>

                        <input type="checkbox" name="Name[]" id="fructo" value="Fructosamina">
                        <label for="fructo">Fructosamina</label>

                        <input type="checkbox" name="Name[]" id="FSH" value="FSH">
                        <label for="FSH">FSH</label>

                        <input type="checkbox" name="Name[]" id="fta" value="FTA Absorción">
                        <label for="fta">FTA Absorción</label>

                        <input type="checkbox" name="Name[]" id="glufodes" value="Glucosa 6 Fosfato deshidrogenasa">
                        <label for="glufodes">Glucosa 6 Fosfato deshidrogenasa</label>

                        <input type="checkbox" name="Name[]" id="hapto" value="Haptoglobina">
                        <label for="hapto">Haptoglobina</label>

                        <input type="checkbox" name="Name[]" id="hemoglico" value="HbA1c Hemog. Glicosilada">
                        <label for="hemoglico">HbA1c Hemog. Glicosilada</label>

                        <input type="checkbox" name="Name[]" id="hcg" value="HCG cuantitativa">
                        <label for="hcg">HCG cuantitativa</label>

                        <input type="checkbox" name="Name[]" id="hepaag" value="Hepatitis A (Ac. Anti-lgG)">
                        <label for="hepaag">Hepatitis A (Ac. Anti-lgG)</label>

                        <input type="checkbox" name="Name[]" id="hepaam" value="Hepatitis A (Ac. Anti-lgM)">
                        <label for="hepaam">Hepatitis A (Ac. Anti-lgM)</label>

                        <input type="checkbox" name="Name[]" id="hepab" value="Hepattitis B (Ac. Anti-HBS)">
                        <label for="hepab">Hepattitis B (Ac. Anti-HBS)</label>

                        <input type="checkbox" name="Name[]" id="hepabg" value="Hepattitis B (Ac. Anti-HBcore lgG)">
                        <label for="hepabg">Hepattitis B (Ac. Anti-HBcore lgG)</label>

                        <input type="checkbox" name="Name[]" id="hepabm" value="Hepattitis B (Ac. Anti-HBcore lgM)">
                        <label for="hepabm">Hepattitis B (Ac. Anti-HBcore lgM)</label>

                        <input type="checkbox" name="Name[]" id="hepabe" value="Hepatitis B HBeAg">
                        <label for="hepabe">Hepatitis B HBeAg</label>

                        <input type="checkbox" name="Name[]" id="hepabs" value="Hepatitis B HBsAg">
                        <label for="hepabs">Hepatitis B HBsAg</label>

                        <input type="checkbox" name="Name[]" id="hepac" value="Hepatitis C (Ac. Anti)">
                        <label for="hepac">Hepatitis C (Ac. Anti)</label>

                        <input type="checkbox" name="Name[]" id="herpesug" value="Herpes 1 lgG">
                        <label for="herpesug">Herpes 1 lgG</label>

                        <input type="checkbox" name="Name[]" id="hherpesum" value="Herpes 1 lgM">
                        <label for="hherpesum">Herpes 1 lgM</label>

                        <input type="checkbox" name="Name[]" id="herpesdg" value="Herpes 2 lgG">
                        <label for="herpesdg">Herpes 2 lgG</label>

                        <input type="checkbox" name="Name[]" id="hherpesdm" value="Herpes 2 lgM">
                        <label for="hherpesdm">Herpes 2 lgM</label>

                        <input type="checkbox" name="Name[]" id="hgh" value="HGH">
                        <label for="hgh">HGH</label>

                        <input type="checkbox" name="Name[]" id="hiv" value="HIV (Ac. Anti-1 y 2)">
                        <label for="hiv">HIV (Ac. Anti-1 y 2)</label>

                        <input type="checkbox" name="Name[]" id="hlab" value="HLA-B27">
                        <label for="hlab">HLA-B27</label>

                        <input type="checkbox" name="Name[]" id="homa" value="Homa IR">
                        <label for="homa">Homa IR</label>

                        <input type="checkbox" name="Name[]" id="homo" value="Homocisteína">
                        <label for="homo">Homocisteína</label>

                        <input type="checkbox" name="Name[]" id="lga" value="lgA">
                        <label for="lga">lgA</label>

                        <input type="checkbox" name="Name[]" id="lge" value="lgE">
                        <label for="lge">lgE</label>

                        <input type="checkbox" name="Name[]" id="igb" value="IGF-1">
                        <label for="igb">IGF-1</label>

                        <input type="checkbox" name="Name[]" id="igfbp" value="IGFBP-3">
                        <label for="igfbp">IGFBP-3</label>

                        <input type="checkbox" name="Name[]" id="lgg" value="lgG">
                        <label for="lgg">lgG</label>
                    </div>

                    <div class="col-md-4">
                        <input type="checkbox" name="Name[]" id="lgm" value="lgM">
                        <label for="lgm">lgM</label>

                        <input type="checkbox" name="Name[]" id="insulina" value="Insulina">
                        <label for="insulina">Insulina</label>

                        <input type="checkbox" name="Name[]" id="lh" value="LH">
                        <label for="lh">LH</label>

                        <input type="checkbox" name="Name[]" id="leptog" value="Leptospirosis lgG">
                        <label for="leptog">Leptospirosis lgG</label>

                        <input type="checkbox" name="Name[]" id="leptom" value="Leptospirosis lgM">
                        <label for="leptom">Leptospirosis lgM</label>

                        <input type="checkbox" name="Name[]" id="lipoa" value="Lipoproteína (a) LP(a)">
                        <label for="lipoa">Lipoproteína (a) LP(a)</label>

                        <input type="checkbox" name="Name[]" id="mioglobina" value="Mioglobina">
                        <label for="mioglobina">Mioglobina</label>

                        <input type="checkbox" name="Name[]" id="neuroeno" value="Neuro-enolasa">
                        <label for="neuroeno">Neuro-enolasa</label>

                        <input type="checkbox" name="Name[]" id="peptidoc" value="Péptido C">
                        <label for="peptidoc">Péptido C</label>

                        <input type="checkbox" name="Name[]" id="acantipep" value="Ac. Anti-Péptido Citrulinado">
                        <label for="acantipep">Ac. Anti-Péptido Citrulinado</label>

                        <input type="checkbox" name="Name[]" id="peptidobnp" value="Péptido Natriurético BNP">
                        <label for="peptidobnp">Péptido Natriurético BNP</label>

                        <input type="checkbox" name="Name[]" id="ppd" value="P.P.D.">
                        <label for="ppd">P.P.D.</label>

                        <input type="checkbox" name="Name[]" id="prealbumina" value="Prealbúmina">
                        <label for="prealbumina">Prealbúmina</label>

                        <input type="checkbox" name="Name[]" id="Progesterona" value="Progesterona">
                        <label for="Progesterona">Progesterona</label>

                        <input type="checkbox" name="Name[]" id="prolactin" value="Prolactina">
                        <label for="prolactin">Prolactina</label>

                        <input type="checkbox" name="Name[]" id="prp" value="PRP (Plasma Rico en Plaquetas)">
                        <label for="prp">PRP (Plasma Rico en Plaquetas)</label>

                        <input type="checkbox" name="Name[]" id="PSA" value="PSA">
                        <label for="PSA">PSA</label>

                        <input type="checkbox" name="Name[]" id="PSAlp" value="PSA libre porcentaje">
                        <label for="PSAlp">PSA libre porcentaje</label>

                        <input type="checkbox" name="Name[]" id="PTH" value="PTH">
                        <label for="PTH">PTH</label>

                        <input type="checkbox" name="Name[]" id="pilorya" value="Pilory lgA">
                        <label for="pilorya">Pilory lgA</label>

                        <input type="checkbox" name="Name[]" id="piloryg" value="Pilory lgG">
                        <label for="piloryg">Pilory lgG</label>

                        <input type="checkbox" name="Name[]" id="pilorym" value="Pilory lgM">
                        <label for="pilorym">Pilory lgM</label>

                        <input type="checkbox" name="Name[]" id="rubeolag" value="Rubeola (Ac. Anti-lgG)">
                        <label for="rubeolag">Rubeola (Ac. Anti-lgG)</label>

                        <input type="checkbox" name="Name[]" id="rubeolam" value="Rubeola (Ac. Anti-lgM)">
                        <label for="rubeolam">Rubeola (Ac. Anti-lgM)</label>

                        <input type="checkbox" name="Name[]" id="sarampion" value="Sarampión lgM">
                        <label for="sarampion">Sarampión lgM</label>

                        <input type="checkbox" name="Name[]" id="scl" value="Scl 70">
                        <label for="scl">Scl 70</label>

                        <input type="checkbox" name="Name[]" id="serameba" value="Serameba (Ac. Anti-ameba)">
                        <label for="serameba">Serameba (Ac. Anti-ameba)</label>

                        <input type="checkbox" name="Name[]" id="shbg" value="S.H.B.G.">
                        <label for="shbg">S.H.B.G.</label>

                        <input type="checkbox" name="Name[]" id="sueroAuto" value="Suero Autólogo (Oftálmico)">
                        <label for="sueroAuto">Suero Autólogo (Oftálmico)</label>

                        <input type="checkbox" name="Name[]" id="tlibre" value="T3 libre">
                        <label for="tlibre">T3 libre</label>

                        <input type="checkbox" name="Name[]" id="ttotal" value="T3 total">
                        <label for="ttotal">T3 total</label>

                        <input type="checkbox" name="Name[]" id="tclibre" value="T4 libre">
                        <label for="tclibre">T4 libre</label>

                        <input type="checkbox" name="Name[]" id="tctotal" value="T4 total">
                        <label for="tctotal">T4 total</label>

                        <input type="checkbox" name="Name[]" id="testo" value="Testosterona">
                        <label for="testo">Testosterona</label>

                        <input type="checkbox" name="Name[]" id="testolibre" value="Testosterona libre (calc)">
                        <label for="testolibre">Testosterona libre (calc)</label>

                        <input type="checkbox" name="Name[]" id="tiroglo" value="Tiroglobulin">
                        <label for="tiroglo">Tiroglobulin</label>

                        <input type="checkbox" name="Name[]" id="toxog" value="Toxoplasma (Ac. Anti-lgG)">
                        <label for="toxog">Toxoplasma (Ac. Anti-lgG)</label>

                        <input type="checkbox" name="Name[]" id="toxom" value="Toxoplasma (Ac. Anti-lgM)">
                        <label for="toxom">Toxoplasma (Ac. Anti-lgM)</label>

                        <input type="checkbox" name="Name[]" id="tpo" value="TPO (Ac.- Microsomales TPO)">
                        <label for="tpo">TPO (Ac.- Microsomales TPO)</label>

                        <input type="checkbox" name="Name[]" id="transferina" value="Transferina">
                        <label for="transferina">Transferina</label>

                        <input type="checkbox" name="Name[]" id="transferinas" value="Transferina Saturación">
                        <label for="transferinas">Transferina Saturación</label>

                        <input type="checkbox" name="Name[]" id="troponinai" value="Troponina I">
                        <label for="troponinai">Troponina I</label>

                        <input type="checkbox" name="Name[]" id="troponinat" value="Troponina T">
                        <label for="troponinat">Troponina T</label>

                        <input type="checkbox" name="Name[]" id="TSH" value="TSH">
                        <label for="TSH">TSH</label>

                        <input type="checkbox" name="Name[]" id="varig" value="Varicela lgG">
                        <label for="varig">Varicela lgG</label>

                        <input type="checkbox" name="Name[]" id="varim" value="Varicela lgM">
                        <label for="varim">Varicela lgM</label>

                        <input type="checkbox" name="Name[]" id="vitab" value="Vitamina B 12">
                        <label for="vitab">Vitamina B 12</label>

                        <input type="checkbox" name="Name[]" id="vitad" value="Vitamina D">
                        <label for="vitad">Vitamina D</label>
                    </div>
<!--                     <div class="col-md-3">

                    </div> -->
                </div>
            </div>

            <br><br>

            <div class="container-login100-form-btn">

          		<div class="wrap-login40-form-btn-aceptar">
          			<div class="login100-form-bgbtn-aceptar"></div>
                    <input class="login100-form-btn-aceptar" type="button" value="Guardar" onclick="pregunta()">
          			<!-- <button class="login100-form-btn-aceptar">
                      Guardar
                    </button> -->
                </div>
                <div class="wrap-login40-form-btn-cancelar">
                    <div class="login100-form-bgbtn-cancelar"></div>
                    <a href="ingreso_examen.php" class="txt2">
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
<script language="JavaScript">
function pregunta(){
    var msg = '';
    var msn = 0;
    var verificar=0;

    var formularios = document.forms;

    let selectElement = document.getElementById('example');
    let selectedValues = Array.from(selectElement.selectedOptions);
    // .map(option => option.value);
    var cuenta = selectedValues.length;

    for (var i=0; i<formularios.length;i++){
        for (var j=0; j<formularios[i].elements.length-2; j++){
            if (j<11+cuenta) {
                var ner = 8+cuenta;
                var segundo = formularios[i].elements[ner].value;

                var neru = 9+cuenta;
                var tercero = formularios[i].elements[neru].value;

                var nerd = 10+cuenta;
                var cuarto = formularios[i].elements[nerd].value;

                var nert = 11+cuenta;
                var quinto = formularios[i].elements[nert].value;

            }
            if (j>cuenta+10) {
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

    if(selectedValues == '' || segundo == '' || tercero == '' || cuarto == '' || quinto == ''){
        msn = 1;
    }

    // alert('verificar '+verificar);
    // alert('msn '+msn);
    if(verificar == 0 || msn == 1){
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

  //alert(msg);
  // alert(cual);

}
</script>

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
