<?php
if(isset($TABLACONSULTA)){
	$ANIOINICIAL=0;
	$ANIOFINAL=0;
	//En el caso de libro el campo sobre el que se busca es fecha_entrada
	if($TABLACONSULTA=="libro") $campo="fecha_entrada";
	else $campo="fecha";
	
	$sql=mysql_query("select min(distinct(year(".$campo."))) as anioinicial, max(distinct(year(".$campo."))) as aniofinal from ".$TABLACONSULTA." where id_cartilla=".$IDCARTILLA,$conexion);
	if(mysql_num_rows($sql)!=0){
		$datos=mysql_fetch_object($sql);
		$ANIOINICIAL=$datos->anioinicial;
		$ANIOFINAL=$datos->aniofinal;
		mysql_free_result($sql);
	}
	//comprobacion para consulta vacia
	if($ANIOINICIAL==0){
		$ANIOINICIAL=date("Y")-10;
		$ANIOFINAL=date("Y");
	}
}
else if(isset($ANIOINICIAL)){
	$ANIOFINAL=$ANIOINICIAL;
}
else {
	$ANIOINICIAL=date("Y")-10;
	$ANIOFINAL=date("Y");
}
?>
<script>
var ANIOINICIAL=<?php echo $ANIOINICIAL;?>;
var ANIOFINAL=<?php echo $ANIOFINAL;?>;
</script>
<script language="javascript" src="/comun/calendario/popcalendar.js"></script>