
<?php
session_start();
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
//require_once 'views/layout/headerFormulario.php';
function show_error(){
	$error = new ErrorController();
	$error->index();
}
if (isset($_GET["controller"])) {
	$nombre_controlador = $_GET["controller"].'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){

	$nombre_controlador= controller_default;

}else{
	show_error();
	exit();
}

if (class_exists($nombre_controlador)) {
	$controlador = new $nombre_controlador;

	if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
		$action = $_GET['action'];
		$controlador->$action();

	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$action_default = action_default;
		$controlador->$action_default();

	}else{
		show_error();
	}
}else {
	show_error();
}

//require_once 'views/layout/footer.php';


/**
 * [Primer archivo que lee el navegador,
 * 	importa las clases que proveen las funcionalidades de la aplicación]
 */
/*
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
	require_once 'libs/dbcontroller.php';
	require_once 'libs/controller.php';
	require_once 'libs/view.php';
	require_once 'libs/model.php';
 	require_once 'libs/app.php';
	require_once 'config/config.php';

	 $app = new App();
*/

?>
