<?php include("cabecera.php"); ?>
<!--================Header Menu Area =================-->
<?php include("menu2.php"); ?>
<?php  if ($perfil == 1){ ?>
<!--================Header Menu Area =================-->
  <!--================ Banner Area =================-->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content text-left">
          <h2>Agregar Empleado</h2>
          <div class="page_link">
            <a href="inicio.php">Inicio</a>
            <a href="ingresar_empleado.php">Ingresar Empleado</a>
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
    $(document).on('keyup','#direccion', function(){
        var valr= $('#direccion').val();
        if(valr!=""){
           // var texto = MaysPrimera(valr.tolowerCase());
           var texto = MaysPrimera(valr); // solo la primera palabra esta en mayuscula
           // var texto = toTitleCase(valr); // todas las palabras empiezan con mayuscula
            document.getElementById('direccion').value=texto;
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
        title: 'Correo no válido'
      })
          document.getElementById('correo').value="";
        }
    }
</script>
  <!--================ End Script Area =================-->

  <!--================ Start Appointment Area =================-->
  <div class="container-login100" style="background: #B8E1F7;">
      <div class="wrap-login1000 p-l-55 p-r-55 p-t-65 p-b-54 m-b-50">
        <!-- <form class="login100-form validate-form" method="post" action="" name="formix" id="formix"onsubmit=" return fun_insertar()"> -->
        <form class="login100-form validate-form" method="post" action="app/guardarEmpleado.php" name="formix" id="formix"> 
          <!--abrir formulario cuando inicia sesion-->
          <span class="login100-form-title p-b-49">
            Datos
          </span>

          <div class="parados">
            <div class="wrap-input100 validate-input m-b-23 m-r-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Nombres</span>
              <input class="input100" type="text" name="nombres" id="nombres" required onkeypress="return soloLetras(event)" placeholder="Ej: Carlos Andres">
              <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-23 m-l-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Apellidos</span>
              <input class="input100" type="text" name="apellidos" id="apellidos" required onkeypress="return soloLetras(event)" placeholder="Ej: Vera Perez">
              <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>
<script>
$(buscar_cedula());

