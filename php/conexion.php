<?php

$server = "localhost";
$user =  "root";
$pass = "";
$db = "preceptores";
/*
$server = "localhost";
$user =  "id17359300_preceptores";
$pass = "5f8@2_+VxWv?o7Wv";
$db = "id17359300_escuela";
*/
$conexion=new mysqli($server,$user, $pass,$db) OR die("Error de conexion");
$conexion->set_charset('utf8');
?>