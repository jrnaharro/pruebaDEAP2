<?php 
function redimensionar($ruta,$destino,$calidad, $max_tam, $extension){
	switch ($extension) {
		case 'jpg': $fuente = @imagecreatefromjpeg($ruta);break;
		case 'png': $fuente = @imagecreatefrompng($ruta);break;
		case 'gif': $fuente = @imagecreatefromgif($ruta);break;
		//case 'bmp': $fuente = @imagecreatefromwbmp($ruta);break;
	}		
/*	if ($extension =='jpg')	$fuente = @imagecreatefromjpeg($ruta); 
	else if ($extension =='png') $fuente = @imagecreatefrompng($ruta);*/

	$imgAlto = @imagesy($fuente);
	$imgAncho = @imagesx($fuente);
	
	//obtenemos el nuevo alto y ancho de la imagen redimensionada
	if ($imgAlto>$tam_max or $imgAncho>$tam_max){
		//tenemos que redimensionar
		if ($imgAlto>$imgAncho){
			//redimensionamos en funcion de y
			//calculamos el % que hay que redimensionar
			$porc_alto=($max_tam*100)/$imgAlto;
			$alto=$max_tam;
			//calculamos el nuevo_ancho
			$ancho=($imgAncho*$porc_alto)/100;
		}
		else{
			//redimensionamos en funcion de x
			//calculamos el % que hay que redimensionar
			$porc_ancho=($max_tam*100)/$imgAncho;
			$ancho=$max_tam;
			//calculamos el nuevo_ancho
			$alto=($imgAlto*$porc_ancho)/100;
		}
		//ya tenemos los nuevos tamaños asi que redimensionamos
		$imagen = @imagecreatetruecolor($ancho,$alto); 
		
		@imagecopyresized($imagen,$fuente,0,0,0,0,$ancho,$alto,$imgAncho,$imgAlto); 
		
		switch ($extension) {
			case 'jpg':{
				if (file_exists($destino)) @unlink ($destino);
				@imagejpeg($imagen,$destino,$calidad);
			};break;
			case 'png':{ 
				if (file_exists($destino)) @unlink ($destino);
				@imagepng($imagen,$destino);
			};break;
			case 'gif':{
				if (file_exists($destino)) @unlink ($destino);
				@imagegif($imagen,$destino);
			};break;
			/*case 'bmp':{
				if (file_exists($destino)) @unlink ($destino);
				@imagewbmp($imagen,$destino);
			};break;*/
		}
		/*
		if ($extension==='jpg'){
			if (file_exists($destino)) @unlink ($destino);
			@imagejpeg($imagen,$destino,$calidad);
		}
		else {
			if ($extension==='png') 
				@imagepng($imagen,$destino,$calidad);
		}*/
		@imagedestroy($imagen);
	}

	@imagedestroy($fuente);
}
function tam_fijo($ruta,$destino,$calidad, $ancho, $alto, $extension){
	switch ($extension) {
		case 'jpg': $fuente = @imagecreatefromjpeg($ruta);break;
		case 'png': $fuente = @imagecreatefrompng($ruta);break;
		case 'gif': $fuente = @imagecreatefromgif($ruta);break;
		//case 'bmp': $fuente = @imagecreatefromwbmp($ruta);break;
	}		
/*	if ($extension =='jpg')	$fuente = @imagecreatefromjpeg($ruta); 
	else if ($extension =='png') $fuente = @imagecreatefrompng($ruta);*/

	$imgAlto = @imagesy($fuente);
	$imgAncho = @imagesx($fuente);
	
	//ya tenemos los nuevos tamaños asi que redimensionamos
	$imagen = @imagecreatetruecolor($ancho,$alto); 
	
	@imagecopyresized($imagen,$fuente,0,0,0,0,$ancho,$alto,$imgAncho,$imgAlto); 
	
		switch ($extension) {
			case 'jpg':{
				if (file_exists($destino)) @unlink ($destino);
				@imagejpeg($imagen,$destino,$calidad);
			};break;
			case 'png':{ 
				if (file_exists($destino)) @unlink ($destino);
				@imagepng($imagen,$destino);
			};break;
			case 'gif':{
				if (file_exists($destino)) @unlink ($destino);
				@imagegif($imagen,$destino);
			};break;
			/*case 'bmp':{
				if (file_exists($destino)) @unlink ($destino);
				@imagewbmp($imagen,$destino);
			};break;*/
		}
/*	if ($extension==='jpg'){
		if (file_exists($destino)) @unlink ($destino);
		@imagejpeg($imagen,$destino,$calidad);
	}
	else {
		if ($extension==='png') 
			@imagepng($imagen,$destino,$calidad);
	}*/
	@imagedestroy($imagen);

	@imagedestroy($fuente);
}

