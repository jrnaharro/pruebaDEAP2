<?php 
	
	//abrimos la conexion a la base de datos inmolandia servidor
	//$conexion=mysql_connect('db275.1and1.es:3306','dbo323615123','comunicacion');
	$conexion=mysql_connect('db275.1and1.es:3306','dbo323615123','Pr0bl3m0n*+');	
	if(!$conexion) exit();//header("Location:/error.htm");
	$error=mysql_select_db("db323615123",$conexion);
	if(!$error) exit();//header("Location:/error.htm");
	//abrimos la conexion a la base de datos inmolandia local
	/*$conexion=mysql_connect('','root','inmobase');
	if (!$conexion) exit();//header("Location:/error.htm");
	$error=mysql_select_db("webdiocesana",$conexion);
	if (!$error) exit();//header("Location:/error.htm");*/
?>