<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
class CrudController{
    public function index(){
        //echo "Controlador usuarios, Accion index";
        require_once 'views/crud/index.html';
    }

}
?>
