<?php 
	session_start();
	if (isset($_SESSION['ID_usu'])){    //si el usuario no inicia sesion no puede acceder a otra pagina// 	
		$nombre= $_SESSION['NU'];
		$perfil = $_SESSION['ID_perfil'];
	}else{
	header("Location:../index.php");
}
?>
	<?php include("cabecera.php"); ?>
	<!--================Header Menu Area =================-->
	<?php include("menu.php"); ?>	
	<!--================Header Menu Area =================-->

	<!--================ Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-left">
					<h2>Agregar Empleado</h2>
					<div class="page_link">
						<a href="inicio.php">Inicio</a>
						<a href="buscar_empleado.php">Buscar Empleado</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Banner Area =================-->

	<!--================ Script Area =================-->
	<!--================ End Script Area =================-->

	<!--================ Start Appointment Area =================-->
	<div class="container-login100" style="background: #B8E1F7;">
		<div class="table-responsive">
        	<div class="cont_tabla">
            	<table class="tabla" >
              		<thead>
                		<tr>
	                		<th>NOMBRE</th>
	                		<th>CORREO</th>
	                		<th>ROL</th>
	                		<th>ASIG. USUARIO</th>
	                		<th>EDITAR / BORRAR</th>
                		</tr>
              		</thead>
              		<tr>
              		<?php
                		$consulta=mysqli_query($con,"SELECT * from empleado E inner join rol R on E.id_rol=R.id_rol WHERE id_estado=1");
                		while($row=mysqli_fetch_array($consulta)){
              		?>
              			<td><?php echo $row['nombres']." ".$row['apellidos']; ?> </td>
              			<td><?php echo $row['correo']; ?> </td>
              			<td><?php echo $row['nombre_rol']; ?> </td>
              			<td> <a href="asignar_usuario.php?id=<?php echo $row['id_empleados'] ?>"><button type="button" title="Asignar Usuario" class="modificar" name="button"><i class="far fa-share-square"></i></button></a> </td>
                		<td>
                  			<div class="cont_tbn_tb">
                    			<a href="editar_empleado.php?ide=<?php echo $row['id_empleado']; ?>">
                      				<button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button>
                    			</a>
                    			<button type="button" class="eliminar" title="Eliminar" name="button" id="elim"><i class="far fa-trash-alt"> </i></button>
                  			</div>
<script type="text/javascript">
	$('#elim').click(function(e){
		if (confirm("¿Está segur@ de ELIMINAR?")){
			document.location.href="app/eliminarPerfil.php?id=<?php echo $row['id_perfil']; ?>";
		}else{
			document.location.href="ingresar_perfil.php";
		}
	});
</script>
                		</td>
              		</tr>
              		<?php } ?>
            	</table>
          	</div>
        </div>
	</div>
	<!--================ End Appointment Area =================-->

	<!--================ start footer Area =================-->
	<?php include('scripts.php'); ?>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.dataTables.min.js" charset="utf-8"></script>
	<script>
	$(document).ready( function () {
			$('.tabla').DataTable();
	} );
	</script>
	<!--================ End footer Area =================-->
?>