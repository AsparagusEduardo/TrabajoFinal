<?php
	if ($_POST["usuario"] == "Usuario" && $_POST["clave"]=="123")
	{
		session_start();
		$_SESSION["usuario"]="Administrador";
		$_SESSION["nombre"]="Juan";
		$_SESSION["apellido"]="Perez";
		header("location:../mantenedor.php");
	}
	else
	{
		header("location:../iniciarsesion.php?msg=Error de usuario");
	}

?>