<script type="text/javascript">
var contLin = 0;
localStorage.setItem("conta_tb",contLin);
function agregar() {
  var tr, td, tabla2;
  contLin+=+1;
  tabla2 = document.getElementById('tabla2');
  tr = tabla2.insertRow(tabla2.rows.length);
  td = tr.insertCell(tr.cells.length);

  td.innerHTML = "<select id='producto" + contLin + "' name='producto" + contLin + "' value='' onpaste='return false' required>"+"<option>-SELECCIONE-</option>"+"<?php $consulta=mysqli_query($con,"SELECT * from inventario_mp"); while($row=mysqli_fetch_array($consulta)){ ?>"+"<option value='"+"<?php echo $row['id_inventario_mp']; ?>"+"'>"+"<?php echo $row['nombre']; ?>"+"</option>"+"<?php } ?>"+"</select>";

  td = tr.insertCell(tr.cells.length);
  td.innerHTML = "<input type='text' size='2' placeholder='0' id='cantidad" + contLin + "' name='cantidad" + contLin + "' value='' onKeyPress='return solonumeros(event)' onpaste='return false' maxlength='5' onChange='calculo(this.value);'>";
  td = tr.insertCell(tr.cells.length);
  td.innerHTML = "<select id='presentacion" + contLin + "' name='presentacion" + contLin + "' value='' onpaste='return false' onChange='calculo(this.value);' required>"+"<option>-SELECCIONE-</option>"+"<?php $consulta=mysqli_query($con,"SELECT * from unidad");
  while($row=mysqli_fetch_array($consulta)){ ?>"+"<option value='"+"<?php echo $row['id_unidad']; ?>"+"'>"+"<?php echo $row['descrip']; ?>"+"</option>"+"<?php } ?>"+"</select>";

  localStorage.setItem("conta_tb",contLin);
}
function borrarUltima() {
  ultima = document.all.tabla2.rows.length - 1;
  if(ultima > 1){
    document.all.tabla2.deleteRow(ultima);
    contLin--;
    localStorage.setItem("conta_tb",contLin);
  }
}
</script>
<script>
function calculo(){
    var cont_tabla=localStorage.getItem('conta_tb');

    if(cont_tabla=="0"){
    var producto=document.getElementById("producto").value;
    var cantidad=document.getElementById("cantidad").value;
    var presentacion=document.getElementById("presentacion").value;
}else if(cont_tabla>"0") {
    var id_producto='producto'+cont_tabla;
    var id_cantidad='cantidad'+cont_tabla;
    var id_presentacion='presentacion'+cont_tabla;
    var producto1=document.getElementById(id_producto).value;
    var cantidad1=document.getElementById(id_cantidad).value;
    var presentacion1=document.getElementById(id_presentacion).value;
}
var con=localStorage.getItem('conta_tb');
var url1='guardar_receta.php?cont='+con+'';
document.getElementById('form21').action=url1;
}

</script>