<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php
		if(isset($_REQUEST['texto'])){
			//abrir el fichero

			$camino ="datos\\";
			$nomFich = "datos.txt";

			$af = fopen($camino.$nomFich,"a");
			

			//tratar el fichero

			$salida = fwrite($af,$_REQUEST['texto']);

			if (!$salida) {
				echo "no se pudo escribir en el fichero";
			}

			//cerrar el fichero

			if(fclose($af)){
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