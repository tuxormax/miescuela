<?php


function comprobarconfig() 
{
	$band=0;
	$ruta = "php/";
	$arch = "config.php";
	$dir = opendir($ruta) or die ("no se puede abrir el directorio");
	while($archivo = readdir($dir)) 
	  {
		if($archivo == $arch) 
		{
			$band= 1;
		}
	}
	if(band==0)
	{
		$ruta = "instalacion/";
		$arch = "instalar.html";
		$dir = opendir($ruta) or die ("no se puede abrir el directorio");
		while($archivo = readdir($dir)) 
		{
			if($archivo == $arch) 
			{
				$band = 2;
			}		
		}
	}
return $band;
}//fin comprobarinstalar

$bandera=comprobarconfig();

//echo "Valor de bandera:". $bandera;


if($bandera==1) 
{
	include(__DIR__. '/html/login.html');
}

else if($bandera==2) 
{
	include(__DIR__. '/instalacion/instalar.html');
}

else if ($bandera==0) 
{
	echo "No se encontro nada";
}


?>
