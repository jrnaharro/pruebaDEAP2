<?php
session_start();
//--------- Codigo de validacion ------
$longitud=4;
$codi="";
for ($i=1; $i<=$longitud; $i++)
{
$letra = chr(rand(48,57));
$codi .= $letra;
} 
$captcha=$codi; 
$_SESSION['captcha']=$captcha;
//------------------------------------

// Carácteres usados en el código
$letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// Configuración del tamaño de la imágen y de la fuente
$ancho_caja = 100;
$alto_caja = 25;
$tam_letra = 9;
$tam_letra_grande = 19;

// Angulo de rotación de las letras
$angmax = 10;

// Formato de la imágen
header("Content-type: image/png");

// Crear la imágen
$im = imagecreate($ancho_caja, $alto_caja);

// Colores ha usar
$gris = ImageColorAllocate($im, 155,0,0);
$colorLetra = ImageColorAllocate($im, 255,255,255);
$colorLetraFondo = ImageColorAllocate($im, 170, 170, 170);

// Tipo de letra
$fuente = $_SERVER['DOCUMENT_ROOT'].'/comun/verdana.ttf';

// Calculo el número de líneas que entran
$caja_texto = imagettfbbox($tam_letra, 0, $fuente , $letras);
$alto_linea = abs($caja_texto[7]-$caja_texto[1]);
$num_lineas = intval($alto_caja / $alto_linea)+1;

// Dibujar el fondo de la imágen
$pos = 0;
for ($i = 0; $i<$num_lineas; $i++)
{
$x = 0;
for ($j = 0; $j<30; $j++) 
{
$texto_linea = $letras[rand(0, strlen($letras)-1)].' ';
$caja_texto = imagettfbbox($tam_letra, 0, $fuente , $texto_linea);
imagettftext($im, $tam_letra, rand(-$angmax, $angmax), $x, $alto_linea*$i, $colorLetraFondo, $fuente , $texto_linea);
// Posicion x de la siguiente letra
$x += $caja_texto[2] - $caja_texto[0];
}
}
// Escribir las cuatro letras del CAPTCHA

$res=$_SESSION['captcha']; //El valor lo recuperamos de la session abierta

$ang1 = rand(-$angmax, $angmax);
$caja_texto = imagettfbbox($tam_letra_grande, $ang1, $fuente , $res[0]);
$y1 = abs($caja_texto[7]-$caja_texto[1]);
$x1 = abs($caja_texto[2]-$caja_texto[0]);
$res .= $letras[rand(0, strlen($letras)-1)]; 
$ang2 = rand(-$angmax, $angmax);
$caja_texto = imagettfbbox($tam_letra_grande, $ang2, $fuente , $res[1]);
$y2 = abs($caja_texto[7]-$caja_texto[1]);
$x2 = abs($caja_texto[2]-$caja_texto[0]);
$res .= $letras[rand(0, strlen($letras)-1)]; 
$ang3 = rand(-$angmax, $angmax); 
$caja_texto = imagettfbbox($tam_letra_grande, $ang3, $fuente , $res[2]);
$y3 = abs($caja_texto[7]-$caja_texto[1]);
$x3 = abs($caja_texto[2]-$caja_texto[0]);
$caja_texto = imagettfbbox($tam_letra_grande, $ang2, $fuente , $res[3]);
$y3 = abs($caja_texto[7]-$caja_texto[1]);
$x3 = abs($caja_texto[2]-$caja_texto[0]);


imagettftext($im, $tam_letra_grande, $ang1, ($ancho_caja/2)-(($x1+$x2+$x3)/2), $y1+($alto_caja-$y1)/2, $colorLetra, $fuente , $res[0]);
imagettftext($im, $tam_letra_grande, $ang2, ($ancho_caja/2)-(($x1+$x2+$x3)/2)+($x1), $y2+($alto_caja-$y2)/2, $colorLetra, $fuente , $res[1]);
imagettftext($im, $tam_letra_grande, $ang3, ($ancho_caja/2)-(($x1+$x2+$x3)/2)+($x1+$x2), $y3+($alto_caja-$y3)/2, $colorLetra, $fuente , $res[2]);
imagettftext($im, $tam_letra_grande, $ang3, ($ancho_caja/2)-(($x1+$x2+$x3)/2)+($x1+$x2+$x3), $y3+($alto_caja-$y3)/2, $colorLetra, $fuente , $res[3]); 
imagepng($im);
imagedestroy($im);
imagedestroy($im2);
?>