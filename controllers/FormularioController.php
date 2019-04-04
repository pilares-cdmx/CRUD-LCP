<?php
class FormularioController{
    public function index(){
        require_once 'views/usuario/registro.php';  
    }
    
    
    /*
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $usuario=new Usuario();

        $allusers= $usuario->getAll();


        $this->view("index", array(
            "allusers"=>$allusers,
            "Hola" => "Ejemplo de MVC"
        ));
    }

    public function crear(){
        if (isset($_POST["nombre"])) {
            $usuario=new Usuario();

            $nombre=$_POST["nombre"];

            $usuario->setNombre($nombre);

            $save= $ususario->save();
            
        }

        $this->redirect("formulario", "index");
    }

    public function borrar(){
        if(isset($_GET["id"])){
            $id=(int)$_GET["id"];

            $ususario = new Ususario();
            $ususario->deleteById($id);

            $this->redirect();
        }
    }
   */

}

?>

