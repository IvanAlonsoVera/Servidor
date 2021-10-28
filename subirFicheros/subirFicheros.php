<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>2</title>
</head>
<body>
	<?php
	
		//COMPROBAR QUE EL FORMULARIO ES NUESTRO Y QUE NO HAY ERRORES

		if (isset($_POST['seguro'])
			&&(count($_FILES) == 3)
			&&($_FILES["fichero"]["error"] == 0)
			&&($_FILES["fichero1"]["error"] == 0)
			&&($_FILES["fichero2"]["error"] == 0)) {
		  
			//variables con informacion
			$destino ="imagenes/"; //directorio de destino

			foreach ($_FILES as $info) {
				$ficheroDestino=$destino.$_FILES['fichero']["name"]; //nombre del fichero recibido

				//COMPROBAR QUE EL FICHERO NO ESTA COPIADO 2 VECES

				if (file_exists($ficheroDestino)){
			  		echo "ya existe".$ficheroDestino;

			  	//COMPROBAR TAMAÑO

			  	}else if($info["size"]>50000){
			  		echo "perdona el tamaño es excesivo";

			  	//COMPROBAR LA EXTENSION

			  	}else if (strtolower(pathinfo($ficheroDestino,PATHINFO_EXTENSION)) != "txt") {
			  		echo "perdona la extension no es correcta";

			  	//COMPROBAR EL TIPO DE DATO

			  	}else if ($info["type"]!= "text/plain"){
			  		echo "perdona el tipo no es correcto";

			  	//SI TODO SALE BIEN LO COPIAMOS

			  	}else{
			  		echo "vamos a copiar ".$info["tmp_name"]." a ".$ficheroDestino;
			 		move_uploaded_file($info["tmp_name"],$ficheroDestino);
			 	}
			}
		}else{
			echo "peticion incorrecta";
		}
	?>
</body>
</html>