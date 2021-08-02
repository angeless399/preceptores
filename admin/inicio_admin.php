<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/estilos_admin.css">
    <title>Login</title>
</head>
<body>
	<div class="contenedor">
		<div class="centrar">
			<form action="" method="POST" class="login">
				<h2 class="tit-form"> Inicie Sesion </h2>
				<label>Usuario</label><input type="text" required name="usuario">
				<label>Contraseña</label><input type="password"  required name="password" >
				<input type="submit" value="LOGIN" name="entrar" class="btn_submit">
			</form>
		</div>
	</div>

<?php if(isset($_POST['entrar']))
{
	if ($_POST['usuario'] == "1234" && $_POST['password'] == "1234")
	{
		session_start();
		$_SESSION['user']=$_POST['usuario'];
		header('location:administracion.php');
	}
	else {echo '<script>alert("Datos Incorrectos. Intentelo nuevamente.")</script>';}
}?>
</body>
</html>