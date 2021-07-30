<?php
$server = "localhost";
$user =  "root";
$pass = "";
$db = "s_preceptores";

/*
$server = "pdb28.awardspace.net";/*fdb29.awardspace.net";
$user =  "3662971_tecnica7";
$pass = "tecnica7";
$db = "3662971_tecnica7";
*/

$conexion=new mysqli($server,$user, $pass,$db) OR die("Error de conexion");
$conexion->set_charset('utf8');
?>