function buscar_cedula(consulta){
  $.ajax({
    url: 'ajax_cedula_empleado.php',
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
        title: 'Ya existe un empleado con la misma cédula'
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
            <div class="wrap-input100 validate-input m-b-23 m-l-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Cédula</span>
              <input class="input100" type="text" name="cedula" id="cedula" placeholder="Ej: 0912345678" maxlength="10" onkeypress="return valida(event)" onchange="validarCedula()" required>
              <span class="focus-input100" data-symbol="&#xf2c3;"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-23 m-l-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Celular</span>
              <input class="input100" type="text" name="celular" id="celular" placeholder="Ej: 0912345678" maxlength="10" onkeypress="return valida(event)" required>
              <span class="focus-input100" data-symbol="&#xf2d7;"></span>
            </div>
          </div>

          <div class="parados">
            <div class="wrap-input100 validate-input m-b-23 m-r-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Teléfono</span>
              <input class="input100" type="text" name="telefono" id="telefono" placeholder="Ej: 2502729" maxlength="10" onkeypress="return valida(event)" required>
              <span class="focus-input100" data-symbol="&#xf2bb;"></span>
            </div>
<script>
$(buscar_correo());

function buscar_correo(consulta){
  $.ajax({
    url: 'ajax_correo_empleado.php',
    type: 'POST',
    dataType: 'html',
    data: {consulta: consulta},
  })
  .done(function(respuesta){
    if(respuesta==''){
      
    }else{
    if(respuesta>0){
      $("#correo").css({
        "background-color": "rgba(255,87,87,0.5)"
      });
      document.getElementById('correo').value='';
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
        title: 'Este correo ya esta registrado'
      })
    }else{
      $("#correo").css({
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
$(document).on('blur','#correo', function(){

  var valr= $(this).val();
  if(valr!=""){
    buscar_correo(valr);
  }
});
</script>
            <div class="wrap-input100 validate-input m-b-23 m-l-10" data-validate = "Nombre es requerido">
              <span class="label-input100">Correo</span>
              <input class="input100" type="text" name="correo" id="correo" placeholder="Ej: correo@correo.com" onchange="validarcorreo()" required>
              <span class="focus-input100" data-symbol="&#xf1ec;"></span>
            </div>
            <div class="wrap-input100 m-b-23 m-l-10">
              <span class="label-input100">Cargo</span>
                  <select class="input100"  name="rol" id="rol" required>
                    <option value="">-</option>
                  <?php
                              $consulta=mysqli_query($con,"SELECT * from rol");
                              while($row=mysqli_fetch_array($consulta)){
                          ?>
                              <option value="<?php echo $row['id_rol']; ?>"><?php echo $row['nombre_rol']; ?></option>
                          <?php } ?>
                        </select>
            </div>
            <div class="wrap-input100 m-b-23 m-l-10">
              <span class="label-input100">Permiso</span>
                  <select class="input100"  name="perfil" id="perfil" required>
                    <option value="">-</option>
                  <?php
                              $consulta=mysqli_query($con,"SELECT * from perfil");
                              while($row=mysqli_fetch_array($consulta)){
                          ?>
                              <option value="<?php echo $row['id_perfil']; ?>"><?php echo $row['nombre_perfil']; ?></option>
                          <?php } ?>                          
                              </select>
            </div>
          </div>

          <div class="wrap-input100 validate-input m-b-25 m-r-10" data-validate = "Nombre es requerido">
            <span class="label-input100">Dirección</span>
            <input class="input100" type="text" name="direccion" id="direccion" required placeholder="Ej: Av. 25 calle 8">
            <span class="focus-input100" data-symbol="&#xf133;"></span>
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
              <a href="inicio.php" class="txt2">
              <button type="button" name="botones" id="botones" class="login100-form-btn-cancelar">
                Regresar
              </button>
              </a>
            </div>

          </div>      
        </form>
      </div>
      <div class="table-responsive">
              <div class="cont_tabla">
                <table class="tabla" >
                    <thead>
                      <tr>
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>CARGO</th>
                        <th>ASIG. USUARIO</th>
                        <th>EDITAR / BORRAR</th>
                      </tr>
                    </thead>
                    <tr>
                    <?php
                      $consulta=mysqli_query($con,"SELECT * from empleado E inner join rol R on E.id_rol=R.id_rol WHERE id_estado='1'");
                      while($row=mysqli_fetch_array($consulta)){
                    ?>
                      <td><?php echo $row['nombres']." ".$row['apellidos']; ?> </td>
                      <td><?php echo $row['correo']; ?> </td>
                      <td><?php echo $row['nombre_rol']; ?> </td>
                      <td> <a href="asignar_usuario.php?ide=<?php echo $row['id_empleado'] ?>"><button type="button" title="Asignar Usuario" class="modificar" name="button"><i class="far fa-share-square"></i></button></a> </td>
                      <td>
                          <div class="cont_tbn_tb">
                            <a href="editar_empleado.php?ide=<?php echo $row['id_empleado']; ?>">
                              <button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button>
                            </a>
                            <button type="button" class="eliminar m-l-5" title="Eliminar" id="<?php echo $row['id_empleado'] ?>" name="button" id="elim"><i class="far fa-trash-alt" id="<?php echo $row['id_empleado'] ?>"> </i>
                            </button>
                          </div>
                      </td>
                    </tr>
   <script type="text/javascript">
          $('.eliminar').click(function(e){


            var id_emp= e.target.id;
            
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: 'Esta Seguro?',
                  text: "No podrás revertir esto!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Si, eliminar!',
                  cancelButtonText: 'No, cancelar!',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                      document.location.href="app/eliminarEmpleado.php?id="+id_emp;
                  } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                  ) {

                  }
                })
      })
        </script>       
                    
            
                    <?php } ?>
                </table>
              </div>
          </div>
    </div>
    
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
      
      if (contenido == '') {
        verificar = 1;
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

  //alert (msg);
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

<!-- EDITAR -->
<?php if (isset($_SESSION['confirmar'])) { 
  if ($_SESSION['confirmar']==2){ ?>
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

<!-- ELIMINAR -->
<?php if (isset($_SESSION['eliminar'])) { 
  if ($_SESSION['eliminar']==1){ ?>
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
  title: 'Empleado Eliminado'
})
}
ejecutarEjemplo();
</script>
<?php $_SESSION['eliminar']=0; } }?>