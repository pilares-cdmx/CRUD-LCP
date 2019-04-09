
<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
class Responsables {

  private $idResponsables;
  private $nombre;
  private $apellidoPaterno;
  private $apellidoMaterno;
  private $correo;
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
  public function getIdResponsables(){
      return $this->idResponsables;
  }
  public function getNombre(){
      return $this->nombre;
  }
  public function getApellidoPaterno(){
      return $this->apellidoPaterno;
  }
  public function getApellidoMaterno(){
      return $this->apellidoMaterno;
  }
  public function getCorreo(){
      return $this->correo;
  }
  public function getIdPilares(){
      return $this->Pilares_idPilares;
  }
  public function getPilares_idDireccion(){
      return $this->Pilares_Direccion_idDireccion;
  }
  public function getPilares_idColonia(){
      return $this->Pilares_Direccion_Colonias_idColonia;
  }
  public function getPilares_idCodigoPostal(){
      return $this->Pilares_Direccion_Colonias_CodigosPostales_idCodigoPostal;
  }
  public function getPilares_idAlcaldiasZonas(){
      return $this->Pilares_Direccion_Colonias_Alcaldias_idAlcaldiasZonas;
  }
  public function getPilares_idZonas(){
      return $this->Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas;
  }


/**
* SETTERS
*/
  public function setIdResponsables($idResponsables){
      $this->idResponsables = $idResponsables;
  }
  public function setNombre($nombre){
      $this->nombre = $this->db->real_escape_string($nombre);
  }
  public function setApellidoPaterno($apellidoPaterno){
      $this->apellidoPaterno = $this->db->real_escape_string($apellidoPaterno);
  }
  public function setApellidoMaterno($apellidoMaterno){
      $this->apellidoMaterno = $this->db->real_escape_string($apellidoMaterno);
  }
  public function setCorreo($correo){
      $this->correo = $this->db->real_escape_string($correo);
  }
  public function setIdPilares($Pilares_idPilares){
      $this->Pilares_idPilares = $Pilares_idPilares;

  }
  public function setPilares_idDireccion($Pilares_Direccion_idDireccion){
      $this->Pilares_Direccion_idDireccion = $Pilares_Direccion_idDireccion;
  }
  public function setPilares_idColonia($Pilares_Direccion_Colonias_idColonia){
      $this->Pilares_Direccion_Colonias_idColonia = $Pilares_Direccion_Colonias_idColonia;
  }
  public function setPilares_idCodigoPostal($Pilares_Direccion_Colonias_CodigosPostales_idCodigoPostal){
      $this->Pilares_Direccion_Colonias_CodigosPostales_idCodigoPostal = $Pilares_Direccion_Colonias_CodigosPostales_idCodigoPostal;
  }
  public function setPilares_idAlcaldiasZonas($Pilares_Direccion_Colonias_Alcaldias_idAlcaldiasZonas){
      $this->Pilares_Direccion_Colonias_Alcaldias_idAlcaldiasZonas = $Pilares_Direccion_Colonias_Alcaldias_idAlcaldiasZonas;
  }
  public function setPilares_idZonas($Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas){
      $this->Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = $Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas;
  }

/**
* Otras funciones
*/
  public function validarLCP($nombreLCP,$paternoLCP, $maternoLCP){
    //$query="SELECT * FROM Responsables WHERE nombre = '$nombreLCP' AND apellidoPaterno = '$paternoLCP' AND apellidoMaterno = '$maternoLCP'";
    $query="SELECT * FROM Responsables WHERE nombre like '%$nombreLCP%' AND apellidoPaterno like '%$paternoLCP%' AND apellidoMaterno like '%$maternoLCP%'";
    $consulta = $this->db->query($query);

    //mysqli_query($conn, "SELECT * FROM Login WHERE nombre = '$usuario' AND contrasena = '$pass'");

    if(!$consulta){
      echo mysqli_error();
      exit;
    }

    if ($nombreLCP = mysqli_fetch_assoc($consulta)) {
      //var_dump($consulta);
      return true;
    }else {
      return false;
    }

  }

  public function insertarCorreo($correo){
    $query="INSERT INTO Responsables (correo) VALUES ('$correo')";
    $consulta = $this->db->query($query);
  }

  public function insertarContrasena($contrasena){
    $query="INSERT INTO Responsables (correo) VALUES ('$correo')";
  }

  public function validarPass($correo, $contrasena){

  }



}

?>
