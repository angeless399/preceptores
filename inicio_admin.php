<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Login</title>
</head>
<body>
	<div>	
		<form action="" method="POST">
			<input type="text" placeholder="Usuario" required name="usuario">
			<input type="password" placeholder="Contraseña" required name="password">
			<input type="submit" class="" value="Login" name="entrar">
		</form>
	</div>

<?php if(isset($_POST['entrar']))
{
	if ($_POST['usuario'] == "1234" && $_POST['password'] == "1234")
	{
		session_start();
		$_SESSION['user']=$_POST['usuario'];
		header('location:admin/adminstracion.php');
	}
	else {echo '<script>alert("Datos Incorrectos. Intentelo nuevamente.")</script>';}
}?>
</body>
</html>