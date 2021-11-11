<?php  
	
	require 'ListaUsuarios.php';

	if (isset($_GET['usuario'],$_GET['contra'])) {
		
		//datos fichero
		$path = "datos/";
		$fichUsu = "usuarios.txt";

		$usu = $_GET['usuario'];
		$pass = $_GET['contra'];

		$listaUsu= new ListaUsuarios($path,$fichUsu);

		if($listaUsu->login($usu,$pass)){
			echo "estas dentro";
		}else{
			echo "te quedaste fuera";
		}

	}else{
		echo "Error en el login";
	}