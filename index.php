<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administración de Sesiones de Usuarios</title>
	<link href="../../assets/img/logo.png" rel="icon">
	<link href="../../assets/img/logo-grande.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form method="POST">
                <table>
                    <tr>
                        <td colspan="2" style="background-color:#33A8DB;padding-bottom:10px;">
						<label style="font-size: 28px; font-weight: bold; color: #FFFFFF; text-align: center; display: block; width: 100%;">Iniciar sesión</label>
                        </td>
                    </tr>
                    <tr>
						<td rowspan="6" class="logovai"><img src="../../assets/img/logo-grande.png"></td>
						<td><label><strong>Usuario</strong></label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtusuario" placeholder="Ingresar usuario" required /></td>
                    </tr>
                    <tr>
                        <td><label><strong>Contraseña</strong></label></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="txtpassword" placeholder="Ingresar contraseña" required /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="btningresar" value="Ingresar"/></td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">¿Olvidaste tu contraseña?</a><br><br>
                            <a href="#">Crear una nueva cuenta</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
<?php
	session_start();
	if(isset($_SESSION['nombredelusuario']))
	{
		header('location: pagina.php');
	}
	if(isset($_POST['btningresar']))
	{
		$dbhost="localhost";
		$dbuser="root";
		$dbpass="";
		$dbname="general";
		$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		if(!$conn)
		{
			die("No hay conexión: ".mysqli_connect_error());
		}
		$nombre=$_POST['txtusuario'];
		$pass=$_POST['txtpassword'];
		$query=mysqli_query($conn,"Select * from poject_22_login where usuario = '".$nombre."' and password = '".$pass."'");
		$nr=mysqli_num_rows($query);
		if(!isset($_SESSION['nombredelusuario']))
		{
			if($nr == 1)
			{
				$_SESSION['nombredelusuario']=$nombre;
				header("location: pagina.php");
			}
			else if ($nr == 0)
			{
				echo "<script>alert('Usuario no existe');window.location= 'index.php' </script>";
			}
		}
	}
?>