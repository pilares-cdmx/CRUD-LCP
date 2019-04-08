<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once 'models/Responsables.php';
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

    public function ingresoExitoso(){
        require_once 'views/crud/index.php';
    }

    public function charts(){
        require_once 'views/crud/charts.php';
    }

    public function users(){
        require_once 'views/crud/tables.php';
    }


      $responsableObj = new Responsables();
      if (isset($_POST['registrarLCP']))
      {
          //VARIABLES DEL Responsable
              $nombreLCP = $_POST['nombreLCP'];
              $paternoLCP = $_POST['paternoLCP'];
              $maternoLCP = $_POST['maternoLCP'];
              $correo = $_POST['correo'];
              $contrasena = $_POST['contrasena'];
              $confirmContrasena = $_POST['confirmContrasena'];

              if($responsableObj->validarLCP($nombreLCP,$paternoLCP, $maternoLCP)){
                  $responsableObj->insertarCorreo($correo);

                  if ($contrasena == $confirmContrasena) {
                     $responsableObj->insertarContrasena($contrasena);
                     header("Location:".URL.'Crud/index');
                  }
                /*
                  session_start();
                  $array = $this->model->validar($usuario);
                  foreach ($array as $row) {
                      $_SESSION['usuario']= $row->usuario ;
                  }
                */
                  //$this->view->render('aviso-de-privacidad/index');
              }

              else{
                echo "Transaccion no concretada";
                  //$this->view->render('formulario/login');
                  //  header("Location:".URL.'Usuario/login');
              }


      }

      //VALIDAR CONTENIDO EN LAS VARIABLES O CAJAS DE TEXTO
      if (isset($_POST['acceso']))
      {
        if (empty($correo) || empty($contrasena))
        {
            header("Location:".URL.'Crud/index');
        }elseif ($responsableObj->validarPass($correo, $contrasena)) {
            header("Location:".URL.'Crud/ingresoExitoso');
        }else {
            header("Location:".URL.'Crud/index');
        }

      }




}
?>
