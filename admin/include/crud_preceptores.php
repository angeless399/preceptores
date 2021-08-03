<h1 class="titulo_admin"> ABM preceptores</h1>

<?php
include ('../php/conexion.php');
/* COMIENZO AGREGAR NUEVO REGISTRO */ ?>

 <form action="#" method="post" class="login" id="login">
 	<h2 class="tit-form">Nuevo Preceptor</h2>
 	<input type="text" name="nombre" placeholder="Ing. nombre del preceptor">
	 <input type="text" name="apellido" placeholder="Ing. apellido del preceptor">
 	<input type="email" name="institucional" placeholder="Ing. correo institucional">
	 <input type="email" name="alternativo" placeholder="Ing. correo personal">
 	<input type="submit" name="insertar" value="AGREGAR PRECEPTOR" class="btn_submit">
 </form>
<?php 
if(isset($_POST['insertar'])){
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$c_institucional=$_POST['institucional'];
	$c_alternativo=$_POST['alternativo'];
	$sql="INSERT INTO preceptores (nombre_precep, apellido_precep, correo_inst_precep, correo_alt_precep) VALUE ('$nombre', '$apellido', '$c_institucional', '$c_alternativo')";
	$insertar=mysqli_query($conexion, $sql)? print("<script>alert('Nuevo Preceptor Registrado'); window.location ='administracion.php'</script>") : print("<script>alert('error'); window.location ='administracion.php'</script>"); 
}
/* FIN AGREGAR NUEVO REGISTRO */
?>

<?php
/* COMIENZO ACTUALIZAR REGISTRO */
if(isset($_GET['id_editar'])){
	echo '<script>esconderInsertar()</script>';
	$id=$_GET['id_editar'];
	$sql="SELECT * FROM preceptores WHERE id_precep='$id'";
	$ejecutar=mysqli_query($conexion,$sql);
	$registro=mysqli_fetch_assoc($ejecutar);
	echo '
 	<form action="#" method="post" class="login">
	<h2 class="tit-form">Actualizar registro </h2>
 	<input type="text" name="nombre" value="'.$registro['nombre_precep'].'">
 	<input type="text" name="apellido" value="'.$registro['apellido_precep'].'">
 	<input type="email" name="institucional" value="'.$registro['correo_inst_precep'].'">
	<input type="email" name="alternativo" value="'.$registro['correo_alt_precep'].'">
 	<input type="submit" name="actualizar" value="ACTUALIZAR" class="btn_submit" id="btn_submit">
	<a href="administracion.php" class="volver"><b>CANCELAR</b></a>
 	</form>
	';
}
if(isset($_POST['actualizar'])){
	$actualizar_nbr=$_POST['nombre'];
	$actualizar_apel=$_POST['apellido'];
	$actualizar_c_inst=$_POST['institucional'];
	$actualizar_c_alt=$_POST['alternativo'];
	$sql="UPDATE preceptores SET nombre_precep='$actualizar_nbr', apellido_precep='$actualizar_apel', correo_inst_precep='$actualizar_c_inst', correo_alt_precep='$actualizar_c_alt' WHERE id_precep='$id'";
	$ejecutar_update=mysqli_query($conexion,$sql)? print("<script>alert('Registro Actualizado'); window.location ='administracion.php'</script>") : print("<script>alert('Error'); window.location ='administracion.php'</script>"); 
}
/* FIN ACTUALIZAR REGISTRO */
?>

<?php
/* COMIENZO BORRAR REGISTRO */
if(isset($_GET['id_borrar'])){
	/*echo '<h2>borrar registros</h2>';*/
	$id_borrar=$_GET['id_borrar'];
	$sql_upc = "UPDATE cursos SET id_precep_curricular= '1' WHERE id_precep_curricular = '$id_borrar'";
	$sql_upt = "UPDATE cursos SET id_precep_taller= '1' WHERE id_precep_taller = '$id_borrar'";
	$resetear_upc = mysqli_query($conexion,$sql_upc);
	$resetear_upt = mysqli_query($conexion,$sql_upt);
	$sql="DELETE FROM preceptores WHERE id_precep='$id_borrar'";
	$borrar=mysqli_query($conexion,$sql) ? print("<script>alert('Preceptor Eliminado'); window.location ='administracion.php'</script>") : print("<script>alert('error al borrar preceptor'); window.location ='administracion.php'</script>"); 
}
/* FIN BORRAR REGISTRO */
?>

<h2 class="tit-form">Listado Preceptores</h2>
<?php
/* COMIENZO MOSTRAR REGISTROS */
$sql="SELECT * FROM preceptores";
$consulta=mysqli_query($conexion,$sql);
?>
<?php
if(mysqli_num_rows($consulta)>0){
	$color = '#fff';
	while($registro= mysqli_fetch_assoc($consulta)){
		if($registro['id_precep']!=1){
		if($color == '#ccc'){$color = 'transparent';}else{$color ='#ccc';}
		echo '
		<div class="registro" style="background-color:'.$color.'">
			<div class="gr_txt_reg">
				<div class="txt_reg"><b>Preceptor: </b>'.$registro['apellido_precep'].' '.$registro['nombre_precep'].'</div>
				<div class="txt_reg"><b>Email institucional: </b>'.$registro['correo_inst_precep'].'</div>
				<div class="txt_reg"><b>Email Personal: </b>'.$registro['correo_alt_precep'].'</div>
			</div>
			<div class="btn_reg" >
				<a href="../admin/administracion.php?id_editar='.$registro['id_precep'].'"  id="edit"><span class="lnr lnr-pencil"></span></a>
				<a href="../admin/administracion.php?id_borrar='.$registro['id_precep'].'" onclick="return confirm(\'Seguro que desea eliminar este registro. No sera recuperable.\')" id="edit"><span class="lnr lnr-trash"></span></a>
			</div>
		</div>';
		}
	}
}else{
 echo "consulta vacia";
}
mysqli_free_result($consulta);
mysqli_close($conexion);
/* FIN MOSTRAR REGISTROS */
?>
