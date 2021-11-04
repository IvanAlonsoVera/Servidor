<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ahorcado</title>
</head>
<body>
	<?php

	$palabra = "manzana";
	$letrasAdivinadas="";
	$letrasIntroducidas="--";
	$vidas = 7;
	$primeraVez;


	escogerPalabra();

		//comprobar que se recibe la variable y que tiene un valor valido
		if (isset($_GET["jugando"])&& $_GET["jugando"]=="n"){
			
			//estamos empezando a jugar
			if(isset($_GET["jugar"])){
				$primeraVez=true;

				// se recibio la variable jugar con s o con n

				$j = $_GET["jugar"];

				if($j == "s"){
					jugar();
				}else if($j == "n"){
					nojugar();
				}else{
					echo "No has dicho si quieres jugar o no";
				}

			}else{
				echo "No has dicho si quieres jugar o no";
			}


		}else if (isset($_GET["jugando"])&& $_GET["jugando"]=="s") {
			jugar();
		}else{
			echo "error en el juego";
		}
	
	

	function jugar(){

		global $palabra;
		global $vidas;
		global $primeraVez;
		global $letrasAdivinadas;
		global $letrasIntroducidas;

		if ($primeraVez) {
				
			echo "Bienvenido al juego del AHORCADO <br><br>";

			echo "Tienes ".$vidas." vidas <br>";

			$nletras = strlen($palabra);

			echo "<br>Letras de la palabra: <br><h1>";

			for ($i=0; $i < $nletras; $i++) { 
				$letrasAdivinadas .="-";
			}
			echo "$letrasAdivinadas";
			echo "</h1><br>";

			$primeraVez=false;
		}else{
			if(isset($_GET["letra"])){

				$l = $_GET["letra"];


				$vidas =  $_COOKIE["vidas"];
				$palabra = descesar($_COOKIE['palabra']);
				$letrasAdivinadas = $_COOKIE["letrasAdivinadas"];
				$letrasIntroducidas = $_COOKIE["letrasIntroducidas"];
		        if(validarLetra($l)){
					echo "Me has pasado la letra:".$l;

					//Comprobar que la letra esta en la palabra
                     $letraEncontrada= false;
					for ($i=0; $i < strlen($palabra) ; $i++) { 
						if($palabra[$i] ==$l){
							$letraEncontrada= true;
							$letrasAdivinadas[$i] = $l[0];
							}
               	}
                   // si la letra no esta perdemos una vida
                  if(!$letraEncontrada){
                  	$vidas--;
                  }

                  echo "<br>Letras que tienes adivinadas: <br>".$letrasAdivinadas."<br>";

                  echo "<br>tienes $vidas vidas";

                  $letrasIntroducidas .= $l[0]."-";
                  echo "Estas son las letras que has utilzido: ".$letrasIntroducidas;

					//validar si acaba la partida
                    if(acabaPartida()){
                       echo "<h1>Fin de la partida</h1>";
                     	if($vidas==0){
                     		echo "<h1>Perdiste</h1>";
                       	}else{
                       		echo "<h1>Ganaste</h1>";
                       	}
                    }
				}else{
					echo "<h3>Error: la letra no es valida</h3>";
				}
			}
		}

	?>

		<form action="ahorcado.php" method="GET">
			<input type="hidden" name="jugando" value="s">
<?php
		global $vidas;
		global $palabra;
//	echo "\t\t<input type=\"hidden\" name=\"vidas\" value=\"".$vidas."\">\n";
//	echo "\t\t<input type=\"hidden\" name=\"palabra\" value=\"".$palabra."\">\n";
//	echo "\t\t<input type=\"hidden\" name=\"letrasAdivinadas\" value=\"".$letrasAdivinadas."\">\n";
//	echo "\t\t<input type=\"hidden\" name=\"letrasIntroducidas\" value=\"".$letrasIntroducidas."\">\n";

		setcookie("vidas",$vidas,time()+3600);
		setcookie("palabra",cesar($palabra),time()+3600);
		setcookie("letrasAdivinadas",$letrasAdivinadas,time()+3600);
		setcookie("letrasIntroducidas",$letrasIntroducidas,time()+3600);
?>
			<label for="letra">Introduce una letra</label>
			<input type="text id" id="letra" name="letra">
			<input type="submit" value="Enviar">
		</form>

	<?php
	}


	//funcion para validar si la letra es una minuscula
	function validarLetra($ltr){
		$res = true;

		if(strlen($ltr)!=1){
			$res=false;
		}else{
			if($ltr[0]<'a' || $ltr[0]>'z'){
				$res = false;
			}
		}
		return $res;
	}

		function nojugar(){
			echo "Adios pero ¿porque no juegas? <br>";
			echo '<a href="http://localhost/SERVIDOR/Ahorcado/">Volver a la pagina</a>';
		}
	function escogerPalabra(){
		global $palabra;

		$listaPalabras = ["manzana","pera","aguacate","naranja","pomelo"];

		$numAleatorio=rand(0,count($listaPalabras)-1);

		$palabra = $listaPalabras[$numAleatorio];
	}
	function acabaPartida(){

		global $vidas;
		global $letrasAdivinadas;

		$fin = false;

		if($vidas<=0){
			$fin=true;
		}
		/*
			el uso de strrpos me dice falso si el caracter buscado NO está
			dentro de la cadena. Si lo encuentra me da un numero entero con
			la posición del caracter.
		*/
		if (strrpos($letrasAdivinadas, "-") === false) {
			$fin = true;
		}
//	if(!str_contains($letrasAdivinadas,"-")){
//		$fin=true;
//	}

		return $fin;
	}

	function cesar($p){

		$abc = "abcdefghijklmnopqrstuvwxyz";

		$res ="";

		for ($i=0; $i < strlen($p); $i++) { 
			$pos = strpos($abc, $p[$i]);
			$pos++;
			if($pos==26){
				$pos=0;
			}
			$res .= $abc[$pos];
		}

		return $res;
	}

	function descesar($p){
		$abc = "abcdefghijklmnopqrstuvwxyz";
		$res="";
		for ($i=0; $i < strlen($p); $i++) { 
			$pos = strpos($abc, $p[$i]);
			$pos--;
			if($pos==-1){
				$pos=25;
			}
			$res .= $abc[$pos];
		}
		
		return $res;
	}



	?>
</body>
</html>