<?php 
if(isset($_SESSION['perfil']) AND isset($_SESSION['estado'])){   
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Solo Menu</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>

<body class="skin-blue">
    <header class="header">
        <a href="#" class="logo">
            <img src="img/logo_fundacion.jpg" width="200" height="40">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Notifications: style can be found in dropdown.less -->
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span><i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header bg-light-blue">
                                        <img src="../img/user2.png" class="img-circle" alt="User Image" />
                                        <p></p></br>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="salir.php" id="closed" class="btn btn-default btn-flat" data-id="info" data-ajax="false">Salir</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </li>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <?php
                        if (isset($_SESSION['tnom'])) {
                            $eplnom=$_SESSION['tnom'];
                        }
                    ?>
                    <!-- <div class="pull-left image">
                        <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                    </div> -->
                    <div class="pull-left info">
                        <p>Hola, <?php echo $eplnom; ?></p>
                        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a> -->
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="treeview">
                    <li class="active">
                        <a href="inicio.php" data-ajax="false">
                            <i class="fa fa-th"></i> <span>Principal</span>
                        </a>
                    </li>
                    <li class="treeview">
                    <li class="treeview">
                        <a href="#" data-ajax="false">
                            <span>Digitalización</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="" data-ajax="false"><i class="fa fa-angle-double-right"></i>Facturas</a></li>
                            <li><a href="" data-ajax="false"><i class="fa fa-angle-double-right"></i>Ventas</a></li>
                            <li><a href="" data-ajax="false"><i class="fa fa-angle-double-right"></i>Proyectos</a></li>
                            <li><a href="" data-ajax="false"><i class="fa fa-angle-double-right"></i>Convenios</a></li>
                            <li><a href="" data-ajax="false"><i class="fa fa-angle-double-right"></i>Capacitaciones</a></li>
                            <li><a href="" data-ajax="false"><i class="fa fa-angle-double-right"></i>Cursos</a></li>
                            <li><a href="" data-ajax="false"><i class="fa fa-angle-double-right"></i>Certificados</a></li>
                            <li><a href="" data-ajax="false"><i class="fa fa-angle-double-right"></i>Solicitudes</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <span>Generar Documentos </span><i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="facturas.php" data-ajax="false"><i class="fa fa-angle-double-right"></i> Facturas</a></li>
                            <li><a href="nueva_factura.php" data-ajax="false"><i class="fa fa-angle-double-right"></i> Agregar Factura</a></li>
                            <li><a href="editar_factura.php" data-ajax="false"><i class="fa fa-angle-double-right"></i> Editar Factura</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <span>Empleados</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="registro_empleados.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Registrar Empleado</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <span>Clientes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="registro_clientes.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Registrar Cliente</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <span>Proveedores</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="registro_proveedores.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Registrar Proveedores</a></li>
                        </ul>
                    </li>
                    
                    <ul class="treeview-menu">
                        <li><a href="empleadoslista.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Lista de Empleados </a></li>
						<li><a href="registro.php" data-ajax="false"><i class="fa fa-angle-double-right"></i> Nuevo Empleado</a></li>
                        <li><a href="empleadoslista.php" data-ajax="false"><i class="fa fa-angle-double-right"></i> Editar o Eliminar</a></li>
                        <li><a href="../grafica/ejemplo3.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>REPORTE </a></li>
                        <li><a href="../paginas/ReportesGraficos/indexgrafico.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>REPORTE 1</a></li>
                        <li><a href="tutorial1.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>prueba cerrado </a></li>
                    </ul>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-angle-left pull-right"></i> <span>Administración</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="restaurar_inactivos.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Restaurar Inactivos</a></li>
                            <li><a href="agregar_cargos.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Agregar Cargos</a></li>
                            <li><a href="respaldo.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Respaldar Base De Datos</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-angle-left pull-right"></i> <span>Reportes</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="administrador.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Reportes N </a></li>
                            <li><a href="administradores.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Lista De Usuarios </a></li>
                            <li><a href="respaldo.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Respaldar Base De Datos</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-angle-left pull-right"></i> <span>Respaldos</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="backupPHP/index.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Respaldar B.D. </a></li>
                            <li><a href="#" data-ajax="false"><i class="fa fa-angle-double-right"></i>Respaldar Documentos </a></li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>
    <!-- </div> quitar para que se acomode al contenido -->
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
    <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="js/AdminLTE/app.js" type="text/javascript"></script><!-- hace funcionar el menu -->
</body>
</html>
<?php }else{
    header('Location:login.php');
} ?>