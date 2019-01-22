<?php
function crossUrlDecode($source) {
//arregla acentos!
	$decodedStr = '';
	$pos = 0;
	$len = strlen($source);
    while($pos < $len){
		$charAt = substr ($source, $pos, 1);
        if($charAt == 'Ã') {
            $char2 = substr($source, $pos, 2);
            $decodedStr .= htmlentities(utf8_decode($char2),ENT_QUOTES,'ISO-8859-1');
            $pos += 2;
        }
        elseif(ord($charAt) > 127) {
            $decodedStr .= "&#".ord($charAt).";";
            $pos++;
        }
        elseif($charAt == '%') {
            $pos++;
            $hex2 = substr($source, $pos, 2);
            $dechex = chr(hexdec($hex2));
            if($dechex == 'Ã') {
                $pos += 2;
                if(substr($source, $pos, 1) == '%') {
                    $pos++;
                    $char2a = chr(hexdec(substr($source, $pos, 2)));
                    $decodedStr .= htmlentities(utf8_decode($dechex . $char2a),ENT_QUOTES,'ISO-8859-1');
                }
                else {
                    $decodedStr .= htmlentities(utf8_decode($dechex));
                }
            }
            else {
                $decodedStr .= $dechex;
            }
            $pos += 2;
        }
        else {
            $decodedStr .= $charAt;
            $pos++;
        }
    }
    return $decodedStr;
} 
/*********************************************************************
				FUNCIONES CALENDARIO 
 *********************************************************************/
function mostrar_calendario($dia,$mes,$anio,$subcarpetas,$conexion){
	$tiempo_actual = time();
	$dia_hoy = date("d",$tiempo_actual);
	$mes_hoy = date("n",$tiempo_actual);
	$anio_hoy = date("Y",$tiempo_actual);
	//tomo el nombre del mes que hay que imprimir
	$nombre_mes = dame_nombre_mes($mes);
	//calculo el mes y año del mes anterior y siguiente
	$mes_anterior = $mes - 1;
	$anio_anterior = $anio;
	if($mes_anterior==0){
		$anio_anterior--;
		$mes_anterior=12;
	}
	$mes_siguiente = $mes + 1;
	$anio_siguiente = $anio;
	if ($mes_siguiente==13){
		$anio_siguiente++;
		$mes_siguiente=1;
	}
	//calculo el numero del dia de la semana del primer dia
	$numero_dia = calcula_numero_dia_semana(1,$mes,$anio);
	//calculo el último dia del mes
	$ultimo_dia = ultimoDia($mes,$anio);
	//Variable para llevar la cuenta del dia actual
	$dia_actual = 1;
	//Variable para comprobar si hay actividades
	if($mes<10) $mes_comprobado = "0".$mes;
	else $mes_comprobado=$mes;
	
	//Saco un array con las actividades del mes
	$actividadesmes = array();
	$sql=mysql_query("select * from noticias where tiponoticia=2 and month(fecha)=".$mes." and year(fecha)=".$anio_hoy." group by fecha",$conexion);
	while($datos=mysql_fetch_object($sql)){
		array_push($actividadesmes,$datos->FECHA);
	}
	mysql_free_result($sql);
	
	//construyo la cabecera de la tabla
	echo "<table width='175' cellspacing='3' cellpadding='2' bgcolor='#301CA5'>
			<tr width=100%><td colspan='7' width=100%>
				<table width=100% cellspacing=2 cellpadding=2>
					<tr class='titulocal'>
						<td align=left>
	 						<a style=color:white; href=javascript:reescribirCalendario(1,$mes_anterior,$anio_anterior,$subcarpetas)>&lt;&lt;</a>
						</td>
	   					<td align=center>$nombre_mes $anio</td>
	   					<td align=right>
							<a style=color:white; href=javascript:reescribirCalendario(1,$mes_siguiente,$anio_siguiente,$subcarpetas)>&gt;&gt;</a>
						</td>
					</tr>
				</table>
			</td></tr>";
	echo "	<tr class='nombredias'>
			    <td width=14%>L</td>
			    <td width=14%>M</td>
			    <td width=14%>X</td>
			    <td width=14%>J</td>
			    <td width=14%>V</td>
			    <td width=14%>S</td>
			    <td width=14%>D</td>
			</tr>";
	
	//escribo la primera fila de la semana
	echo "	<tr>";
	for($i=0;$i<7;$i++){
		if($i < $numero_dia){
			//si el dia de la semana i es menor que el numero del primer dia de la semana no pongo nada en la celda
			echo "<td></td>";
		} 
		else{
			$dia_comprobado = "0".$dia_actual;
			$fecha_dia_actual=$anio."-".$mes_comprobado."-".$dia_comprobado;
			if($actividadesmes[0]==$fecha_dia_actual){
				//comprobamos si hay alguna actividad ese dia y borramos del array
				echo "<td class='diasactivos' onmouseover='muestraActividades(event,$dia_actual,$mes,$anio,$subcarpetas)'  onmouseout='ocultaActividades()'>$dia_actual</td>";
				array_shift($actividadesmes);
			}
			else{
				if($dia_actual==$dia_hoy && $mes==$mes_hoy && $anio==$anio_hoy){
					echo "<td class='diaactual'>$dia_actual</td>";
				}
				else{
					echo "<td class='dias'>$dia_actual</td>";
				}
			}
			$dia_actual = $dia_actual+1;
		}
	}
	echo "	</tr>";
	
	//recorro todos los demás días hasta el final del mes
	$numero_dia = 0;
	while($dia_actual <= $ultimo_dia){
		//si estamos a principio de la semana escribo el <TR>
		if($numero_dia == 0)
			echo "<tr>";
		
		if($dia_actual<10) $dia_comprobado = "0".$dia_actual;
		else $dia_comprobado = $dia_actual;
		$fecha_dia_actual=$anio."-".$mes_comprobado."-".$dia_comprobado;
		if($actividadesmes[0]==$fecha_dia_actual){
			//comprobamos si hay alguna actividad ese dia y borramos del array
			echo "<td class='diasactivos' onmouseover='muestraActividades(event,$dia_actual,$mes,$anio,$subcarpetas)'>$dia_actual</td>";
			array_shift($actividadesmes);
		}
		else{
			if(($dia_actual==$dia_hoy) && ($mes==$mes_hoy) && ($anio==$anio_hoy)){
				echo "<td class='diaactual'>$dia_actual</td>";
			}
			else{
				echo "<td class='dias'>$dia_actual</td>";
			}
		}
		$dia_actual++;
		$numero_dia++;
		//si es el uñtimo de la semana, me pongo al principio de la semana y escribo el </tr>
		if($numero_dia == 7){
			$numero_dia = 0;
			echo "</tr>";
		}
	}
	
	//compruebo que celdas me faltan por escribir vacias de la última semana del mes
	for($i=$numero_dia;$i<7;$i++){
		echo "<td></td>";
	}
	
	echo "</tr>";
	echo "</table>";
}	

