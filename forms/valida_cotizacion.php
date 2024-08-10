<?php
if (isset($_POST['value'])) {
  //captura todos los datos y los separa por una coma
 $colors= array();
    //  $colors=implode(',',$_POST['value']);
     $colors=$_POST['value'];
  echo json_encode($colors);
}

?>