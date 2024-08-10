<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>nuevo</title>
	<link rel="stylesheet" href="css/jquery-ui.css">
	
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
</head>
<body>
<?php include("config/config.php"); ?>
<?php
  $result = mysqli_query($con,"SELECT * FROM paciente");
  $array = array();
  if($result){
    while ($row = mysqli_fetch_array($result)) {
      $equipo = utf8_encode($row['nombres']." ".$row['apellidos']);
      array_push($array, $equipo); // equipos
    }
  }
?>

<input type="text" class="" placeholder="Buscar Paciente" title="Digite el nombre del paciente" id="busqueda" name="paciente">


<script type="text/javascript">
  $(document).ready(function () {
    var items = <?= json_encode($array); ?>;

    $("#busqueda").autocomplete({
      source: items,
      select: function (event, item) {
        var params = {
          equipo: item.item.value
        };
        $.get("getEquipo.php", params, function (response) {
          var json = JSON.parse(response);
          if (json.status == 200){
          }else{

          }
        }); // ajax
      }
    });
  });
</script>
	
</body>
</html>