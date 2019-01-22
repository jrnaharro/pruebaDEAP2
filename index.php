<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="title" content="Di&oacute;cesis Coria-C&aacute;ceres">
<meta name="description" content="Página Web de la diócesis de Coria-Cáceres. Ofrece información de la diócesis, incluyendo horarios, el semanario, homilias, galería de imágenes,etc. Suscríbete a nuestra newsleter.">
<meta name="keywords" content="diocesis coria caceres, delegaciones, misas, iglesia en coria caceres, vicarias, organismos, imagenes, obispo, francisco cerro">
<meta name="robots" content="index,follow">
<meta property="fb_title" content="Di&oacute;cesis Coria-C&aacute;ceres :: Noticias" />
<link rel="shortcut icon" type="image/x-icon" href="Imagenes/Iconos/LOGODIOCESISSP.ico" />
<link href="/comun/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/comun/lightbox/css/lightbox.css" type="text/css" media="screen">
<title>Di&oacute;cesis Coria-C&aacute;ceres</title>
<script type="text/javascript" src="/menu/stmenu.js"></script>
<script type="text/javascript" src="/comun/lib.js"></script>
<script type="text/javascript" src="/comun/lightbox/js/prototype.js"></script>
<script type="text/javascript" src="/comun/lightbox/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="/comun/lightbox/js/lightbox.js"></script>
<script type="text/javascript" src="/comun/slideshow.js"></script>
<script type="text/javascript">
function enviar(accion,opcion){
	document.getElementById('formenviar').action=accion;
	document.getElementById('IDOPCION').value=opcion;
	document.getElementById('formenviar').submit();	
}
function siguientesnoticias(numpagina){
	procesaAjax(function(){
						 document.getElementById('ultimasnoticias').innerHTML=arguments[0];
	},"POST","ultimasnoticias.php","NUMPAGINA="+numpagina+"&CABECERAS=");
}
</script>
</head>
<body>
<?php 
	require("conexion.php"); 
	require("comun/funciones.php");
?>
<table cellpadding="3" width="990" align="center">
  <tr><td colspan="3"><?php require("cabecera.php");?></td></tr>
  <tr>
    <td width="170" valign="top" bgcolor="#B7CEE2"><?php require("izquierda.php");?></td>
    <td width="600" valign="top">
    	<table width="100%">
        	<tr><td align="center"><a href="http://www.sinodocoriacaceres.es" target="_blank" id="hrefslide" name="hrefslide"><IMG WIDTH=550 HEIGHT=170 ID="myImage" NAME="myImage" SRC="Imagenes/Slide/image1.jpg" /></a></td></tr>
            <tr><td><hr align="center" width="300px" color="#000099"></td></tr>            
        </table>
        <div id="ultimasnoticias">
	<?php
		require("ultimasnoticias.php");
		mysql_close($conexion);
	?>
    	</div>
    </td>
    <td width="170" valign="top" bgcolor="#B7CEE2">
    	<table width="100%" cellspacing="3">
        	<tr><td colspan="2"><?php require("menu/menuDerecho.php");?></td></tr>
            <tr><td height="5"></td></tr>
            <tr><td colspan="2" align="center"><a href="../menuderecho/listadonot.php?IDNOTICIA=4791"><img src="Imagenes/obrascatedral.jpg" alt="Obras de la catedral de Coria" width="160" height="60" 
            border="0" longdesc="Obras de la catedral de Coria"></a></td></tr>
            <tr><td height="5"></td></tr>
            <tr><td colspan="2" align="center"><a target="_blank" href="http://xtantos.com/"><img src="Imagenes/xtantos.jpg" alt="Página Xtantos" title="Web Xtantos" border="0"></a></td></tr>         
            <tr><td colspan="2" align="center"><a target="_blank" href="https://recursos.cajasur.es/Donativos/Donativo.aspx?finalidad=2&entidad=1"><img src="Imagenes/donativos.jpg" alt="Donativos a la diócesis" title="Donativos" border="0"></a></td></tr>           
            <tr><td height="5"></td></tr>
            <tr>
            	<td align="left"><a target="_blank" href="http://www.vatican.va/phome_sp.htm"><img src="Imagenes/osservatore.jpg" alt="Pagina Osservatore Romano" title="Web Osservatore Romano" border="0"></a></td>
            	<td align="right"><a target="_blank" href="http://www.conferenciaepiscopal.es/"><img src="Imagenes/conferespa.jpg" alt="Pagina Conferencia Episcopal Española" title="Web Conferencia Episcopal Española" border="0"></a></td>          
            </tr>
            <tr>
            	<td align="left"><a target="_blank" href="http://www.agenciasic.com/"><img src="Imagenes/agenciasic.jpg" alt="Pagina Agencia Sic" title="Web Agencia Sic" border="0"></a></td>
            	<td align="right"><a target="_blank" href="http://www.caritas.es/coriacaceres/"><img src="Imagenes/caritas.jpg" alt="Pagina Caritas Diócesis Coria-Cáceres" title="Web Cáritas Diócesis Coria-Cáceres" border="0"></a></td>
            </tr>
            <tr><td height="5"></td></tr>
      		<tr><td colspan="2" align="center"><a target="_blank" href="http://www.acdp.es/"><img src="Imagenes/Logotipo-ACdP.jpg" alt=
            "Logototipo AcdP" title="Logo Asociación Católica de Propagandistas" border="0"></a></td></tr>
 			<tr><td colspan="2" align="center"><a target="_self" href="../menuderecho/DHonorio/index.php" ><img src="Imagenes/DHonorio-logo.jpg" alt=
            "Causa de Beatificaci&oacute;n y Canonizaci&oacute;n de D. Honorio" title="Causa de Beatificaci&oacute;n y Canonizaci&oacute;n de D. 
            Honorio" border="0"></a></td></tr>
			<tr><td colspan="2" align="center"><a href="../menuderecho/IXCongreso/index.php"><img src="Imagenes/congreso.jpg" alt="IX Congreso 
            Teológico Pastoral - 16-17 de junio 2017 &lt;br /&gt;Seminario Diocesano - Diócesis de Coria-Cáceres" width="160" height="50" border="0" 
            title="Cogreso Teológico 2017"></a></td></tr>
        </table>
    </td>
  </tr>
  <tr><td colspan="3" class="pie" width="100%"><?php require("pie.php");?></td></tr>
</table>
</body>
</html>


