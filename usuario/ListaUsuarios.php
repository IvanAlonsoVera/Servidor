<?php
	class ListaUsuarios{
		//path y nombre del fichero de usuarios
		private $path;
		private $fichUsu;

		//array asociativo con la informacion de cada usuario
		private $listaUsu;

		public __construct($p,$f){
			//rellenar atributos con parametros
			$this->path=$p;
			$this->fichUsu=$f;

			$fu = fopen($p.$f,"r");

			while(!feof($fu)){
				$linea = fgets($fu);

				if(strlen($linea)!=0){
					$datosUsu = explode($linea,";");
					$listaUsu[$datosUsu[3]] = $datosUsu;
				}
			}

			fclose($fu);
		}

		public noExisteUsuatio($usu){
			return !isset($this->listaUsu[$usu]);
		}
	}