<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<!--================Header Menu Area =================-->
<?php  if ($perfil >= 1){ ?>
<?php
$id_paciente=$_REQUEST['id'];
$consulta=mysqli_query($con,"SELECT * from paciente P inner join estado E on P.estado=E.id_estado inner join sexo S on P.sexo=S.id_sexo inner join tipo_identificacion TI on P.tipo_identificacion=TI.id_tipoidentificacion inner join tipo_paciente TP on P.tipo_paciente=TP.id_tipopaciente WHERE id_paciente='$id_paciente'");
$row=mysqli_fetch_array($consulta);
?>
  <!--================ Banner Area =================-->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container" >
        <div class="banner_content text-left">
          <h2>Editar Paciente</h2>
          <div class="page_link">
            <a href="inicio.php">Inicio</a>
            <a href="busqueda_paciente.php">Buscar Paciente</a>
            <a href="editar_paciente.php?id=<?php echo $id_paciente; ?>">Editar Paciente</a>
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
    function valida(e){
      tecla = (document.all) ? e.keyCode : e.which;

      //Tecla de retroceso para borrar, siempre la permite
      if (tecla==8){
          return true;
        }    
      // Patron de entrada, en este caso solo acepta numeros
      patron =/[0-9]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
    }
</script>
<script type="text/javascript">
  function validarCedula(){
    var cedula = document.getElementById('cedula').value;
    array = cedula.split( "" );
    var nuevo = cedula;
    //2 4 5 7 9
    num = array.length;
    if ( num < 10) {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'warning',
        title: 'La cédula no puede tener menos de 10 dígitos'
      })
      document.getElementById('cedula').value="";
    }
    if ( num == 10 )
    {
      if(nuevo=="0000000000" || nuevo=="2222222222" || nuevo=="4444444444" || nuevo=="5555555555" || nuevo=="7777777777" || nuevo=="9999999999" || nuevo=="1800000000" || nuevo=="1212121212" || nuevo=="1313131313" || nuevo=="1414141414" || nuevo=="1515151515" || nuevo=="1616161616" || nuevo=="1717171717" || nuevo=="1818181818" || nuevo=="1919191919"){
        // alert( "La c\xe9dula NO es v\xe1lida!!!" );
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'warning',
          title: 'La cédula no es válida'
        })
        document.getElementById('cedula').value="";
        $("#cedula").css({
          "background-color": "rgba(0,0,0,0)"
        });
      }
      else
      {
      total = 0;
      digito = (array[9]*1);
      for( i=0; i < (num-1); i++ )
      {
        mult = 0;
        if ( ( i%2 ) != 0 ) {
          total = total + ( array[i] * 1 );
        }
        else
        {
          mult = array[i] * 2;
          if ( mult > 9 )
            total = total + ( mult - 9 );
          else
            total = total + mult;
        }
      }
      decena = total / 10;
      decena = Math.floor( decena );
      decena = ( decena + 1 ) * 10;
      final = ( decena - total );

      if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
        $("#cedula").css({
          "background-color": "rgba(56,208,49,0.5)"
        });
        return true;
      }
      else
      {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'warning',
          title: 'La cédula no es válida'
        })
        document.getElementById('cedula').value="";
        nuevo = '';
        $("#cedula").css({
          "background-color": "rgba(0,0,0,0)"
        });
        return false;
      }
      }
    }//fin del primer if
    else
    {
      return false;
    }
  }
