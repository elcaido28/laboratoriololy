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
          <h2>Agregar Reactivo</h2>
          <div class="page_link">
            <a href="inicio.php">Inicio</a>
            <a href="ingresar_reactivo.php">Agregar Reactivo</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Banner Area =================-->

  <!--================ Procedure Category Area =================-->
  <!--================ End Procedure Category Area =================--> 

  <!--================ Start Feedback Area =================-->
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
  $(document).on('keyup','#rol', function(){
    var valr= $('#rol').val();
    if(valr!=""){
      // var texto = MaysPrimera(valr.tolowerCase());
      var texto = MaysPrimera(valr); // solo la primera palabra esta en mayuscula
      // var texto = toTitleCase(valr); // todas las palabras empiezan con mayuscula
      document.getElementById('rol').value=texto;
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
  <!--================ End Feedback Area =================-->

  <!--================ Start Appointment Area =================-->
  <div class="container-login100" style="background: #B8E1F7;">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54 m-b-50">
        <form class="login100-form validate-form" method="post" action="app/guardarReactivo.php" name="formix" id="formix"onsubmit=" return fun_insertar()">   <!--abrir formulario cuando inicia sesion-->
          <span class="login100-form-title p-b-49">
            Nuevo Reactivo
          </span>

          <div class="wrap-input100 validate-input m-b-23" data-validate = "Nombre es requerido">
            <span class="label-input100">Nombre del Reactivo</span>
            <input class="input100" type="text" name="rol" id="rol" onkeypress="return soloLetras(event)" placeholder="Ej: Hematies" required>
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>
          <div class="wrap-input100 validate-input m-b-23" data-validate = "Nombre es requerido">
            <span class="label-input100">Precio del Reactivo</span>
            <input class="input100" type="text" name="precio" id="precio" maxlength="6" onkeypress="return valida(event)" placeholder="Ej: 22.50" required>
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>
          <br><br>
          <div class="container-login100-form-btn">
            <div class="wrap-login40-form-btn-aceptar">
              <div class="login100-form-bgbtn-aceptar"></div>
              <input class="login100-form-btn-aceptar" type="button" value="Guardar" onclick="pregunta()">
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
        <center>
          <div class="cont_tabla">
            <table class="tabla" >
              <thead>
                <tr>
                  <th>REACTIVO</th>
                  <th>PRECIO</th>
                  <th>EDITAR / BORRAR</th>
                </tr>
              </thead>
              <tr>
                <?php
                  $consulta=mysqli_query($con,"SELECT * from reactivo");
                  while($row=mysqli_fetch_array($consulta)){
                ?>
                <td><?php echo $row['nombre_reactivo'] ?> </td>
                <td><?php echo $row['precio_reactivo'] ?> </td>
                <td>
                  <div class="cont_tbn_tb">
                    <a href="editar_reactivo.php?idr=<?php echo $row['id_reactivo']; ?>">
                    <button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button>
                    </a>
                    <button type="button" class="eliminar m-l-5" title="Eliminar" id="<?php echo $row['id_reactivo'] ?>" name="button"><i class="far fa-trash-alt" id="<?php echo $row['id_reactivo'] ?>"> </i></button>
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
      text: "Desea eliminar el registro!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText: 'No, cancelar!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        document.location.href="app/eliminarReactivo.php?id="+id_emp;
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
        </center>
      </div>
    </div>
  <!--================ End Appointment Area =================-->

  <!--================ start footer Area =================-->
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
  <!--================ End footer Area =================-->

  <?php include('scripts.php'); ?>
  <script src="js/jquery.dataTables.min.js" charset="utf-8"></script>
  <script>
  $(document).ready( function () {
      $('.tabla').DataTable();
  } );
  </script>

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


<!-- ELIMINADO -->
<?php if (isset($_SESSION['eliminar'])) { 
  if ($_SESSION['eliminar']==1){ ?>
<script>
function ejecutarEjemplo2(){
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
  title: 'Registro Eliminado'
})
}
ejecutarEjemplo2();
</script>
<?php $_SESSION['eliminar']=0; } }?>

<!-- EDITADO -->
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
  title: 'Cambios Guardados'
})
}
ejecutarEjemplo();
</script>
<?php $_SESSION['confirmar']=0; } }?>