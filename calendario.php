<?php
	if(isset($_GET['CABECERAS'])){
		//ESTO LO PONEMOS PARA SOLVENTAR LOS CARACTERES ESPECIALES
		//cuando llega a traves de la funcion de ajax
		session_start();
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header('Content-Type: text/xml; charset=ISO-8859-1');
		require("comun/funciones.php");
		require("conexion.php");		
	}
	
	if(!$_GET['dia'] || !$_GET['mes'] || !$_GET['anio']){
		$tiempo_actual = time();
		$dia = date("d",$tiempo_actual);
		$mes = date("n", $tiempo_actual);
		$anio = date("Y", $tiempo_actual);
	}else {
		$dia = $_GET['dia'];
		$mes = $_GET['mes'];
		$anio = $_GET['anio'];
	}
	if($_GET['subcarpetas']) $numsubcarpetas = $_GET['subcarpetas'];
	if(!isset($numsubcarpetas)) $numsubcarpetas=0;
	mostrar_calendario($dia,$mes,$anio,$numsubcarpetas,$conexion);
?>