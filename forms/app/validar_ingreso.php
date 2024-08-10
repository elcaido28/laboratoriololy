<?php
  session_start();
  include('../config/config.php');

  $usuario=$_POST["username"];
  $clave=$_POST["pass"];
  // if(empty($usuario) || empty($clave) ){
  // 	header("Location: index.php");
  // 	exit();
  // }
  
  $consulta= mysqli_query($con,"SELECT * from usuario U INNER JOIN empleado E ON U.id_empleado=E.id_empleado where usuario ='$usuario' and clave ='$clave'");
  $num_row=mysqli_num_rows($consulta);
  if($num_row>0){
    
    $row= mysqli_fetch_assoc($consulta);
    $abc=$row['id_usuario'];
    $estado=$row['id_estado'];

    if ($estado==1) {

      $consulta2= mysqli_query($con,"SELECT * from usuario U inner join empleado E on U.id_empleado=E.id_empleado inner join perfil P on E.id_perfil=P.id_perfil inner join rol R on E.id_rol=R.id_rol inner join estado ES on E.id_estado=ES.id_estado where U.id_usuario='$abc'");
      $row2= mysqli_fetch_assoc($consulta2);

    
      $_SESSION['ID_usu']=$row2['id_usuario'];
      $nombres = $row2['nombres'];
      $apellidos = $row2['apellidos'];
      $parten = explode(" ",$nombres);
      $partea = explode(" ",$apellidos);
      $_SESSION['NU'] = $parten[0]." ".$partea[0];
      $_SESSION['ID_empleado']=$row2['id_empleado'];
      $_SESSION['ID_rol']=$row2['id_rol'];
      $_SESSION['NOM_rol']=$row2['nombre_rol'];
      $_SESSION['ID_estado']=$row2['id_estado'];
      $_SESSION['NOM_estado']=$row2['nombre_estado'];
      $_SESSION['ID_perfil']=$row2['id_perfil'];
      $_SESSION['NOM_perfil']=$row2['nombre_perfil'];
      $_SESSION['INGRESO']=1;

      //$_SESSION['FOTO']=$row4['foto'];
      //$_SESSION['TD']=$row4['todoR'];
      //$_SESSION['S']=$row4['recurso_secre'];
      //$_SESSION['PD']=$row4['recurso_profe_dele'];
      //$_SESSION['SC']=$row4['recurso_secre_conse'];

      header("Location:../inicio.php");
    }else{
      header("location:../login.php");
      $_SESSION['MSJ_inactivo']=1;
    }

  }else{
    header("location:../login.php");
    // $_SESSION['MSJ_loginfail']="<script> alert('Usuario o Contraseña Equivocado'); </script>";
    $_SESSION['MSJ_loginfail']=1;
  }


 ?>