function cambiar_tam($ruta, $destino, $calidad, $max_alto, $max_ancho, $extension){
	switch ($extension) {
		case 'jpg': $fuente = @imagecreatefromjpeg($ruta);break;
		case 'png': $fuente = @imagecreatefrompng($ruta);break;
		case 'gif': $fuente = @imagecreatefromgif($ruta);break;
		//case 'bmp': $fuente = @imagecreatefromwbmp($ruta);break;
	}		
	/*if ($extension =='jpg')	$fuente = @imagecreatefromjpeg($ruta); 
	else if ($extension =='png') $fuente = @imagecreatefrompng($ruta);*/

	$imgAlto = @imagesy($fuente);
	$imgAncho = @imagesx($fuente);
	if ($max_ancho>$imgAncho) $difAncho=$max_ancho-$imgAncho;
	else $difAncho=$imgAncho-$max_ancho;
	if ($max_alto>$imgAlto) $difAlto=$max_alto-$imgAlto;
	else $difAlto=$imgAlto-$max_alto;
	if ($imgAlto>$max_alto or $imgAncho>$max_ancho){
		//obtenemos el nuevo ancho y alto
		if ($difAlto>$difAncho) {
			//ajustamos al alto
			$porc_alto=($max_alto*100)/$imgAlto;
			$alto=$max_alto;
			//calculamos el nuevo_ancho
			$ancho=($imgAncho*$porc_alto)/100;
		}
		else{
			//ajustamos al ancho
			$porc_ancho=($max_ancho*100)/$imgAncho;
			$ancho=$max_ancho;
			//calculamos el nuevo_ancho
			$alto=($imgAlto*$porc_ancho)/100;
		}
	}
	else{
		$alto=$imgAlto;
		$ancho=$imgAncho;
 	}
		//ya tenemos los nuevos tamaños asi que redimensionamos
		$imagen = @imagecreatetruecolor($ancho,$alto); 
		@imagecopyresized($imagen,$fuente,0,0,0,0,$ancho,$alto,$imgAncho,$imgAlto); 
		
		switch ($extension) {
			case 'jpg':{
				if (file_exists($destino)) @unlink ($destino);
				@imagejpeg($imagen,$destino,$calidad);
			};break;
			case 'png':{ 
				if (file_exists($destino)) @unlink ($destino);
				@imagepng($imagen,$destino);
			};break;
			case 'gif':{
				if (file_exists($destino)) @unlink ($destino);
				@imagegif($imagen,$destino);
			};break;
			/*case 'bmp':{
				if (file_exists($destino)) @unlink ($destino);
				@imagewbmp($imagen,$destino);
			};break;*/
		}
/*
		if ($extension==='jpg')
			@imagejpeg($imagen,$destino,$calidad);
		else {
			if ($extension==='png') 
				@imagepng($imagen,$destino,$calidad);
		}*/
		@imagedestroy($imagen);
	@imagedestroy($fuente);
}
function cambiar_tam2($ruta, $destino, $calidad, $max_alto, $max_ancho, $extension){
	switch ($extension) {
		case 'jpg': $fuente = @imagecreatefromjpeg($ruta);break;
		case 'png': $fuente = @imagecreatefrompng($ruta);break;
		case 'gif': $fuente = @imagecreatefromgif($ruta);break;
//		case 'bmp': $fuente = imagecreatefromwbmp($ruta);break;
	}		
	/*if ($extension =='jpg')	$fuente = @imagecreatefromjpeg($ruta); 
	else if ($extension =='png') $fuente = @imagecreatefrompng($ruta);*/

	$imgAlto = @imagesy($fuente);
	$imgAncho = @imagesx($fuente);
	if ($max_ancho>$imgAncho) $difAncho=$max_ancho-$imgAncho;
	else $difAncho=$imgAncho-$max_ancho;
	if ($max_alto>$imgAlto) $difAlto=$max_alto-$imgAlto;
	else $difAlto=$imgAlto-$max_alto;
	if ($imgAlto>$max_alto or $imgAncho>$max_ancho){
		$porc_alto=($max_alto*100)/$imgAlto;
		$porc_ancho=($max_ancho*100)/$imgAncho;
		//obtenemos el nuevo ancho y alto
		if ($porc_alto<$porc_ancho) {
			//ajustamos al alto
			$alto=$max_alto;
			//calculamos el nuevo_ancho
			$ancho=($imgAncho*$porc_alto)/100;
		}
		else{
			//ajustamos al ancho
			$ancho=$max_ancho;
			//calculamos el nuevo_ancho
			$alto=($imgAlto*$porc_ancho)/100;
		}
	}
	else{
		$alto=$imgAlto;
		$ancho=$imgAncho;
 	}
		//ya tenemos los nuevos tamaños asi que redimensionamos
		$imagen = @imagecreatetruecolor($ancho,$alto); 
		@imagecopyresized($imagen,$fuente,0,0,0,0,$ancho,$alto,$imgAncho,$imgAlto); 

		switch ($extension) {
			case 'jpg':{
				if (file_exists($destino)) @unlink ($destino);
				@imagejpeg($imagen,$destino,$calidad);
			};break;
			case 'png':{ 
				if (file_exists($destino)) @unlink ($destino);
				@imagepng($imagen,$destino);
			};break;
			case 'gif':{
				if (file_exists($destino)) @unlink ($destino);
				@imagegif($imagen,$destino);
			};break;
			/*case 'bmp':{
				if (file_exists($destino)) @unlink ($destino);
				@imagewbmp($imagen,$destino);
			};break;*/
		}
/*
		if ($extension==='jpg')
			@imagejpeg($imagen,$destino,$calidad);
		else {
			if ($extension==='png') 
				@imagepng($imagen,$destino,$calidad);
		}*/
		@imagedestroy($imagen);
	@imagedestroy($fuente);
}

?>