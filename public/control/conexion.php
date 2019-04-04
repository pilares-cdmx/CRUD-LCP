<?php
	$db='pruebaconexion';
	$con=mysql_connect('localhost','root','S2NT2m2r2d0n2...') or die('Problema con la conexion');
	mysql_select_db($db,$con)or die('Problema con la base de datos');
?>
