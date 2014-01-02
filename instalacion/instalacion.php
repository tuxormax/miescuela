<?php 

	/*
	 * Creamos la configuración del script
	 *
	 * ~miescuela 2/1/2014
	 */
	 

	$nombre_temp = tempnam("php/", "");  //creacion del archivo
	$gestor = fopen($nombre_temp, "w");  //abre el directorio

	@fwrite($gestor,"<?php\n \$dbuser = '".$usuariobd."';\n \$dbpass = '".$contrausubd."';\n \$dbname = '".$nombrebd."';\n \$host = '".$nombrehost."';\n?>");
	fclose($gestor); //cerrar edicion
	@rename($nombre_temp,"php/config.php");

	// Nombre del archivo
	$filename = 'instalarmysql.sql';

	@$nombrehost = $_POST["NombreHost"];
	@$nombrebd = $_POST["NombreBD"];
	@$usuariobd = $_POST["UsuarioBD"];
	@$contrausubd = $_POST["ContraUsuBD"];
	@$CONTRAUSUBD = md5($contrausubd);
	@$correo = $_POST["CorreoRoot"];
	if(@$nombrebd == "") {
	  echo "llene todos los campos";
	}
	else {
	@crearconfig($usuariobd,$CONTRAUSUBD,$nombrebd,$nombrehost);

	mysql_connect($nombrehost, $usuariobd, $CONTRAUSUBD) or die('Error connecting to MySQL server: ' . mysql_error());
	// Seleccionar DB
	mysql_select_db($nombrebd) or die('Error selecting MySQL database: ' . mysql_error());
	// Temporary variable, used to store current query
	$templine = '';
	// Read in entire file
	$lines = file($filename);
	// Loop through each line
	foreach ($lines as $line)
	{
	// Skip it if it's a comment
	if (substr($line, 0, 2) == '--' || $line == '')
		continue;

	// Add this line to the current segment
	$templine .= $line;
	// If it has a semicolon at the end, it's the end of the query
	if (substr(trim($line), -1, 1) == ';')
	{
		// Perform the query
		mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
		// Reset temp variable to empty
		$templine = '';
	}
	}
	 echo "Tables imported successfully";


	// Ahora se envía el e-mail usando la función mail() de PHP
	$headers = 'From: '.$correo."\r\n".
	'Reply-To: '.$correo."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	@mail("Correo super usuario: ". $correo, "Nombre host: " . $nombrehost, "Nombre Base de datos: ". $nombrebd, "Nombre usuario BD: ".$usuariobd , "Contraseña usuario BD: ".$contrausubd);

	echo "¡El formulario se ha enviado con éxito!";
	}




  ?>
