<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
 /**
  * [View Clase encargad de la representación visual de las interfaces]
 */
	class View{
		function __construct(){

		}
		/*la vista que se cargará*/
		function render($nombre){
			require 'views/'.$nombre.'.php';
		}
	}
?>
