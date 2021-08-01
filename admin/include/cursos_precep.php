<h1> Listado de Curso y asignación de preceptores</h1>
<?php
include ('../php/conexion.php');


$sql = "SELECT c.anio, c.division, t.descripcion_turno, e.nombre_especialidad, p.nombre_precep as nonbre_c, p.apellido_precep as apellido_c, pe.nombre_precep as nonbre_t, pe.apellido_precep as apellido_t
FROM cursos c
JOIN turnos t ON c.id_turno = t.id_turno
JOIN especialidades e ON c.id_especialidad = e.id_especialidad
JOIN preceptores p ON c.id_precep_curricular = p.id_precep 
JOIN preceptores pe ON c.id_precep_taller = pe.id_precep
ORDER BY c.id_turno, c.id_especialidad, c.anio, c.division
";
?>