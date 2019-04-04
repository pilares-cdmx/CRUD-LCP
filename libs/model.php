<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
/**
 * clase Model de esta clase heredarán todos los archivos de la carpeta model
 *  solo contiene una instancia de la Clase Database
 */
	class Model{
		function __construct(){
			$this->db = new DBController();
		}
	}
?>
