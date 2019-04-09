
<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
class Responsables {

  private $idResponsables;
  private $nombre;
  private $apellidoPaterno;
  private $apellidoMaterno;
  private $Pilares_idPilares;
  private $Pilares_Direccion_idDireccion;
  private $Pilares_Direccion_Colonias_idColonia;
  private $Pilares_Direccion_Colonias_CodigosPostales_idCodigoPostal;
  private $Pilares_Direccion_Colonias_Alcaldias_idAlcaldiasZonas;
  private $Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas;
  private $db;

  public function __construct()
  {
      $this->db = Database::connect();
  }

/**
* GETTERS
*/



/**
* SETTERS
*/


/**
* Otras funciones
*/
  public function validarLCP($nombreLCP,$paternoLCP, $maternoLCP){
    $query="SELECT * FROM Responsables WHERE nombre = '$nombreLCP' AND apellidoPaterno = '$paternoLCP' AND apellidoMaterno = '$maternoLCP'";

    $consulta = $this->db->query($query);

          //mysqli_query($conn, "SELECT * FROM Login WHERE nombre = '$usuario' AND contrasena = '$pass'");

    if(!$consulta){
      echo mysqli_error();
      exit;
    }

    if ($nombreLCP = mysqli_fetch_assoc($consulta)) {
      return true;
    }else {
      return false;
    }

  }

  public function insertarCorreo($correo){
    $query="INSERT INTO Responsables ";
  }

  public function insertarContrasena($contrasena){

  }

  public function validarPass($correo, $contrasena){

  }

  

}

?>
