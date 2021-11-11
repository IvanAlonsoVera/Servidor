<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	//los ficheros con las clases
	require 'usuario.php';
	require 'ListaUsuarios.php';

	//comprueba que recibe usuario y pass
	if (isset($_GET['usuario'], $_GET['contra'])) {
		registrarUsuario();
	}else{
		echo "Falta usuario o la contraseña";
	}

	function registrarUsuario(){

		//datos fichero
		$path = "datos/";
		$fichUsu = "usuarios.txt";

		//datos de entrada
		$nom = $_GET['nombre'] ?? '';
		$ape = $_GET['apellidos'] ?? '';
		$cor = $_GET['correo'] ?? '';
		$usu = $_GET['usuario'];
		$pass = $_GET['contra'];

		//se crea el ojeto reg y lista usu
		$reg = new Usuario($nom, $ape, $cor, $usu, $pass);
		$listaUsu= new ListaUsuarios($path,$fichUsu);

		if($listaUsu->noExisteUsuario($reg->getUsu())){
			$fu=fopen($path.$fichUsu,"a");
			fputs($fu,$reg->creeLineaFichero()."\n");
			fclose($fu);
		}else{
			echo "Error en el registro";
		}
		

		$reg->creeLineaFichero();

	}
?>
</body>
</html>
