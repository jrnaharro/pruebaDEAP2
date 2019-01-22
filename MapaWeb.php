<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" type="image/x-icon" href="Imagenes/Iconos/LOGODIOCESISSP.ico" />
<link href="/comun/style.css" rel="stylesheet" type="text/css">
<title>Di&oacute;cesis Coria-C&aacute;ceres :: Mapa Web</title>
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
            <tr><td align="center" class="titulo" width="780"><b>MAPA WEB DE LA DIÓCESIS DE CORIA-CÁCERES</b></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td class="textogrande">
            <table align="center">
                <tr>
                    <td rowspan="39" bgcolor="#D99594" align="center"><b>Institución</b></td>
                    <td rowspan="2" bgcolor="#E5B8B7">Presentación</td>
                    <td colspan="2" bgcolor="#E5B8B7"><a href="bienvenida.php">Carta de presentación</a></td>
                </tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="mapaweb.php">Mapa Web</a></td></tr>
                <tr>
                    <td rowspan="5" bgcolor="#F2DBDB">Obispo</td>
                    <td colspan="2" bgcolor="#F2DBDB"><a href="Obispo/Biografia.php">Biografía</a></td>		
                </tr>
                <tr><td colspan="2" bgcolor="#F2DBDB"><a href="Obispo/Ordenacion/Bula.php">Ordenación Episcopal</a></td></tr>
                <tr>
                    <td rowspan="3" bgcolor="#F2DBDB">Escritos</td>
                    <td bgcolor="#F2DBDB"><a href="Obispo/Bibliografia.php">Bibliografía</a></td>
                </tr>
                <tr><td bgcolor="#F2DBDB">Cartas</td></tr>
                <tr><td bgcolor="#F2DBDB">Homilías</td></tr>
                <tr>
                    <td rowspan="10" bgcolor="#E5B8B7">Diócesis</td>
                    <td rowspan="2" bgcolor="#E5B8B7">Estadísticas y datos generales</td>
                    <td bgcolor="#E5B8B7"><a href="Diocesis/Geografia.php">Geografía</a></td>
                </tr>
                <tr><td bgcolor="#E5B8B7"><a href="Diocesis/Demografia.php">Demografía</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Diocesis/Historia.php">Historia</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Diocesis/Organigrama.php">Organigrama de la Curia</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Diocesis/Vicarias.php">Vicarías</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Diocesis/Delegaciones.php">Delegaciones</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Diocesis/Organismosadministrativos.php">Organismos administrativos</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Diocesis/Organosconsulta.php">Órganos de consulta</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Diocesis/Comunidadesreligiosas.php">Comunidades religiosas</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Diocesis/AsociacionesLaicales.php" target="_blank">Asociaciones laicales</a></td></tr>
                <tr>
                    <td rowspan="2" bgcolor="#F2DBDB">Parroquias</td>
                    <td colspan="2" bgcolor="#F2DBDB"><a href="Parroquias/IndiceArciprestazgos.php">Arciprestazgos</a></td>
                </tr>
                <tr><td colspan="2" bgcolor="#F2DBDB"><a href="Parroquias/Parroquias.php">Parroquias</a></td></tr>
                <tr>
                    <td rowspan="13" bgcolor="#E5B8B7">Centros y Organismos</td>
                    <td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/Archivodiocesano.php">Archivo diocesano</a></td>
                </tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/Casasacerdotal.php">Casa sacerdotal</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/Capellaniacentropenitenciario.php">Capellanías del Centro Penitenciario</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/CapellaniahospitalesSES.php">Capellanías de los hospitales del S.E.S</a></td></tr>                
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/Cabildocatedral.php">Cabildo Catedral</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/Centrosasistenciales.php">Centros asistenciales y sociales</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/Centroespiritualidad.php">Centro de espiritualidad "Virgen de la Montaña"</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/COF.php">Centro de Orientación Familiar (COF)</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/Comisionobras.php">Comisión de Obras</a></td></tr>	
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/Forolaicos.php">Foro de laicos</a></td></tr>	
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/Libreriadiocesana.php">Librería diocesana</a></td></tr>	
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/Museos.php">Museos catedralicios</a></td></tr>
                <tr><td colspan="2" bgcolor="#E5B8B7"><a href="Organismos/TribunalEclesiastico.php">Tribunal Eclesiástico</a></td></tr>
                <tr>
                    <td rowspan="6" bgcolor="#F2DBDB">Formación</td>
                    <td colspan="2" bgcolor="#F2DBDB"><a href="Formacion/EscuelaAgentesPastoral.php">Escuela de Agentes de Pastoral</a></td>
                </tr>
                <tr><td colspan="2" bgcolor="#F2DBDB"><a href="Formacion/EscuelaDiocesanaTeologia.php">Escuela Diocesana de Teología para seglares</a></td></tr>
                <tr><td colspan="2" bgcolor="#F2DBDB"><a href="Formacion/ColegioDiocesano.php">Colegio diocesano</a></td></tr>
                <tr><td colspan="2" bgcolor="#F2DBDB"><a href="Formacion/ColegiosReligiosos.php">Colegios religiosos</a></td></tr>
                <tr><td colspan="2" bgcolor="#F2DBDB"><a href="Formacion/InstitutoSuperiorCienciasReligiosas.php">Instituto Superior de Ciencias Religiosas</a></td></tr>	
                <tr><td colspan="2" bgcolor="#F2DBDB"><a href="Formacion/Seminario.php">Seminario</a></td></tr>
                <tr>
                    <td bgcolor="#E5B8B7">Administración</td>
                    <td colspan="2" bgcolor="#E5B8B7"><a href="http://www.xtantos.com/" target="_blank">"X Tantos"</a></td>
                </tr>
                <tr>
                    <td rowspan="13" bgcolor="#95B3D7" align="center"><b>Actualidad</b></td>
                    <td colspan="3" bgcolor="#B8CCE4"><a href="menuderecho/SoyReportero.php">"Soy Reportero"</a></td>
                </tr>
                <tr>
                    <td bgcolor="#DBE5F1">Noticias</td>
                    <td colspan="2" bgcolor="#DBE5F1"><a href="menuderecho/listadonot.php?OPCION=1">Archivo de noticias</a></td>
                </tr>
                <tr>
                    <td rowspan="6" bgcolor="#DBE5F1"><a href="menuderecho/listadonot.php?OPCION=2">Actividades</a></td>
                    <td colspan="2" bgcolor="#DBE5F1"><a href="Espiritualidad/espiritualidad.php?TIPO=1">Celebraciones</a></td>
                </tr>
                <tr><td colspan="2" bgcolor="#DBE5F1"><a href="Espiritualidad/espiritualidad.php?TIPO=2">Ejercicios espirituales</a></td></tr>
                <tr><td colspan="2" bgcolor="#DBE5F1"><a href="Espiritualidad/espiritualidad.php?TIPO=3">Encuentros</a></td></tr>
                <tr><td colspan="2" bgcolor="#DBE5F1"><a href="Espiritualidad/espiritualidad.php?TIPO=4">Retiros</a></td></tr>
                <tr><td colspan="2" bgcolor="#DBE5F1"><a href="Espiritualidad/espiritualidad.php?TIPO=6">Oraciones</a></td></tr>                
                <tr><td colspan="2" bgcolor="#DBE5F1"><a href="Espiritualidad/espiritualidad.php?TIPO=5">Otros eventos</a></td></tr>
                <tr>
                    <td rowspan="3" bgcolor="#B8CCE4">Publicaciones</td>
                    <td colspan="2" bgcolor="#B8CCE4"><a href="menuderecho/listadoboo.php">Boletín Oficial del Obispado</a></td>
                </tr>
                <tr><td colspan="2" bgcolor="#B8CCE4"><a href="menuderecho/listadosemanario.php">Semanario Iglesia en Coria-Cáceres</a></td></tr>
                <tr><td colspan="2" bgcolor="#B8CCE4"><a href="http://publicaciones-diocesiscoriacc.es.tl/" target="_blank">Instituto Teológico "San Pedro de Alcántara"</a></td></tr>
                <tr><td colspan="3" bgcolor="#DBE5F1"><a href="galeria.php">Galería de imágenes</a></td></tr>
                <tr><td colspan="3" bgcolor="#B8CCE4"><a href="menuderecho/Suscripcion.php">Suscríbete a la Newsletter</a></td></tr>
                <tr>
                    <td rowspan="14" bgcolor="#FABF8F" align="center"><b>Recursos pastorales</b></td>
                    <td rowspan="2" bgcolor="#FBD4B4">El pan de la Palabra</td>
					<?php	
                        $cadenapan="http://www.buigle.com/detalle_modulo.php?s=1&sec=7&mes=".date("m")."&year=".
						date("Y")."&fecha=".date("Y").date("m").date("d");
                    ?>                    
                    <td colspan="2" bgcolor="#FBD4B4"><a href="<?php echo $cadenapan;?>" target="_blank">Lecturas 
                    diarías de la Eucaristía</a></td>
                </tr>
                <tr><td colspan="2" bgcolor="#FBD4B4"><a href="menuderecho/comentarios.php">Comentarios bíblicos</a></td></tr>
                <tr>
                    <td rowspan="3" bgcolor="#FDE9D9">Escritos del Obispo</td>
                    <td colspan="2" bgcolor="#FDE9D9">Carta semanal</td>
                </tr>
                <tr><td colspan="2" bgcolor="#FDE9D9">Homilías</td></tr>
                <tr><td colspan="2" bgcolor="#FDE9D9">Pastorales</td></tr>
                <tr><td colspan="3" bgcolor="#FBD4B4"><a href="menuderecho/listadohomilias.php">Homilías</a></td></tr>
                <tr>
                    <td rowspan="3" bgcolor="#FDE9D9">Documentos</td>
                    <td colspan="2" bgcolor="#FDE9D9"><a href="menuderecho/documentos.php">Diócesis de Coria-Cáceres</a></td>
                </tr>
                <tr><td colspan="2" bgcolor="#FDE9D9"><a href="http://www.conferenciaepiscopal.es/documentos/conferencia.htm" target="_blank">Iglesia española</a></td></tr>
                <tr><td colspan="2" bgcolor="#FDE9D9"><a href="http://www.vatican.va/archive/index_sp.htm" target="_blank">Iglesia universal</a></td></tr>
                <tr>
                    <td rowspan="3" bgcolor="#FBD4B4">Materiales de formación</td>
                    <td colspan="2" bgcolor="#FBD4B4"><a href="menuderecho/Materiales/catequesis.php">Catequesis</a></td>
                </tr>
                <tr><td colspan="2" bgcolor="#FBD4B4"><a href="menuderecho/Materiales/Unidades.php">Unidades didácticas para profesores</a></td></tr>
                <tr><td colspan="2" bgcolor="#FBD4B4"><a href="menuderecho/Materiales/Recortable.php">Recortable para la reflexión</a></td></tr>
                <tr><td colspan="3" bgcolor="#FDE9D9"><a href="menuderecho/horariomisas.php">Horario de Misas</a></td>
                <tr><td colspan="3" bgcolor="#FBD4B4"><a href="menuderecho/cursillosprematrimoniales.php">Cursos prematrimoniales</a></td>	
            </table>                
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