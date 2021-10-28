<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>La primitiva</title>
</head>
<body>
	<h1>El resultado de tu apuesta</h1>
	<?php

		//comprobar cuantos numeros se ha acertado y sacar la categoria y el paston si tiene premio

		$numPremiados = [0,0,0,0,0,0];
		$complementario = 0;
		$reintegro = -1;

		tratarFichero();

		if(CompruebaNumeros()){
			$categoria = categoriaAcertada();
			switch ($categoria) {
				case '0':
					echo "Premio Spesial";
					break;
				case '1':
					echo "Categoria 1";
					break;
				case '2':
					echo "Categoria 2";
					break;
				case '3':
					echo "Categoria 3";
					break;
				case '4':
					echo "Categoria 4";
					break;
				case '5':
					echo "Categoria 5";
					break;
				case '6':
					echo "Categoria 6";
					break;
				case '7':
					echo "Sin Premios";
					break;
				default:
					echo "Error en la categoria";
					break;
			}
		}

		function CompruebaNumeros(){
			$res = true;

			if(isset($_GET['n1'],$_GET['n2'],$_GET['n3'],$_GET['n4'],$_GET['n5'],$_GET['n6'],$_GET['reintegro'])&&count($_GET)==7){

				foreach ($_GET as $num) {
					if (!is_numeric($num)) {
						$res=false;
						break;
					}
				}

				if ($res) {
					if ($_GET['n1']<1 || $_GET['n1']>49) {
						$res=false;
					} else if ($_GET['n2']<1 || $_GET['n2']>49) {
						$res=false;
					} else if ($_GET['n3']<1 || $_GET['n3']>49) {
						$res=false;
					} else if ($_GET['n4']<1 || $_GET['n4']>49) {
						$res=false;
					} else if ($_GET['n5']<1 || $_GET['n5']>49) {
						$res=false;
					} else if ($_GET['n6']<1 || $_GET['n6']>49) {
						$res=false;
					} else if ($_GET['reintegro']<0 || $_GET['reintegro']>9) {
						$res=false;
					}
				}
			}else{
				$res=false;
			}
			return $res;
		}

		function categoriaAcertada(){
			return 7;
		}
		function tratarFichero(){
			//variables numeros premiados
			global $numPremiados;
			global $complementario;
			global $reintegro;

			$nomFichero="datos/numerosAcertados.txt";
			//validar
			if(file_exists($nomFichero)){
			//abrir
				$mf = fopen($nomFichero,"r");
			//tratar
				echo fgets($mf)."<br>"; //lista de numeros acertados
				$c = fgets($mf); // el complementario
				$cpartido = explode(":" , $c);
				$complementario=$cpartido[1];
				echo "el complementario premiado es:".$complementario;

				echo fgets($mf)."<br>"; // el reintegro

			//cerrar
				fclose($mf);
			}else{
				echo "error";
			}
			

		}


	?>
</body>
</html>