<?php
	$camino = "C:\\xampp\\htdocs\\Servidor\\ficheros\\datos\\";
	$fich = "en un.txt";
	if (file_exists($camino.$fich)){
		echo "el fichero existe";
		leerFichero($camino.$fich);
	}else{
		echo "el fichero NO existe";
	}

	function leerFichero($f)	{

		
		//abrir el fichero, r es el modo lectura
		$mf = fopen($f, "r") or die ("Imposible abrir el fichero");
		//tratar el contenido del fichero
		while (!feof($mf)) {
			$linea = fgets($mf);
			$lineaEx = explode(" ",$linea);

			for ($i=0; $i < sizeof($lineaEx); $i++) {

				if ($lineaEx[$i] != "=") {
					if (strlen($lineaEx[$i])<=4) {
						$palCorta[] = $lineaEx[$i] ;
					}else{
						$palLarga[] =  $lineaEx[$i];
					}
				}else{
					continue;
				}
			}
		}
		echo "<h3>Palabras cortas</h3>";
		imprimirLista($palCorta);
		echo "<hr>";
		echo "<h3>Palabras largas</h3>";
		imprimirLista($palLarga);
	
		//cerrar el fichero SIEMPRE PONER ANTES DE PROBAR
		fclose($mf);
	}
	function imprimirLista($array){
		echo "<ul>";
		for ($i=0; $i < sizeof($array); $i++) { 
			echo "<li>".$array[$i]."</li>";
		}
		echo "</ul>";
	}
?>