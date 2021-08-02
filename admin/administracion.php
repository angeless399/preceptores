<?php 
session_start();
if(!isset($_SESSION['user'])){
    header('location:index.php');
}else{
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="css/estilos_admin.css">
    <link rel="stylesheet" href="iconos/style.css">	
    <title>Administración preceptores</title>
</head>
<body style="background-image:none; background-color:#fff;">
    <main>
    <header>
        <?php
        include("include/header_admin.html");
        ?>
    </header>
    <nav class="nav">
        <a href="administracion.php" class="btn_nav">ABM preceptores</a>
        <a href="precepxcurso.php" class="btn_nav">Preceptores por curso</a>
    </nav>
    <div class="contenedor">
        <?php
        include("include/crud_preceptores.php");
        ?>
    </div>
    <footer>   
    <?php
      include("include/fooder_admin.html");
      ?>
    </footer>
    </main>
</body>
</html>
<?php 
}
 ?>