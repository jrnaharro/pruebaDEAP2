<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" type="image/x-icon" href="Imagenes/Iconos/LOGODIOCESISSP.ico" />
<link href="/comun/style.css" rel="stylesheet" type="text/css">
<title>Di&oacute;cesis Coria-C&aacute;ceres :: Bienvenida</title>
<script type="text/javascript" src="/menu/stmenu.js"></script>
<script type="text/javascript" src="/comun/lib.js"></script>
</head>
<body>
<?php
	require("conexion.php");
	require("comun/funciones.php"); 
?>
<table cellpadding="3" width="980" align="center">
  <tr><td colspan="3"><?php require("cabecera.php");?></td></tr>
  <tr>
    <td width="170" valign="top" bgcolor="#B7CEE2"><?php $numsubcarpetas=0; require("izquierda.php"); ?></td>
    <td colspan="2" width="780" valign="top">
        <table>
            <tr><td align="center" class="titulo" width="780"><b>BIENVENIDO/A AL SITIO WEB DE LA DIÓCESIS DE CORIA-CÁCERES</b></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td class="textogrande">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>¿Por qué y para qué un sitio web diocesano?</b><br><br> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comunicar no es para la Iglesia algo opcional, sino que forma 
            parte de su ser y misión. Dios se ha comunicado en Jesús, que ha fundado la Iglesia para anunciar 
            la Buena Noticia (<i>Heb 1, 1-2</i>). El mundo de la comunicación está unificando a la humanidad y 
            transformándola en una “aldea global” (<i>Redemptoris Missio, n. 37</i>). Está claro que internet ha 
            irrumpido con fuerza en este mundo de las comunicaciones, tanto que la Iglesia, a nivel universal y 
            local, ha visto la necesidad, no sólo de estar presente en el nuevo universo digital, sino de 
            evangelizarlo (<i>Benedicto XVI, Mensaje para la 44ª Jornada Mundial de la Comunicaciones Sociales</i>
            ). Por todo ello, este sitio web tiene la finalidad de ser un instrumento de comunión y comunicación 
            entre todos los miembros de la Iglesia diocesana.<br><br>
            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>¿Qué vas a encontrar en este sitio?</b><br><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;La diócesis de Coria-Cáceres está presente en el ciberespacio 
            desde 1999. A partir de septiembre de 2010 hemos comenzado la renovación de nuestro sitio web, 
            intentando que sea más dinámico e interactivo ya que la comunicación es siempre cosa de dos:
            <ul type="square">
            	<li>Te ofreceremos información constante de las noticias y actividades que se desarrollen en la 
                diócesis:</li><br>
                <ul type="circle">
                	<li>Encuentros</li>
                    <li>Cursos y cursillos</li>
                    <li>Fiestas</li>
                    <li>Campamentos</li>
                    <li>Ejercicios Espirituales</li>
                    <li>Retiros, celebraciones, oraciones, etc</li>
                </ul><br>
                <li>Encontrarás materiales para tu formación humana y espiritual o para preparar actividades en tu 
                parroquia o grupo:</li><br>
                <ul type="circle">
                	<li>Lecturas y oraciones</li>
                    <li>Documentos</li>
                    <li>Catequesis</li>
                    <li>Unidades didácticas</li>
                    <li>Homilías, comentarios, etc</li>
                </ul><br>
                <li>Podrás conocer detalles de tu parroquia, grupo o movimiento.</li><br>
                <li>Y muchas cosas más que te invitamos a descubrir.</li>     
            </ul>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pero también queremos contar con tus aportaciones. El sitio web
            es para todos y entre todos lo debemos mantener actualizado. SOY REPORTERO es la herramienta que te 
            proponemos para que tú te conviertas en nuestro corresponsal. A través de un sencillo formulario podrás
            enviarnos la información necesaria para redactar las noticias o informar de los eventos y actividades 
            que hayáis programado en vuestra parroquia, grupo, movimiento, delegación, etc.<br><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Y si no quieres perderte nada, SUSCRÍBETE y recibirás toda la 
            información directamente en tu correo electrónico. Así esteremos siempre en contacto.<br><br>
            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¡Disfruta de este sitio!<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¡Ah!, y si encuentras errores o tienes ideas para mejorarlo, 
            dínoslo.<br><br>
            <center><i><b>Jesús Luis Viñas.</b></i></center>
            <center><i>Delegado de Medios de Comunicación Social.</i></center>
            </td></tr>
    	</table>
    </td>
  </tr>
  <tr><td colspan="3" class="pie" width="100%"><?php require("pie.php");?></td></tr>  
</table>
</body>
</html>
<?php
	mysql_close($conexion);
?>