<?php
$perfil = $_SESSION['ID_perfil'];
?>
<link rel="stylesheet" href="estilos.css">
<style>
  .menu{
    height: 92px;
  }
  .nav{
    padding-top: 15px;
  }
  .mlogo{
    margin-top:; -5px;
  }
</style>
    <nav class="menu">
      <!-- <div class="top_menu row m0" style="width: 100%; border-bottom: 1px solid #B8B8B8; background: red;">
      
      </div> -->

    <div class="mlogo">
      <a href="inicio.php"><img src="../img/labo.png"  width="75" height="80" alt="" style="margin-right: 20px;"></a> <h4> Usuario: <?php echo $nombre; ?> </h4>
    </div>

    <a href="#" class="btn_Menu" id="btn_Menu" ><i class="fas fa-align-justify fa-w-12 fa-3x "></i></a>

    <ul class="nav" id="nav">
      <!-- <li > <a href="inicio.php">INICIO</a> </li> -->

<?php  if ($perfil == 1){ ?>
                  <li class="" >
                    <a href="#" >ADMINISTRACIÓN</a>
                    <ul >
                      <li >
                        <a  href="#">CONFIGURACION <i class="fas fa-caret-right" style="margin-left: 3px;"></i></a>
                        <ul>
                          <li>
                            <a href="ingresar_empleado.php">EMPLEADOS</a>
                          </li>
                          <li>
                            <a href="ingresar_cargo.php">CARGOS</a> <!-- en base son rol -->
                          </li>
                          <li>
                            <a href="ingresar_permiso.php">PERMISOS</a> <!-- en base son perfil -->
                          </li>
                          <li>
                            <a href="ingresar_reactivo.php">REACTIVOS</a> <!-- en base son perfil -->
                          </li>
                        </ul>
                      </li>
                      <li >
                        <a  href="#">SEGURIDAD <i class="fas fa-caret-right" style="margin-left: 3px;"></i></a>
                        <ul>
                          <li>
                            <a href="#">RESTAURAR <i class="fas fa-caret-right" style="margin-left: 3px;"></i></a>
                            <ul>
                              <li>
                                <a href="restaurar_paciente.php">PACIENTES</a>
                              </li>
                              <li>
                                <a href="restaurar_empleado.php">EMPLEADOS</a>
                              </li>
                            </ul>
                          </li>
                          <li>
                            <a href="ingresar_rol.php">RESPALDAR <i class="fas fa-caret-right" style="margin-left: 3px;"></i></a>
                            <ul>
                              <li>
                                <a href="backupPHP/descargar.php">B.D.</a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
<?php } ?>
<?php  if ($perfil == 1 || $perfil >=2){ ?>

                  <li >
                    <a href="#" >REPORTES</a>
                    <ul>
                      <li >
                        <a  href="vista_reporte_empleados.php">Empleados</a>
                      </li>
                      <li >
                        <a  href="vista_reporte_pacientes.php">Pacientes</a>
                      </li>
                      <li >
                        <a  href="vista_reporte_vpagados_cliente.php">Pagos por Paciente </a>
                      </li>
                      <li >
                        <a  href="vista_reporte_examenes.php">Examenes</a>
                        <!-- <a  href="reportepaciente.php">USUARIOS</a> -->
                      </li>
                      <li >
                        <a  href="vista_reporte_Exa_X_pacientes.php">Examenes por Pacientes </a>
                      </li>
                      <li >
                        <a  href="vista_reporte_exa_ganacias.php">Ganancias</a>
                      </li>
                      <li>
                        <a href="#">GRAFICAS <i class="fas fa-caret-right" style="margin-left: 3px;"></i></a>
                        <ul>
                          <li>
                            <a href="vista_graficas_formt_exa.php">Grafica Examenes</a>
                          </li>
                          <!-- <li>
                            <a href="graficas.php">Grafica Examenes2</a>
                          </li> -->
                        </ul>
                      </li>
                    </ul>
                  </li>

                  <li>
                    <a href="cotizacion.php" >COTIZACIÓN</a>
                    <!-- <ul >
                      <li >
                        <a  href="ingresar_paciente.php">REGISTRO</a>
                      </li>
                      <li >
                         <a  href="busqueda_paciente.php">BUSCAR</a>
                      </li>
                    </ul> -->
                  </li>

                  <li>
                    <a href="#" >PACIENTE</a>
                    <ul >
                      <li >
                        <a  href="ingresar_paciente.php">REGISTRO</a>
                      </li>
                      <li >
                         <a  href="busqueda_paciente.php">BUSCAR</a>
                      </li>
                    </ul>
                  </li>

                  <li class="nav-item submenu dropdown">
                    <a href="#" >EXAMEN</a>
                    <ul >
                      <li >
                        <a href="ingreso_examen.php">NUEVO</a>
                        <!-- <a href="rexamenes.php">NUEVO</a> -->
                      </li>
                      <li >
                        <a  href="buscar_examen.php">BUSCAR</a>
                        <!-- <a  href="buscexam.php">BUSCAR</a> -->
                      </li>
                      <!-- <li >
                        <a  href="buscar_examen_resultado.php">REGISTRAR</a>
                        <a  href="regexam.php">REGISTRAR</a>
                      </li> -->
                    </ul>
                  </li>
<?php  } ?>
<?php  if ($perfil == 1 || $perfil == 2){ ?>

                  <li class="nav-item submenu dropdown">
                    <a href="#" >RESULTADOS</a>
                    <ul >
                      <li >
                        <!--<a href="buscar_examenes.php">NUEVO</a>-->
                         <a href="https://www.laboratoriololy.com/forms/buscar_examenes.php">NUEVO</a> 
                      </li>
                      <li >
                        <a  href="buscar_resultados.php">BUSCAR</a>
                        <!-- <a  href="buscexam.php">BUSCAR</a> -->
                      </li>
                      <!-- <li >
                        <a  href="buscar_examen_resultado.php">REGISTRAR</a>
                        <a  href="regexam.php">REGISTRAR</a>
                      </li> -->
                    </ul>
                  </li>
<?php  } ?>
<!--                   <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contacto</a>
                  </li> -->

                  <li >
                    <a  href="app/cerrarsesion.php">CERRAR SESIÓN</a>
                  </li>

    </ul>
</nav>
<script src="menu.js" charset="utf-8"></script>
<script type="text/javascript">
$('.btn_Menu').click(function(e){
  var element = document.getElementById("nav");
  element.classList.toggle("add_menu");
})

</script>
