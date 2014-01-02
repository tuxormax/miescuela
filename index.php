<?php


function comprobarconfig() 
{
	/*
	 * Función para comprobar la configuración
	 * existente del usuario
	 *
	 * ~miescuela 2/1/2014
	 */
	$band=0;
	$ruta = "php/";
	$arch = "config.php";
	$dir = @opendir($ruta);
	while($archivo = @readdir($dir)) 
	  {
		if($archivo == $arch) 
		{
			$band= 1;
		}
	}
	if($band==0)
	{
		$ruta = "instalacion/";
		$arch = "instalar.html";
		$dir = opendir($ruta) or die ("<p class='noticia'>No se puede abrir el directorio</p>");
		while($archivo = readdir($dir)) 
		{
			if($archivo == $arch) 
			{
				$band = 2;
			}		
		}
	}
return $band;
}

$bandera=comprobarconfig();

if($bandera==1) 
{
	/*
	 * Ejecutamos el login
	 *
	 * ~miescuela 2/1/2014
	 */
	@include(__DIR__. '/html/login.html');
}

else if($bandera==2) 
{
	/*
	 * Ejecutamos la instalación
	 *
	 * ~miescuela 2/1/2014
	 */
	@include(__DIR__. '/instalacion/instalar.html');
}

else if ($bandera==0) 
{
	echo "No se encontro nada";
}


?>