</script>
  <!--================ End Script Area =================-->

  <!--================ Start Appointment Area =================-->
  <div class="container-login100" style="background: #B8E1F7;">
      <div class="wrap-login1000 p-l-55 p-r-55 p-t-65 p-b-54">
        <!-- <form class="login100-form validate-form" method="post" action="" name="formix" id="formix"onsubmit=" return fun_insertar()"> -->
        <form class="login100-form validate-form" method="post" action="app/modificarPaciente.php?id=<?php echo $id_paciente; ?>" name="formix" id="formix"> 
          <!--abrir formulario cuando inicia sesion-->
          <span class="login100-form-title p-b-49">
            Editar Datos del Paciente
          </span>

          <div class="parados">
            <div class="wrap-input100 validate-input m-b-23 m-r-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Nombres</span>
              <input class="input100" type="text" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" required onkeypress="return soloLetras(event)" placeholder="Ej: Carlos Andres">
              <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-23 m-r-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Apellidos</span>
              <input class="input100" type="text" name="apellidos" id="apellidos" value="<?php echo $row['apellidos']; ?>" required onkeypress="return soloLetras(event)" placeholder="Ej: Vera Perez">
              <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>
            <div class="wrap-input100 m-b-23 m-r-10">
              <span class="label-input100">Sexo</span>
                  <select class="input100 m-b-17" name="sexo" id="sexo" required>
                  <?php
                              $consulta2=mysqli_query($con,"SELECT * from sexo");
                              while($row2=mysqli_fetch_array($consulta2)){
                                if($row2['id_sexo']==$row['id_sexo']){$sel="selected='selected'";}else{$sel="";}
                                echo "<option ".$sel." value='".$row2['id_sexo']."'>"; echo $row2['abreviatura']; echo "</option>"; } ?>
                          ?>
                        </select>
            </div>
            <div class="wrap-input100 m-b-23">
              <span class="label-input100">Tipo Paciente</span>
                  <select class="input100 m-b-17"  name="tipopaciente" id="tipopaciente" required>
                  <?php
                              $consulta3=mysqli_query($con,"SELECT * from tipo_paciente");
                              while($row3=mysqli_fetch_array($consulta3)){
                                if($row3['id_tipopaciente']==$row['id_tipopaciente']){$sel="selected='selected'";}else{$sel="";}
                                echo "<option ".$sel." value='".$row3['id_tipopaciente']."'>"; echo $row3['tipo_paciente']; echo "</option>"; } ?>
                          ?>
                        </select>
            </div>
          </div>

          <div class="parados">
            <div class="wrap-input100 m-b-23 m-r-10">
              <span class="label-input100">Tipo Identificación</span>
                  <select class="input100 m-b-17" name="tipoid" id="tipoid" onchange="cambio_identi();" required>
                  <?php
                              $consulta4=mysqli_query($con,"SELECT * from tipo_identificacion");
                              while($row4=mysqli_fetch_array($consulta4)){
                                if($row4['id_tipoidentificacion']==$row['id_tipoidentificacion']){$sel="selected='selected'";}else{$sel="";}
                                echo "<option ".$sel." value='".$row4['id_tipoidentificacion']."'>"; echo $row4['tipo_identificacion']; echo "</option>"; } ?>
                          ?>
                        </select>
            </div>
<script>
  function cambio_identi(){
    var seleccion = document.getElementById('tipoid').value;
    
    if (seleccion==1 || seleccion==3) {
      //alert(seleccion);
      var loadFile = document.getElementById('cedula');
      loadFile.removeAttribute('disabled');
      loadFile.setAttribute('onkeypress','return valida(event)');
      loadFile.setAttribute('onchange','validarCedula()');
    }else if(seleccion==2){
      // alert(seleccion);
      document.getElementById('cedula').removeAttribute('disabled');
      var loadFile = document.getElementById('cedula');
      loadFile.removeAttribute('onkeyup');
      loadFile.removeAttribute('onkeypress');
    }else{
      var loadFile = document.getElementById('cedula');
      loadFile.setAttribute('disabled','');
    }
  }
</script>
<script>
$(buscar_cedula());

function buscar_cedula(consulta){
  $.ajax({
    url: 'ajax_cedula_editar_paciente.php',
    type: 'POST',
    dataType: 'html',
    data: {consulta: consulta},
  })
  .done(function(respuesta){
    if(respuesta==''){
      
    }else{
    if(respuesta>0){
      $("#cedula").css({
        "background-color": "rgba(255,87,87,0.5)"
      });
      document.getElementById('cedula').value='';
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'warning',
        title: 'Ya existe un paciente con la misma cédula'
      })
    }else{
      $("#cedula").css({
        "background-color": "rgba(56,208,49,0.5)"
      });
    }
    }
    // document.getElementById('cedula').value=respuesta;
  })
  .fail(function(){
    console.log("error")
  })
}
$(document).on('blur','#cedula', function(){

  var valr= $(this).val();
  if(valr!=""){
    buscar_cedula(valr);
  }
});
</script>
                      <div class="wrap-input100 validate-input m-b-23 m-r-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Identificación</span>
              <input class="input100" type="text" name="cedula" id="cedula" value="<?php echo $row['identificacion']; ?>" maxlength="10" placeholder="Ej: 092901901" onkeypress="return valida(event)" onchange="validarCedula()" required>
              <span class="focus-input100" data-symbol="&#xf2c3;"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-23 m-r-10" data-validate="Fecha de Nacimiento es requerida">
              <span class="label-input100">Fecha de Nacimiento</span>
              <input class="input100" type="date" name="fnaci" id="fnaci" value="<?php echo $row['fecha_nacimiento']; ?>" onchange="calcularEdad()" placeholder="Ej: correo@correo.com" required>
              <span class="focus-input100" data-symbol="&#xf1ec;"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-23" data-validate = "Nombre es requerido">
              <span class="label-input100">Edad</span>
              <input class="input100" type="text" name="edad" id="edad" value="<?php echo $row['edad']; ?>" maxlength="2" onkeypress="return valida(event)" placeholder="Ej: 25" required>
              <span class="focus-input100" data-symbol="&#xf142;"></span><!-- &#xf274;icono tipo de sangre -->
            </div>
          </div>
