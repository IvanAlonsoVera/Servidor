<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	require 'usuario.php';
	require 'ListaUsuarios.php';

	if (isset($_GET['usuario'], $_GET['contra'])) {
		registrarUsuario();
	}else{
		echo "Falta usuario o la contraseña";
	}

	function registrarUsuario(){

		$path = "datos/";
		$fichUsu = "usuarios.txt";

		$nom = $_GET['nombre'] ?? '';
		$ape = $_GET['apellidos'] ?? '';
		$cor = $_GET['correo'] ?? '';
		$usu = $_GET['usuario'];
		$pass = $_GET['contra'];

		$reg = new Usuario($nom, $ape, $cor, $usu, $pass);
		$listaUsu= new ListaUsuarios($path.$fichUsu);

		$fu=fopen($path.$fichUsu,"a");

		if($listaUsu->noExisteUsuario($reg->getUsu())){
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
