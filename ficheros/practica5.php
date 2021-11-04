<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php

		//variables
		$ruta ="datos\\";
		$ficherin = "ficherin.txt";
		$ficherako = "ficherako.txt";
		$pala = "pala.txt";

		//abrir
		$leer = fopen($ruta.$pala,"r");

		//tratar
		$linea = fgets($leer);

		$lineaCor = explode(" ",$linea);

		//cerrar
		fclose($leer);

		//abrimos
		$añadirin = fopen($ruta.$ficherin,"w");
		//abrimos
		$añadirko = fopen($ruta.$ficherako,"w");

		//for ($i=0; $i < sizeof($lineaCor); $i++) {
		foreach ($lineaCor as $pal) {
			if (strlen($lineaCor[$pal])<=4) {
				//tratamos
				$salida = fwrite($añadirin,$lineaCor[$pal]."\n");
			}else{
				//tratamos
				$salida = fwrite($añadirko,$lineaCor[$pal]."\n");
			}

			//comprobamos
			if (!$salida) {
				echo "no se pudo escribir en el fichero";
			}
		}
				//cerraramos
		if(fclose($añadirin)){
				echo "fichero guardado";
		}else{
				echo "fichero no guardado";
		}
						//cerraramos
		if(fclose($añadirko)){
				echo "fichero guardado";
		}else{
				echo "fichero no guardado";
		}

	?>
</body>
</html>