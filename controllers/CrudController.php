<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
class CrudController{
    public function index(){
        //echo "Controlador usuarios, Accion index";
        require_once 'views/crud/login.php';
    }

    public function forgotPassword(){
        require_once 'views/crud/forgot-password.php';
    }

    public function register(){
        require_once 'views/crud/register.php';
    }

    public function registroExitoso(){
        require_once 'views/crud/index.php';
    }

    public function charts(){
        require_once 'views/crud/charts.php';
    }

    public function users(){
        require_once 'views/crud/tables.php';
    }


}
?>
