<h1> CRUD preceptores</h1>
<?php
include ('../php/conexion.php');
?>

<?php /* COMIENZO AGREGAR NUEVO REGISTRO */ ?>
<h2>Insertar registro </h2>
 <form action="#" method="post">
 	<input type="text" name="nombre" placeholder="Ing. nombre del preceptor">
	 <input type="text" name="apellido" placeholder="Ing. apellido del preceptor">
 	<input type="email" name="institucional" placeholder="Ing. correo institucional">
	 <input type="email" name="alternativo" placeholder="Ing. correo alternativo">
 	<input type="submit" name="insertar" value="insertar">
 </form>
<?php 
if(isset($_POST['insertar'])){
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$c_institucional=$_POST['institucional'];
	$c_alternativo=$_POST['alternativo'];
	$sql="INSERT INTO preceptores (nombre_precep, apellido_precep, correo_inst_precep, correo_alt_precep) VALUE ('$nombre', '$apellido', '$c_institucional', '$c_alternativo')";
	$insertar=mysqli_query($conexion, $sql)? print("registro agregado") : print("error al agregar registro ".mysqli_error($conexion));
}
/* FIN AGREGAR NUEVO REGISTRO */
?>

<?php
/* COMIENZO ACTUALIZAR REGISTRO */
if(isset($_GET['id_editar'])){
	$id=$_GET['id_editar'];
	$sql="SELECT * FROM preceptores WHERE id_precep='$id'";
	$ejecutar=mysqli_query($conexion,$sql);
	$registro=mysqli_fetch_assoc($ejecutar);
	echo '
	<h2>Actualizar registro </h2>
 	<form action="#" method="post">
 	<input type="text" name="nombre" value="'.$registro['nombre_precep'].'">
 	<input type="text" name="apellido" value="'.$registro['apellido_precep'].'">
 	<input type="email" name="institucional" value="'.$registro['correo_inst_precep'].'">
	<input type="email" name="alternativo" value="'.$registro['correo_alt_precep'].'">
 	<input type="submit" name="actualizar" value="actualizar">
 	</form>
	';
}
if(isset($_POST['actualizar'])){
	$actualizar_nbr=$_POST['nombre'];
	$actualizar_apel=$_POST['apellido'];
	$actualizar_c_inst=$_POST['institucional'];
	$actualizar_c_alt=$_POST['alternativo'];
	$sql="UPDATE preceptores SET nombre_precep='$actualizar_nbr', apellido_precep='$actualizar_apel', correo_inst_precep='$actualizar_c_inst', correo_alt_precep='$actualizar_c_alt' WHERE id_precep='$id'";
	$ejecutar_update=mysqli_query($conexion,$sql)? print("ok") : print("error");
}
/* FIN ACTUALIZAR REGISTRO */
?>

<?php
/* COMIENZO BORRAR REGISTRO */
if(isset($_GET['id_borrar'])){
	echo '<h2>borrar registros</h2>';
	$id_borrar=$_GET['id_borrar'];
	/*$sql="SELECT foto FROM productos WHERE id_prod='$id_borrar'";
	$consulta=mysqli_query($conexion, $sql);
	$registro=mysqli_fetch_assoc($consulta);
	$img_borrar="imagenes/".$registro['foto'];
	unlink("$img_borrar");*/
	$sql="DELETE FROM preceptores WHERE id_precep='$id_borrar'";
	$borrar=mysqli_query($conexion,$sql) ? print("Registro Eliminado") : print("error al borrar"); 
}
/* FIN BORRAR REGISTRO */
?>

<h2>Mostrar registros</h2>
<?php
/* COMIENZO MOSTRAR REGISTROS */
$sql="SELECT * FROM preceptores";
$consulta=mysqli_query($conexion,$sql);
?>
<table border="">
	<tr>
		<th>ID</th>
		<th>APELLIDO</th>
		<th>NOMBRE</th>
		<th>CORREO INSTITUCIONAL</th>
		<th>CORREO PERSONAL</th>
		<th>EDITAR</th>
		<th>BORRAR</th>
	</tr>
<?php
if(mysqli_num_rows($consulta)>0){
	while($registro= mysqli_fetch_assoc($consulta)){
		echo '
		<tr>
			<td>'.$registro['id_precep'].'</td>
			<td>'.$registro['apellido_precep'].'</td>
			<td>'.$registro['nombre_precep'].'</td>
			<td>'.$registro['correo_inst_precep'].'</td>
			<td>'.$registro['correo_alt_precep'].'</td>
			<td><a href="crud_preceptores.php?id_editar='.$registro['id_precep'].'">editar</a></td>
			<td><a href="crud_preceptores.php?id_borrar='.$registro['id_precep'].'" onclick="confirm(\'Seguro?\')">borrar</a></td>
		</tr>
		';
	}
	echo '</table>';
}else{
 echo "tabla vacia";
}
mysqli_free_result($consulta);
mysqli_close($conexion);
/* FIN MOSTRAR REGISTROS */
?>