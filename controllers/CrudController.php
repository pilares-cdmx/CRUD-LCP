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
    public function tablaUsuarios(){
        $responsableObj = new Responsables();
        $responsableObj->dataUsuarios();
        //$idPilarLCP = $responsableObj->getIdPilares();

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
              $identityLCP = $responsableObj->validarLCP();
              if($identityLCP && is_object($identityLCP)){

                  $idLCP = $identityLCP->idResponsables;
                  $idPilarDeLCP = $identityLCP->Pilares_idPilares;
                  // $responsableObj->setIdPilares($idLCP);
                  // $responsableObj->setPilares_idDireccion($idLCP);
                  // $responsableObj->setPilares_idColonia($idLCP);
                  // $responsableObj->setPilares_idCodigoPostal($idLCP);
                  // $responsableObj->setPilares_idAlcaldiasZonas($idLCP);
                  // $responsableObj->setPilares_idZonas($idLCP);

                  if($responsableObj->insertarCorreo($idLCP)){
                  //var_dump($responsableObj->insertarCorreo());
                  
                    if ($contrasena == $confirmContrasena) {
                       $responsableObj->setContrasena($contrasena);
                         if($responsableObj->insertarContrasena($idLCP)){
                          
                          $_SESSION['registroLCPExitoso'] = "Cuenta de LCP creada con éxito";
                          $_SESSION['identity'] = $identityLCP;
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

          $identityLCP = $responsableObj->validarAcceso();
          //var_dump($identityLCP);die;
          if ($identityLCP && is_object($identityLCP)) {
             $idPilarDeLCP = $identityLCP->Pilares_idPilares;
             //var_dump($idPilarDeLCP);die;
             $responsableObj->setPilarAsignado($idPilarDeLCP);
             $responsableObj->setIdPilares($idPilarDeLCP);
             $nombrePilarAsignado = $responsableObj->getPilarAsignado();
             $_SESSION['identity'] = $identityLCP;
             $_SESSION['pilarAsignado'] = $nombrePilarAsignado;
            header("Location:".URL.'Crud/ingresoExitoso');
            /*
            if ($identityLCP->role == 'admin') {
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
