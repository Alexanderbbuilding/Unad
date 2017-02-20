<?php
session_start();
//session_start va primero que cualquier otro codigo
	require_once('../Conexion/Conexion.php');
//traemos los datos del usuario y la contraseña del archivo index.php
	$login = $_POST["username"] ;
	$pass =  md5($_POST["password"]) ;
//corremos consulta para verificar el usuario del funcionario
	$sql = "SELECT * FROM funcionario WHERE Usuario='$login'";
	$result = mysqli_query($conexion,$sql);
	//validacion condicional si encuentra nombre de usuario
		if(mysqli_num_rows($result) == 0){
			echo"<script text='text/javascript'>
			alert('El usuario ".$login." no existe en la BD');
			window.location = '../index.php';
			</script>";
		}else{
	//validamos si el usuario y la contraseña coinciden en la BD
			$sql = "SELECT * FROM funcionario WHERE Usuario='$login' AND Clave='$pass'";
			$resultado = mysqli_query($conexion,$sql);
	//validacion condicional si encuentra nombre de usuario
			if(mysqli_num_rows($resultado) == 0){
				echo"<script text='text/javascript'>
				alert('El usuario y la Clave no son correctas');
				window.location = '../index.php';
				</script>";
			}else{
				//aceptamos el acceso y damos los privilegios de sesion
				$_SESSION["user"]= $login;
				header("Location:../Administracion/index.php");
			}
		}
?>