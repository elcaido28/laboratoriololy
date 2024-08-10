<?php 
session_start();
//error_reporting(0);
include('conexion.php');
$varsesion = $_SESSION['ide'];
if ($varsesion == null || $varsesion = '') {
    echo 'Usted no tiene autorización';
    header("Location:login.php");
    //die();
}

if(isset($_SESSION['ide'])){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registros</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link href="css/estilos.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    
    <body class="skin-blue">
        <?php include('solomenu.php'); ?>
         <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        RESTAURAR BASE DE DATOS COMPLETA
                    </h1>
                </section>
                <section class="content">
                    <div class="grande">
                    <div class="contenedor-optitle">
                        <div class="op-left">
                            <label class="titulo-form"><span class="mif-search mif-1x fg-pink"> </span> Base de Datos</label>
                        </div>
                        <div class="op-right">
                            <!-- <span class="mif-pencil mif-2x fg-pink"></span>
                            <input type="button" value="Nuevo Empleado"> -->
                            <button class="boton1234"><i class="fas fa-file-medical esp-right"></i> Nuevo Cliente</button>
                        </div>
                    </div>
                    <div id="formu" class="contenedor-formularios">
                        <center>
    <h3>Realizar Backup</h3>
    <a href="descargar.php"><img src="download.jpg" height="100px" width="100px"></a>
</center>
                        <div class="contenido_tab_mod" id="contenido_tab">
                                <form action="modificar_cliente.php" method="post">
                                    <div class="fila-fecha">
                                        <div class="contenedor-fecha">
                                            <input type="text" class="input-fecha" id="cajas" name="feching" value="<?php echo $row['cl_feching'];?>" onkeypress="return enable(event)" required>
                                        </div>
                                    </div><br>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Nombres <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" value="<?php echo $row['cl_nombres'];?>" id="cajas" name="nombres" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Apellidos <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" value="<?php echo $row['cl_apellidos'];?>" id="cajas" name="apellidos" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Cédula <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" value="<?php echo $row['cl_cedula'];?>" id="cajas" name="cedula" maxlength="10" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Fecha de Nacimiento <span class="req">*</span>
                                            </label>
                                            <input type="date" id="cajas" class="input-style" value="<?php echo $row['cl_fecha_nacimiento'];?>" name="fechnac" required >
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Edad <span class="req">*</span>
                                            </label>
                                            <input type="text" id="cajas" name="edad" value="<?php echo $row['cl_edad'];?>" class="input-style" maxlength="2" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Teléfono <span class="req">*</span>
                                            </label>
                                            <input type="text" id="cajas" name="telefono" value="<?php echo $row['cl_telefono'];?>" class="input-style" maxlength="10" required >
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Correo <span class="req">*</span>
                                            </label>
                                            <input type="email" class="input-style" value="<?php echo $row['cl_correo'];?>" id="cajas" name="correo" required>
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Dirección <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" value="<?php echo $row['cl_direccion'];?>" id="cajas" name="direccion" required>
                                        </div>
                                    </div><br>
                                    <div class="contenedor_botones">
                                        <input type="submit" class="botones" value="Modificar">
                                        <a href="registro_clientes.php" class="botones">Regresar</a>
                                    </div>
                                </form>
                        </div>
                    </div>
                    </div>
            </div>
        </div>

    <!-- MENSAJE DE EDITADO -->
    <?php
        if (isset($_SESSION['editado'])) {
            if ($_SESSION['editado']==1) {
    ?>
        <script>
        alert('Datos Editados Correctamente');
    </script>
    <?php
        unset($_SESSION['editado']); }
        }
    ?>
    <!-- MENSAJE DE NO EDITADO -->
    <?php
        if (isset($_SESSION['noeditado'])) {
            if ($_SESSION['noeditado']==1) {
    ?>
        <script>
        alert('ERROR!! Los Datos NO se editaron');
    </script>
    <?php
        unset($_SESSION['noeditado']); }
        }
    ?>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/label_arriba_abajo.js"></script>
    <script src="js/validaciones.js"></script>
</body>
</html>
<?php }else{
    //echo "<script> window.location='login.php'; </script>" ;
    header("Location:login.php");
    //https://metroui.org.ua/icons.html==> link para lis iconos
    }
?>