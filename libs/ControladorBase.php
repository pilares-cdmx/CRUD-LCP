<?php
class ControladorBase{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';

        foreach (glob("models/*.php") as $file) {
            require_once $file;
        }
    } 

    public function view($vista, $datos){
        foreach($datos as $id_assoc => $valor){
            ${$id_assoc} = $valor;
        }

        require_once 'libs/AyudaVistas.php';
        $helper=new AyudaVistas();

        require_once 'views/'.$vista.'View.php';
    }

    public function redirect($controlador=CONTROLADORPOR_DEFECTO, $action=ACCION_DEFECTO){
        header("Location: index.ph?controller=".$controlador."&action=");
    }
}

?>