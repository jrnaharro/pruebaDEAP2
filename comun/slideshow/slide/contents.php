<script type="text/javascript" language="JavaScript">
var slsContents = new Array();
var datos=0;
<?php 
require("../funciones.php");
$d=dir('../../Imagenes/Fotos/Galeria/'.$_GET['CARPETA']);
while($file = $d->read()){
	if($file!="." && $file!=".."){
?>
		slsContents[datos] = "<img src='../../Imagenes/Fotos/Galeria/<?php echo $_GET['CARPETA']."/".$file;?>'>";
		datos++;
<?php
	}
}
$d->close();
?>
slsContents.sort();
</script>