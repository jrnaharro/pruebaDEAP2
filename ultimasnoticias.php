<?php
	if(isset($_POST['CABECERAS'])){
		require("conexion.php"); 
		require("comun/funciones.php");	
	}
	$maxanchoimagenes=160;	
	$registrosxpagina=4;
	$sql=mysql_query("select * from noticias where tiponoticia!=0 order by fechaescritura DESC, IDNOTICIA DESC limit ".($_POST['NUMPAGINA']*$registrosxpagina).",".$registrosxpagina,$conexion);
	while($datos=mysql_fetch_object($sql)){
		?>
		<table width="100%">
			<tr><td class="titulo" align="center"><?php echo $datos->TITULO; ?></td></tr>
			<tr><td>
			<div class="textonoticias">
			<?php 
				$MAXcaracteresnoticias=150;
				$cadena=strip_tags($datos->TEXTO,"<img>");
				$cadena=str_replace("&nbsp;","",$cadena);
				//Si hay una imagen en los 250 primeros caracteres buscamos cuantos caracteres ocupa
				$inicioetiqueta=strpos(substr($cadena,0,$MAXcaracteresnoticias),"<img");
				//Convertimos $inicioetiqueta a string para que no convierta "" en 0 y viceversa
				if(((string)$inicioetiqueta)!=""){					
					$finetiqueta=strpos($cadena," />",$inicioetiqueta);
					$numcaracteresimagen=$finetiqueta-$inicioetiqueta; 
					$etiquetaimagen=substr($cadena,$inicioetiqueta,$numcaracteresimagen+3);
					//Sacamos la ruta de la imagen y le añadimos que se agrande al pulsar
					$iniciotamano=strpos($etiquetaimagen,"src=\"");
					$fintamano=strpos($etiquetaimagen,"\"",$iniciotamano+7);
					$ruta=substr($etiquetaimagen,$iniciotamano+5,$fintamano-$iniciotamano-5);
					$cadena=str_replace($etiquetaimagen,"<a href='".$ruta."' rel='lightbox'>".$etiquetaimagen." </a>",$cadena);
											
					$MAXcaracteresnoticias+=$numcaracteresimagen+150; //Con las imagenes va más texto
					//Cogemos el ancho de la imagen
					$iniciotamano=strpos($etiquetaimagen,"width=\"",$inicioetiqueta);
					$fintamano=strpos($etiquetaimagen,"\"",$iniciotamano+7);
					$ancho=substr($etiquetaimagen,$iniciotamano+7,$fintamano-$iniciotamano-7);
					//Cogemos el alto de la imagen
					$iniciotamano=strpos($etiquetaimagen,"height=\"",$inicioetiqueta);
					$fintamano=strpos($etiquetaimagen,"\"",$iniciotamano+8);
					$alto=substr($etiquetaimagen,$iniciotamano+8,$fintamano-$iniciotamano-8);
					if(intval($ancho)>$maxanchoimagenes){
						$porc_ancho = ($maxanchoimagenes*100)/$ancho;
						$nuevoalto = ($alto*$porc_ancho)/100;
						$cadena=str_replace($ancho,intval($maxanchoimagenes),$cadena);
						$cadena=str_replace($alto,intval($nuevoalto),$cadena);							
					}
				}
				//Cogemos la ultima palabra completa después de los 250 caracteres o el texto completo
				if(strlen($cadena)>$MAXcaracteresnoticias){					
					//Si hay una 2ª imagen puede cortarse la etiqueta, quedandose sin cerrar y estropeando el resto del formato. 					
					//La longitud son los caracteres extras añadidos con la imagen anterior
					$inisegundaetiqueta = strpos(substr($cadena,$MAXcaracteresnoticias,(int)$MAXcaracteresnoticias - $MAXcaracteresnoticias),"<img");					
					if(((string)$inisegundaetiqueta)!=""){
						//Si hay una 2ª imagen, cogemos hasta el caracter anterior a dicha imagen. strpos indica la posición dentro de la subcadena a partir del caracter 250, no dentro de la cadena global																		
						$cadena=substr($cadena,0,(int)$inisegundaetiqueta+$MAXcaracteresnoticias);
					}
					else{
						$posultimapalabra=strpos($cadena," ",$MAXcaracteresnoticias);
						$cadena=substr($cadena,0,$posultimapalabra);
					}
				}
				$cadena.="     <a href='/menuderecho/listadonot.php?IDNOTICIA=".$datos->IDNOTICIA."' class='textomas' style='color:#06F'>[Leer m&aacute;s]</a>"; 						
				echo $cadena;
				$rutafacebook=
				"<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) {return;}
				  js = d.createElement(s); js.id = id;
				  js.src = '//connect.facebook.net/es_ES/all.js#xfbml=1';
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				
				<span><div class='fb-like' data-href='http://www.diocesiscoriacaceres.es/menuderecho/listadonot.php?IDNOTICIA=".$datos->IDNOTICIA."' data-send='true' data-layout='button_count' data-width='450' data-show-faces='true' data-font='arial'></div></span>";
				
				$rutatwitter=
				"<span><a href='https://twitter.com/share' class='twitter-share-button' data-count='horizontal' data-via='CoriaCCDiocesis' data-url='http://www.diocesiscoriacaceres.es/menuderecho/listadonot.php?IDNOTICIA=".$datos->IDNOTICIA."' data-text='".$datos->TITULO."' data-lang='es'>Tweet</a><script type='text/javascript' src='//platform.twitter.com/widgets.js'></script></span>";
			?> 
			</div>
			</td></tr>
			<tr><td class="textofecha">
			<form id="formenviar" action="Vicarias.php" method="post">
			<input type="hidden" id="IDOPCION" name="IDOPCION" value="0" />
			<?php
			if($datos->IDDELEGACION!=0){
				$sql_delegacion=mysql_query("select delegacion from delegaciones where iddelegacion=".$datos->IDDELEGACION,$conexion);
				$datos_delegacion=mysql_fetch_object($sql_delegacion);
				echo "Escrita el día ".date("d-m-Y",strtotime($datos->FECHAESCRITURA))." por <a href=\"javascript: enviar('/Diocesis/Delegaciones.php',$datos->IDDELEGACION);\">".crossUrlDecode($datos_delegacion->delegacion)."</a><br>".$rutatwitter.$rutafacebook;
				mysql_free_result($sql_delegacion);
			}
			elseif($datos->IDVICARIA!=0){
				$sql_vicaria=mysql_query("select vicaria from vicarias where idvicaria=".$datos->IDVICARIA,$conexion);
				$datos_vicaria=mysql_fetch_object($sql_vicaria);
				echo "Escrita el día ".date("d-m-Y",strtotime($datos->FECHAESCRITURA))." por <a href=\"javascript: enviar('/Diocesis/Vicarias.php',$datos->IDVICARIA);\">".crossUrlDecode($datos_vicaria->vicaria)."</a><br>".$rutatwitter.$rutafacebook;
				mysql_free_result($sql_vicaria);
			}
			elseif($datos->IDORGANISMOADMIN!=0){
				$sql_organismo=mysql_query("select organismoadmin from organismosadministrativos where idorganismoadmin=".$datos->IDORGANISMOADMIN,$conexion);
				$datos_organismo=mysql_fetch_object($sql_organismo);
				echo "Escrita el día ".date("d-m-Y",strtotime($datos->FECHAESCRITURA))." por <a href=\"javascript: enviar('/Diocesis/Organismosadministrativos.php',$datos->IDORGANISMOADMIN);\">".crossUrlDecode($datos_organismo->organismoadmin)."</a><br>".$rutatwitter.$rutafacebook;
				mysql_free_result($sql_organismo);
			}
			else{
				$sql_organismo=mysql_query("select organismo from organismos where idorganismo=".$datos->IDORGANISMO,$conexion);
				$datos_organismo=mysql_fetch_object($sql_organismo);
				echo "Escrita el día ".date("d-m-Y",strtotime($datos->FECHAESCRITURA))." por <a href=\"javascript: enviar('/Diocesis/Organosconsulta.php',$datos->IDORGANISMO);\">".crossUrlDecode($datos_organismo->organismo)."</a><br>".$rutatwitter.$rutafacebook;
				mysql_free_result($sql_organismo);					
			}
			?>
			</form>
			</td></tr>
			<tr><td><hr align="center" width="300px" color="#000099"></td></tr>
		</table>
		<?php
	}
	?>
	<table width="100%">
    	<tr>
        	<?php
			//Cuando se llega a la primera página no hay que sacar el botón anterior
			if($_POST['NUMPAGINA']!=0){
			?>
        	<td align="left"><b onclick="siguientesnoticias(<?php echo $_POST['NUMPAGINA']-1;?>)" class="flechassigsants"><img src="comun/slideshow/imagenes_slideshow/previous.gif" /> Noticias siguientes</b></td>
			<?php
			}
			if(mysql_num_rows($sql)==$registrosxpagina){
			?>									 
        	<td align="right"><b onClick="siguientesnoticias(<?php echo $_POST['NUMPAGINA']+1;?>)" class="flechassigsants">Noticias anteriores <img src="comun/slideshow/imagenes_slideshow/next.gif" /></b></td>
            <?php
			}
			?>
        </tr>
    </table>
	<?php
	mysql_free_result($sql);
?>