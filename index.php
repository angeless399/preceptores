<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <title>Busca a tus Preceptores</title>
</head>

<body>

  <header>
    <p class="tit_encabezado">Escuela Secundaria - Sistema Preceptores por Curso</p>
    <div class="head">
      <a href="#" class="boton">Administración</a>
    </div>
  </header>
  <div class="contenedor" id="contenedor">
    <section>
      <h1 class="titulo">
        Encuentra a tus preceptores
      </h1>

      <p class="texto"><b>Selecciona tu curso</b></p>

      <!-- Comienzo contenido -->
      <div class="form">
        <form action="index.php" method="get">
          <select id="especialidad" name="especialidad">
            <option value="">Especialidad</option>
            <option value="1">CBT</option>
            <option value="2">IPP</option>
            <option value="3">ADO</option>
            <option value="4">PROG</option>
            <option value="5">CATT</option>
            <option value="6">EGEOR</option>
          </select>

          <select id="turno" name="turno">
            <option value="">Turno</option>
            <option value="1">Mañana</option>
            <option value="2">Tarde</option>
            <option value="3">Vespertino</option>
          </select>
          <select id="curso" required="required" name="curso">
            <option value="">Curso</option>
          </select>

          <input class="boton" type="submit" name="Enviar" value="Buscar">
        </form>
      </div>
      <?php
        if(!$_GET){
        }
        else{
          require_once("php/getPreceptores.php");
        }
      ?>
      <!-- Fin de contenido -->
      </section>
    <footer>
      <div class="imagen">
        <img src="imagenes/footer2.png" width="100%" />
        <div class="text">
          <p><span>© 2021 - López María de los Angeles - CURSO PHP 2021 - COMISION 2115</span></p>
        </div> 
      </div> 
    </footer>
  </div>

  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/filtros.js"></script>

</body>

</html>