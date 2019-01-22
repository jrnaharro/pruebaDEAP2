<table width="100%">
    <tr><td><?php include("menu/menuIzquierdo.php");?></td></tr>
    <tr><td height="5"></td></tr>
    <tr><td align="center">
        <b>ACTIVIDADES</b>
        <div id="calendario">
		<?php
			for($i=0;$i<$numsubcarpetas;$i++) $cadena="../".$cadena;
			require($cadena."calendario.php"); 
			setlocale(LC_ALL,"es_ES");
		?>
        </div><br />        
        <a href="/agenda/<?php echo ucwords(strftime("%B",mktime(0,0,0,date("m"),1,date("y"))));?>"><img src="/Imagenes/agenda.png" width="165" height="50" border="0" /></a>
</div><br /><br />
    </td></tr>
    <tr><td align="center" class="siguenos"><b>S&iacute;guenos en: </b></td></tr>
    <tr><td height="5"></td></tr>
    <tr>
      <td align="center"><a href="https://www.facebook.com/pages/Diocesis-Coria-Caceres/233628933356481?ref=ts&fref=ts" title="Facebook de la Di&oacute;cesis de Coria-C&aacute;ceres" target="_blank"><img src="/Imagenes/logofb.jpg" /></a></td></tr>
    <tr><td height="5"></td></tr>
    <tr><td align="center"><a href="https://twitter.com/CoriaCCDiocesis" title="Twitter de la Di&oacute;cesis de Coria-C&aacute;ceres" target="_blank"><img src="/Imagenes/logotwitter.png" /></a></td></tr>
</table>
<div id="actividad" style="position:absolute; display:none;" class="actividadescal"></div>