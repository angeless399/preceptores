<?php
$server = "localhost";
$user =  "root";
$pass = "";
$db = "preceptores";

$conexion=new mysqli($server,$user, $pass,$db) OR die("Error de conexion");
$conexion->set_charset('utf8');
?>