<script>
function calcularEdad() {
  var d1 = '<?php echo date('Y-m-d'); ?>';
  var d2 = document.getElementById('fnaci').value;
  var f1=d1.substring(0,4);
  var f2=d2.substring(0,4);
  if (d1>d2) {
    //alert('Fecha Correcta');
  // cogemos los valores nacimiento
  var fn = document.getElementById('fnaci').value;
  var ano=fn.substring(0,4);
  var ano = parseInt(ano);
  var mes=fn.substring(5,7);
  var mes = parseInt(mes);
  var dia=fn.substring(8,10);
  var dia = parseInt(dia);

  // cogemos los valores actuales
  var fecha_hoy = d1;
  var ahora_ano=fecha_hoy.substring(0,4);
  var ahora_ano = parseInt(ahora_ano);
  var ahora_mes=fecha_hoy.substring(5,7);
  var ahora_mes = parseInt(ahora_mes);
  var ahora_dia=fecha_hoy.substring(8,10);
  var ahora_dia = parseInt(ahora_dia);
  // realizamos el calculo
  var edad = ahora_ano + 1900;
  var edad = edad - ano;

  if (ahora_mes < mes) {
    edad--;
  }
  if ((mes == ahora_mes) && (ahora_dia < dia)) {
    edad--;
  }
  if (edad > 1900) {
    edad -= 1900;
  }
  // calculamos los meses
  var meses = 0;
  if (ahora_mes > mes && dia > ahora_dia){
    meses = ahora_mes - mes - 1;
  }else if (ahora_mes > mes){
      meses = ahora_mes - mes
    }
    if (ahora_mes < mes && dia < ahora_dia){
      meses = 12 - (mes - ahora_mes);
    }else if (ahora_mes < mes){
        meses = 12 - (mes - ahora_mes + 1);
      }
    if (ahora_mes == mes && dia > ahora_dia){
            meses = 11;
    }

  // calculamos los dias
  var dias = 0;
  if (ahora_dia > dia){
      dias = ahora_dia - dia;
  }
  if (ahora_dia < dia) {
    ultimoDiaMes = new Date(ahora_ano, ahora_mes - 1, 0);
    dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
  }
  if (edad==1900) {
    edad = 0;
  }
  //document.getElementById('mostrar').value=edad+' '+meses+' '+dias;
  document.getElementById('edad').value=edad;
  // document.getElementById('meses').value=meses;
  // document.getElementById('dias').value=dias;
  //alert(edad +' años '+ meses +' meses y '+ dias +' días');
  }else{
    document.getElementById('fnaci').value="";
    document.getElementById('edad').value="";
    // document.getElementById('meses').value="";
    // document.getElementById('dias').value="";
    alert('Fecha Incorrecta');
  }
}
</script>
          <div class="parados">
            <div class="wrap-input100 validate-input m-b-23 m-r-15" data-validate = "Nombre es requerido">
              <span class="label-input100">Celular</span>
              <input class="input100" type="text" name="celular" id="celular" value="<?php echo $row['celular']; ?>" maxlength="10" onkeypress="return valida(event)" placeholder="Ej: 0912345678" required>
              <span class="focus-input100" data-symbol="&#xf2d7;"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-23 m-r-15" data-validate = "Nombre es requerido">
              <span class="label-input100">Teléfono</span>
              <input class="input100" type="text" name="telefono" value="<?php echo $row['telefono']; ?>" id="telefono" maxlength="10" required placeholder="Ej: 2502729">
              <span class="focus-input100" data-symbol="&#xf2bb;"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-23" data-validate = "Nombre es requerido">
              <span class="label-input100">Correo</span>
              <input class="input100" type="text" name="correo" id="correo" value="<?php echo $row['correo']; ?>" placeholder="Ej: Av. 25 calle 8" onchange="validarcorreo()" required>
              <span class="focus-input100" data-symbol="&#xf15a;"></span>
            </div>
          </div>

          <div class="parados m-b-20">
            <div class="wrap-input100 validate-input m-b-23 m-r-15" data-validate = "Nombre es requerido">
              <span class="label-input100">Dirección</span>
              <input class="input100" type="text" name="direccion" id="direccion" value="<?php echo $row['direccion']; ?>" required placeholder="Ej: Av. 25 calle 8">
              <span class="focus-input100" data-symbol="&#xf133;"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-23" data-validate = "Nombre es requerido">
              <span class="label-input100">Observaciones</span>
              <input class="input100" type="text" name="observacion" id="observacion" placeholder="Observacion acerca del paciente" value="<?php echo $row['observacion']; ?>" required>
              <span class="focus-input100" data-symbol="&#xf158;"></span>
            </div>
          </div>
          
          <br><br>

          <div class="container-login100-form-btn">
            <div class="wrap-login40-form-btn-aceptar">
              <div class="login100-form-bgbtn-aceptar"></div>
              <input class="login100-form-btn-aceptar" type="button" value="Guardar" onclick="pregunta()">
              <!-- <button class="login100-form-btn-aceptar">
                Guardar 2
              </button> -->
            </div>
            <div class="wrap-login40-form-btn-cancelar">
              <div class="login100-form-bgbtn-cancelar"></div>
              <a href="busqueda_paciente.php" class="txt2">
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
<script>
    $(document).on('keyup','#nombres', function(){
        var valr= $('#nombres').val();
        if(valr!=""){
           // var texto = MaysPrimera(valr.tolowerCase());
           var texto = toTitleCase(valr); // solo la primera palabra esta en mayuscula
           // var texto = toTitleCase(valr); // todas las palabras empiezan con mayuscula
            document.getElementById('nombres').value=texto;
        }
    });
    $(document).on('keyup','#apellidos', function(){
        var valr= $('#apellidos').val();
        if(valr!=""){
           // var texto = MaysPrimera(valr.tolowerCase());
           var texto = toTitleCase(valr); // solo la primera palabra esta en mayuscula
           // var texto = toTitleCase(valr); // todas las palabras empiezan con mayuscula
            document.getElementById('apellidos').value=texto;
        }
    });
    $(document).on('keyup','#observacion', function(){
        var valr= $('#observacion').val();
        if(valr!=""){
           // var texto = MaysPrimera(valr.tolowerCase());
           var texto = MaysPrimera(valr); // solo la primera palabra esta en mayuscula
           // var texto = toTitleCase(valr); // todas las palabras empiezan con mayuscula
            document.getElementById('observacion').value=texto;
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
    function validarcorreo(){
        var correo = document.getElementById('correo');
        //alert(correo);

        var emailRegex = /^[-\w.%+]{1,64}@(?:[a-zA-z]{1,63}\.){1,125}[a-z]{2,63}$/i;
        if (emailRegex.test(correo.value)) {
          //alert("correo correcto");
        } else {
          alert("Correo no Válido");
          document.getElementById('correo').value="";
        }
    }
</script>

<script language="JavaScript">
function pregunta(){
  var msg = '';
  var verificar;

  var formularios = document.forms;

  for (var i=0; i<formularios.length;i++){
    for (var j=0; j<formularios[i].elements.length-2; j++){
      // msg = msg + '\n\nElemento '+j+ ' del formulario '+(i+1)+ ' tiene id: '+ formularios[i].elements[j].id;
      // msg = msg + ' y name: ' + formularios[i].elements[j].name;
      var contenido = formularios[i].elements[j].value;
      msg = msg + '\n\nElemento '+j+ ' del formulario '+(i+1)+ ' tiene id: '+ formularios[i].elements[j].id;
      msg = msg + ' y su contenido es: ' + contenido;
      
      if (j<10 || j>10) {
        if (contenido == '') {
          verificar = 1;
        }
      }
    }
  }

  if (verificar == 1) {
    verificar = '';
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
                  title: 'Guardar Cambios?',
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

  //alert (msg);
  // alert(cual);
 
}
</script> 
  <!--================ End footer Area =================-->
</body>

</html>

<?php } ?>

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
  title: 'Datos Editados Correctamente'
})
}
ejecutarEjemplo();
</script>
<?php $_SESSION['confirmar']=0; } }?>