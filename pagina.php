<?php
	session_start();
	if (!isset($_SESSION['nombredelusuario'])) {
		header('Location: index.php');
		exit();
	}
	$usuarioingresado = $_SESSION['nombredelusuario'];
	if (isset($_POST['btncerrar'])) {
		session_destroy();
		header('Location: index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Administración de Sesiones de Usuarios</title>
		<link href="../../assets/img/logo.png" rel="icon">
		<link href="../../assets/img/logo-grande.png" rel="apple-touch-icon">
		<style>
			body {
				font-family: Arial, sans-serif;
				background: url(fondo.png) no-repeat center top;
				background-size: cover;
				display: flex;
				justify-content: center;
				align-items: center;
				height: 100vh;
				margin: 0;
			}
			.container {
				background-color: #fff;
				padding: 20px;
				border-radius: 10px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
				text-align: center;
			}
			header h1 {
				color: #333;
			}
			.logout-form {
				margin-top: 20px;
			}
			.btn {
				background-color: #007BFF;
				color: white;
				border: none;
				padding: 10px 20px;
				font-size: 16px;
				cursor: pointer;
				border-radius: 5px;
				transition: background-color 0.3s;
			}
			.btn:hover {
				background-color: #0056b3;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<header>
				<h1>Bienvenido, <?php echo htmlspecialchars($usuarioingresado); ?></h1>
			</header>
			<main>
				<form method="POST" class="logout-form">
					<input type="submit" value="Cerrar sesión" name="btncerrar" class="btn btn-primary" />
				</form>
			</main>
		</div>
	</body>
</html>