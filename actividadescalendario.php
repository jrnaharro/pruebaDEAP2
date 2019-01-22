<?php
	require("conexion.php");
	
	$cadena="<table><tr><td align='left'><a href='javascript:ocultaActividades()'>[Cerrar]</a></td></tr>";
	$fecha=$_GET['ANIO']."-".$_GET['MES']."-".$_GET['DIA'];
	$sql=mysql_query("select titulo,idnoticia from noticias where tiponoticia=2 and fecha='".$fecha."'",$conexion);
	while($datos=mysql_fetch_object($sql)){
		$cadena .= "<tr><td align='left'>
						<a href='http://".$_SERVER['SERVER_NAME']."/menuderecho/listadonot.php?IDNOTICIA=".
						$datos->idnoticia."'>".$datos->titulo."</a>&nbsp;&nbsp;&nbsp;
					</td></tr>
					<tr><td></td></tr>";
	}
	mysql_free_result($sql);
	//Para que el texto quede con espacio vertical
	$cadena .= "</table>";
	echo $cadena;	
?>