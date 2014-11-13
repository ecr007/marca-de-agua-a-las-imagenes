<?php 
  $estampa = imagecreatefrompng('IKEA_logo_header.png');
	$im = imagecreatefromjpeg('http://1.bp.blogspot.com/_1JlM28kcWSA/S9MoBqPVxDI/AAAAAAAAAA8/q1vKSsNBquU/s1600/imagen2.jpg');

	// Establecer los márgenes para la estampa y obtener el alto/ancho de la imagen de la estampa
	$margen_dcho = -10;
	$margen_inf = 100;
	$sx = imagesx($estampa);
	$sy = imagesy($estampa);


	// Copiar la imagen de la estampa sobre nuestra foto usando los índices de márgen y el
	// ancho de la foto para calcular la posición de la estampa. 
	imagecopy($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa));

	// Imprimir y liberar memoria
	ob_start();
	//header('Content-type: image/jpg');
	imagejpeg($im);
	//imagedestroy($im);

	$image_data = ob_get_contents (); 

	ob_end_clean ();

	$image_data_base64 = base64_encode ($image_data);
	

	echo "<img src='data:image/jpeg;base64," . $image_data_base64."'>"; //saviour line!
?>
