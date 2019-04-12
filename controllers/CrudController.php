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


    public function registrarLCP(){
      if(isset($_POST['registrarLCP']))
      {
              $responsableObj = new Responsables();
          //VARIABLES DEL Responsable
              $responsableObj->setNombre($_POST['nombreLCP']);
              $responsableObj->setApellidoPaterno($_POST['paternoLCP']);
              $responsableObj->setApellidoMaterno($_POST['maternoLCP']);
              $responsableObj->setCorreo($_POST['correo']);
              $contrasena = $_POST['contrasena'];
              $confirmContrasena = $_POST['confirmContrasena'];
//Benito Rodríguez Pérez
              if($responsableObj->validarLCP()){

                  $responsableObj->setIdResponsables();
                  $idLCP = $responsableObj->getIdResponsables();
                  $responsableObj->setIdPilares($idLCP);
                  $responsableObj->setPilares_idDireccion($idLCP);
                  $responsableObj->setPilares_idColonia($idLCP);
                  $responsableObj->setPilares_idCodigoPostal($idLCP);
                  $responsableObj->setPilares_idAlcaldiasZonas($idLCP);
                  $responsableObj->setPilares_idZonas($idLCP);

                  if($responsableObj->insertarCorreo()){
                  //var_dump($responsableObj->insertarCorreo());

                    if ($contrasena == $confirmContrasena) {
                       $responsableObj->setContrasena($contrasena);
                         if($responsableObj->insertarContrasena()){
                           header("Location:".URL.'Crud/index');
                         }else {
                           echo "no se inserto contraseña";
                         }
                    }

                  }else{
                    echo "No se guardo el correo";
                  }
                /*
                  session_start();
                  $array = $this->model->validar($usuario);
                  foreach ($array as $row) {
                      $_SESSION['usuario']= $row->usuario ;
                  }
                */
                  //$this->view->render('aviso-de-privacidad/index');
              }else{
                echo "Transaccion no concretada";
                  //$this->view->render('formulario/login');
                  //  header("Location:".URL.'Usuario/login');
              }

      }
    }

    public function login(){
      if (isset($_POST['acceso'])) {
          $responsableObj = New Responsables();

         $responsableObj->setCorreo($_POST['correoLCP']);
         $responsableObj->setContrasena($_POST['contrasenaLCP']);

          $identity = $responsableObj->validarAcceso();
          //var_dump($identity);
          if ($identity && is_object($identity)) {
            $_SESSION['identity'] = $identity;
            header("Location:".URL.'Crud/ingresoExitoso');
            /*
            if ($identity->role == 'admin') {
              $_SESSION['admin'] = true;
            }
            */
          }else {
            $_SESSION['error_login'] = 'Identificación Fallida';
            header("Location:".URL.'Crud/index');
          }

      }

    }

}
?>
