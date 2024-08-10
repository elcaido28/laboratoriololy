<?php

//session_destroy();

session_start();

//session_destroy();

$_SESSION['INGRESO']=1;

header("Location: ../login.php");

?>
