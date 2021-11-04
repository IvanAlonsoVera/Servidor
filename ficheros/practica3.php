<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>escritura</title>
</head>
<body>
	<h1>Escritura y creacion de fichero</h1>

	<?php
		if(isset($_REQUEST['texto'])){
			//abrir el fichero

			$camino ="datos\\";
			$nomFich = "datos.txt";

			$fe = fopen($camino.$nomFich,"w");
			

			//tratar el fichero

			$salida = fwrite($fe,$_REQUEST['texto']);

			if (!$salida) {
				echo "no se pudo escribir en el fichero";
			}

			//cerrar el fichero

			if(fclose($fe)){
				echo "fichero guardado";
			}else{
				echo "fichero no guardado";
			}

		}else{
			echo "no esta el texto para guardar";
		}
	?>
</body>
</html>