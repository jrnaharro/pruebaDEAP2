<?php 
//Si la sesion ha expirado o no existe le echamos
if(!isset($_SESSION['ADMINISTRADOR']))
{
	echo '<script language="javascript">';
	echo 'alert("La sesion ha expirado.");';
	echo 'window.location.href="/administracion/index.php";';
	echo '</script>';
	exit();
}
?>