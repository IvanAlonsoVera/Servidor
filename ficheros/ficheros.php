<?php
	$camino = "C:\\xampp\\htdocs\\Servidor\\ficheros\\datos\\";
	$fich = "practica.txt";
	if (file_exists($camino.$fich)){
		echo "el fichero existe";
		leerFichero($camino.$fich);
	}else{
		echo "el fichero NO existe";
	}

	function leerFichero($f)	{

		//abrir el fichero r --> modo lectura
		$mf = fopen($f, "r")or die("imposible abrir el fichero!");

		//tratar el fichero
		echo '<table border= 1px>';
			while (!feof($mf)) {
				$linea = fgets($mf);
				$lineaex = explode("=", $linea);
				echo "<tr>";
				echo "<td>";echo $lineaex[0];echo "</td>";
				echo "<td>";echo $lineaex[1];echo "</td>";
				echo "</tr>";
			}
		echo "</table>";


		//cerrar el fichero
		fclose($mf);
	}
?>