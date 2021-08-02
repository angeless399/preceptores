<h1 class="titulo_admin"> Listado de cursos y asignación de preceptores</h1>
<?php
include ('../php/conexion.php');
// comienzo presentacion formulario para modificar preceptores de un curso
if(isset($_GET['id_curso_asig_precep'])){
    echo '<form action="" method="post" class="login">';
    echo '<h2 class="tit-form">Modificar Preceptores';
    echo '<div class="curso">'.$_GET['anio'].'º'.$_GET['division'].'º '.'T'.$_GET['turno'].' - '.$_GET['especialidad'].'</div></h2>';
    
    $sql_p = "SELECT id_precep, nombre_precep, apellido_precep FROM preceptores";
  
        $consulta2 = mysqli_query($conexion, $sql_p);
        if(mysqli_num_rows($consulta2)>0){
        echo '<label><b>Preceptor Curricular</b></label>';
        echo '<select name = "precep_curricular">';
            while($reg_precep = mysqli_fetch_assoc($consulta2)){ 
                echo '<option value="'.$reg_precep['id_precep'].'">'.$reg_precep['apellido_precep'].' '.$reg_precep['nombre_precep'].' </option>';
            }  
        echo '</select>';  
        }
        $consulta3 = mysqli_query($conexion, $sql_p);
        if(mysqli_num_rows($consulta3)>0){
        echo '<label><b>Preceptor taller</b></label>';
        echo '<select name = "precep_taller">';
            while($reg_precep2 = mysqli_fetch_assoc($consulta3)){ 
                echo '<option value="'.$reg_precep2['id_precep'].'">'.$reg_precep2['apellido_precep'].' '.$reg_precep2['nombre_precep'].' </option>';
            }
        echo '</select>';    
        } 
        echo '<input type="submit" name="actualizar_precep" value="ACTUALIZAR" class="btn_submit">';
        echo '</form>'; 
}
//fin presentacion formulario para modificar preceptores de un curso
?>
<?php
//Comienzo asignacion o modificación de preceptores de un curso
if(isset($_POST['actualizar_precep'])){
$id_curso = $_GET['id_curso_asig_precep'];
$id_precep_curri = $_POST['precep_curricular'];
$id_precep_taller = $_POST['precep_taller'];
$sql="UPDATE cursos SET id_precep_curricular='$id_precep_curri', id_precep_taller='$id_precep_taller' WHERE id_curso='$id_curso'";
$ejecutar_update=mysqli_query($conexion,$sql)? print("<script>alert('Registro Actualizado'); window.location ='precepxcurso.php'</script>") : print("<script>alert('Error'); window.location ='precepxcurso.php'</script>"); 
}
?>
<?php
//Comienzo presentacion preceptores por curso
echo '<h2 class="tit-form">Listado de preceptores por curso</h2>';
$sql = "SELECT c.id_curso, c.anio, c.division, t.nombre_turno, e.nombre_especialidad, p.nombre_precep as nombre_c, p.apellido_precep as apellido_c, pe.nombre_precep as nombre_t, pe.apellido_precep as apellido_t
FROM cursos c
JOIN turnos t ON c.id_turno = t.id_turno
JOIN especialidades e ON c.id_especialidad = e.id_especialidad
JOIN preceptores p ON c.id_precep_curricular = p.id_precep 
JOIN preceptores pe ON c.id_precep_taller = pe.id_precep
ORDER BY c.id_turno, c.id_especialidad, c.anio, c.division
";
$consulta = mysqli_query($conexion, $sql);
if(mysqli_num_rows($consulta)>0){
    $color = '#fff';
    while($registro = mysqli_fetch_assoc($consulta)){
        if($color == '#ccc'){$color = 'transparent';}else{$color ='#ccc';}
        echo '<div class="registro" style="background-color:'.$color.'">
        <div class="gr_txt_reg">
            <div class="txt_reg">
            <b>'.$registro['anio'].'º'.$registro['division'].'º '.'T'.$registro['nombre_turno'].' - '.$registro['nombre_especialidad'].'</b>
            </div>
            <div class="txt_reg"><b> preceptor curricular: </b>'.$registro['apellido_c'].' '.$registro['nombre_c'].'</div>
            <div class="txt_reg"><b> preceptor taller: </b>'.$registro['apellido_t'].' '.$registro['nombre_t'].'</div>
        </div>
        <div class="btn_reg" >
            <a href="../admin/precepxcurso.php?id_curso_asig_precep='.$registro['id_curso'].'&&anio='.$registro['anio'].'&&division='.$registro['division'].'&&turno='.$registro['nombre_turno'].'&&especialidad='.$registro['nombre_especialidad'].'"><span class="lnr lnr-pencil"></span></a>
        </div>
        </div>';
    }
}else{
    echo "consulta vacia";
}
//Fin presentacion preceptores por curso
?>