function calcula_numero_dia_semana($dia,$mes,$anio){
	$numerodiasemana = date('w', mktime(0,0,0,$mes,$dia,$anio));
	if($numerodiasemana == 0) 
		$numerodiasemana = 6;
	else
		$numerodiasemana--;
	return $numerodiasemana;
}

//funcion que devuelve el último día de un mes y año dados
function ultimoDia($mes,$anio){ 
    $ultimo_dia=28; 
    while(checkdate($mes,$ultimo_dia + 1,$anio)){ 
       $ultimo_dia++; 
    } 
    return $ultimo_dia; 
} 

function dame_nombre_mes($mes){
	 switch ($mes){
	 	case 1:
			$nombre_mes="Enero";
			break;
	 	case 2:
			$nombre_mes="Febrero";
			break;
	 	case 3:
			$nombre_mes="Marzo";
			break;
	 	case 4:
			$nombre_mes="Abril";
			break;
	 	case 5:
			$nombre_mes="Mayo";
			break;
	 	case 6:
			$nombre_mes="Junio";
			break;
	 	case 7:
			$nombre_mes="Julio";
			break;
	 	case 8:
			$nombre_mes="Agosto";
			break;
	 	case 9:
			$nombre_mes="Septiembre";
			break;
	 	case 10:
			$nombre_mes="Octubre";
			break;
	 	case 11:
			$nombre_mes="Noviembre";
			break;
	 	case 12:
			$nombre_mes="Diciembre";
			break;
	}
	return $nombre_mes;
}

?>