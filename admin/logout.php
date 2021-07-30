<?php 
session_start();
session_destroy();
echo '<script type="text/javascript">';
   /* echo 'window.location.href="http://byperonia.atwebpages.com/index.php";';*/
header('location:../index.php');
echo '</script>';
?>