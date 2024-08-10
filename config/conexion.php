<?php
class bd
{
	private $conexion;

	public function bd (){                //bd llama a la clase que se genera dentro de la construccion
		$this->conexion=@mysqli_connect("localhost","","","loly");         //this es una funcion constructora
	}

//enviar la consulta
public function consulta ($sql){
	return mysqli_query($this->conexion, $sql);
}

//devuelva el numero de filas

public function num_filas ($resultado){
	return mysqli_num_rows($resultado);
}

//devuelva el resul_array

public function arreglo ($resultado) {
	return mysqli_fetch_array($resultado);
}

public function login($usuario, $clave){
	$sql="select * from usuario where usuario='".$usuario."'and clave='".$clave."";
	// $sql="select * from usuario where usuario='".$usuario."'and clave='".$clave."'and us_estado=1";
	$resultado= $this->consulta($sql);  //llamo a la variable consulta y me esta ingresando en el sql (que tiene la funcion consulta)
	$arrUS=array();   //estoy creando una variable arreglo US usuario

	$nfilas=$this->num_filas($resultado);   //cuantas filas tiene el result_sent

	if($nfilas>0) {
	while($lista= $this->arreglo($resultado)){  //recorrer el arreglo completo del result_sent
		array_push($arrUS,$lista);
	}

		return $arrUS;  //envio mi arreglo completo

	}

	else {
		return false;
	}


}

public function select_g($usuario, $clave){
	$resultado= $this->consulta($sql);  //llamo a la variable consulta y me esta ingresando en el sql (que tiene la funcion consulta)
	$arrUS=array();   //estoy creando una variable arreglo US usuario

	$nfilas=$this->num_filas($resultado);   //cuantas filas tiene el result_sent

	if($nfilas>0) {
		while($lista= $this->arreglo($resultado)){  //recorrer el arreglo completo del result_sent
			array_push($arrUS,$lista);
		}

		return $arrUS;  //envio mi arreglo completo

	}

	else {
		return false;
	}


}

}
?>
