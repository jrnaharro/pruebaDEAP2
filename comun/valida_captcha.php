<?php
//comprueba el codigo captcha
session_start();
header('Content-Type: text/xml; charset=ISO-8859-1');
if($_SESSION['captcha']!=$_GET['valor']) echo "<font color='red' class='textogrande'>&nbsp;&nbsp;Escribe el C&oacute;digo de Seguridad que aparece en la imagen.</font><input type='hidden' name='CODIGOVALIDO' id='CODIGOVALIDO' value='0'>";
else echo "<input type='hidden' name='CODIGOVALIDO' id='CODIGOVALIDO' value='1'>";
?>