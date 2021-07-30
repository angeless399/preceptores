<?php
	require_once("conexion.php");
	$id_c = $_GET['curso']; //De los datos que vienen del archivo consultaPreceptores.php solo hace falta el id_curso
	
	//COMIENZO de "Consulta Preceptores"
	//1ra Consulta
	$sql="SELECT cursos.id_curso, cursos.anio, cursos.division, cursos.id_precep_curricular, cursos.id_precep_taller,
				 especialidades.nombre_especialidad
		  FROM cursos 
		  INNER JOIN especialidades ON cursos.id_especialidad=especialidades.id_especialidad
		  WHERE id_curso='$_GET[curso]'";
	
    $consultaP=$conexion->query($sql);
    if(mysqli_num_rows($consultaP)>0){  
 		$registro=mysqli_fetch_assoc($consultaP); //Obtengo un unico registro
		echo '
	 		<div>
	 			<b><p class= "resultado-precep" style="color:orange"> CURSO: '.$registro['anio'].'º '.$registro['division'].'º '.$registro['nombre_especialidad'].'</p></b>
	 		</div>';
		$id_precep_curricular=$registro['id_precep_curricular'];
		$id_precep_taller=$registro['id_precep_taller'];

		//2da Consulta
		//Con los id de preceptores obtenidos en la primera consulta obtengo los datos de los preceptores
		$sql2="SELECT * FROM preceptores WHERE id_precep='$id_precep_curricular' OR id_precep='$id_precep_taller'";

		$consultaP2=$conexion->query($sql2);
		if(mysqli_num_rows($consultaP2)>1){
			while($registro=mysqli_fetch_assoc($consultaP2)){
				if($registro['id_precep']==$id_precep_curricular){
					$nbr_precep_c=$registro['nombre_precep'].$registro['apellido_precep'];
					$mail_ins_precep_c=$registro['correo_inst_precep'];
					$mail_alt_precep_c=$registro['correo_alt_precep'];
				}else{
					$nbr_precep_t=$registro['nombre_precep'].$registro['apellido_precep'];
					$mail_ins_precep_t=$registro['correo_inst_precep'];
					$mail_alt_precep_t=$registro['correo_alt_precep'];
				}
			}
			echo '
				<div class ="resultado-precep" ;>';
 					echo '<b><p>PRECEPTOR DEL CURSO:</p></b>';
 							
 							echo '
	 							<div>
	 								<p>'.$nbr_precep_c.'</p>
	 								<p>'.$mail_ins_precep_c.'</p>
	 								<p>'.$mail_alt_precep_c.'</p>
	 							</div>';
	 						
	 			echo '</div>';

	 		echo '
				<div class ="resultado-precep";>';
					echo  '<b><p>PRECEPTOR DE TALLER:</p></b>';
 							
 							echo '
	 							<div>
	 								<p>'.$nbr_precep_t.'</p>
	 								<p>'.$mail_ins_precep_t.'</p>
	 								<p>'.$mail_alt_precep_t.'</p>
	 							</div>';
							
 			echo '</div>';
		}elseif(mysqli_num_rows($consultaP2)==1){
			$registro=mysqli_fetch_assoc($consultaP2);
			$nbr_precep_c=$registro['nombre_precep'].$registro['apellido_precep'];
			$mail_ins_precep_c=$registro['correo_inst_precep'];
			$mail_alt_precep_c=$registro['correo_alt_precep'];

			echo '
				<div class ="resultado-precep" ;>';
 					echo '<b><p>PRECEPTOR DEL CURSO:</p></b>';
 							
 							echo '
	 							<div>
	 								<p>'.$nbr_precep_c.'</p>
	 								<p>'.$mail_ins_precep_c.'</p>
	 								<p>'.$mail_alt_precep_c.'</p>
	 							</div>';
	 						
	 			echo '</div>';

		}
			else{
			echo 'div vacio';
		}
	}
	//FIN de "Consulta Preceptores"
	mysqli_close($conexion);
?>