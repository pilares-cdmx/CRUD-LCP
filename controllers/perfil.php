<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
if (isset($_SESSION['usuario'])) {
	echo "Has iniciado tu sesion";
}else{
	header("Location: index.php");
	exit();
}
echo "Bienvenido ".$_SESSION['usuario']."<br>
<a href='control/cerrar.php'>SALIR</a>";
?>
