<?php
require_once("conexion.php");

$id_e = $_POST['id_e']; //Valor de especialidad
$id_t = $_POST['id_t']; //Valor de turnos
$id_c = $_POST['id_c'];//Valor de cursos

if($id_e==0 && $id_t==0){  //Si no se selecciona nada muestra todos los cursos
	$sql_e="SELECT id_curso, anio, division FROM cursos ORDER BY anio, division ASC";
}

if($id_t==0 && $id_e!=0){ //Si selecciona una especialidad se acomoda por especialidad
	$sql_e="SELECT id_curso, anio, division FROM cursos WHERE id_especialidad='$id_e' ORDER BY anio, division ASC";
}

if($id_t!=0 && $id_e==0){ //Si selecciona un turno se acomoda por turnos
	$sql_e="SELECT id_curso, anio, division FROM cursos WHERE  id_turno='$id_t' ORDER BY anio, division ASC";
}

if($id_t!=0 && $id_e!=0){ // Si selecciona tanto especialidad como turno, se muestra ordenado por los dos
	$sql_e="SELECT id_curso, anio, division FROM cursos WHERE id_especialidad='$id_e' AND id_turno='$id_t' ORDER BY anio, division ASC";
}

$consulta_c=$conexion->query($sql_e);

$html='<option value="">Cursos</option>';
while($lineaC=$consulta_c->fetch_assoc()){

	if(isset($_POST['id_c']) && $lineaC['id_curso']==$_POST['id_c']){
		$html.= "<option value='".$lineaC['id_curso']." selected=selected>".$lineaC['anio']."° ".$lineaC['division']."° </option>";
		
		}else{
			$html.= "<option value='".$lineaC['id_curso']."'>".$lineaC['anio']."° ".$lineaC['division']."° </option>";

		}
}
echo $html;

$consulta_c->free();
$conexion->close();
 ?>