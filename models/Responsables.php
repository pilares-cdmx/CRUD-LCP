
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
  private $contrasena;
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
  public function getContrasena(){
      //return password_hash($this->db->real_escape_string($contrasena), PASSWORD_BCRYPT, ['cost' => 4]);
      return $this->contrasena;
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
  public function setContrasena($contrasena){
      $this->contrasena = $this->db->real_escape_string($contrasena);
  }
  public function setIdPilares($idLCP){
      //$this->Pilares_idPilares = $Pilares_idPilares;
      $query="SELECT * FROM Responsables WHERE idResponsables = '$idLCP'";
      $tmp = $this->db->query($query);
      if ($row = mysqli_fetch_array($tmp)) {
          $this->Pilares_idPilares = $row['Pilares_idPilares'];
      }else {
          echo "No encontré tu Pilares_idPilares";
      }

  }
  public function setPilares_idDireccion($idLCP){
      //$this->Pilares_Direccion_idDireccion = $Pilares_Direccion_idDireccion;
      $query="SELECT * FROM Responsables WHERE idResponsables = '$idLCP'";
      $tmp = $this->db->query($query);
      if ($row = mysqli_fetch_array($tmp)) {
          $this->Pilares_Direccion_idDireccion = $row['Pilares_Direccion_idDireccion'];
      }else {
          echo "No encontré tu Pilares_idPilares";
      }
  }
  public function setPilares_idColonia($idLCP){
      //$this->Pilares_Direccion_Colonias_idColonia = $Pilares_Direccion_Colonias_idColonia;
      $query="SELECT * FROM Responsables WHERE idResponsables = '$idLCP'";
      $tmp = $this->db->query($query);
      if ($row = mysqli_fetch_array($tmp)) {
          $this->Pilares_Direccion_Colonias_idColonia = $row['Pilares_Direccion_Colonias_idColonia'];
      }else {
          echo "No encontré tu Pilares_Direccion_Colonias_idColonia";
      }
  }
  public function setPilares_idCodigoPostal($idLCP){
      //$this->Pilares_Direccion_Colonias_CodigosPostales_idCodigoPostal = $Pilares_Direccion_Colonias_CodigosPostales_idCodigoPostal;
      $query="SELECT * FROM Responsables WHERE idResponsables = '$idLCP'";
      $tmp = $this->db->query($query);
      if ($row = mysqli_fetch_array($tmp)) {
          $this->Pilares_Direccion_Colonias_CodigosPostales_idCodigoPostal = $row['Pilares_Direccion_Colonias_CodigosPostales_idCodigoPostal'];
      }else {
          echo "No encontré tu Pilares_Direccion_Colonias_CodigosPostales_idCodigoPostal";
      }
  }
  public function setPilares_idAlcaldiasZonas($idLCP){
      //$this->Pilares_Direccion_Colonias_Alcaldias_idAlcaldiasZonas = $Pilares_Direccion_Colonias_Alcaldias_idAlcaldiasZonas;
      $query="SELECT * FROM Responsables WHERE idResponsables = '$idLCP'";
      $tmp = $this->db->query($query);
      if ($row = mysqli_fetch_array($tmp)) {
          $this->Pilares_Direccion_Colonias_Alcaldias_idAlcaldiasZonas = $row['Pilares_Direccion_Colonias_Alcaldias_idAlcaldiasZonas'];
      }else {
          echo "No encontré tu Pilares_Direccion_Colonias_Alcaldias_idAlcaldiasZonas";
      }
  }
  public function setPilares_idZonas($idLCP){
      //$this->Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = $Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas;
      $query="SELECT * FROM Responsables WHERE idResponsables = '$idLCP'";
      $tmp = $this->db->query($query);
      if ($row = mysqli_fetch_array($tmp)) {
          $this->Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = $row['	Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas'];
      }else {
          echo "No encontré tu 	Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas";
      }
  }

/**
* Otras funciones
*/
  public function validarLCP(){
    //$query="SELECT * FROM Responsables WHERE nombre = '$nombreLCP' AND apellidoPaterno = '$paternoLCP' AND apellidoMaterno = '$maternoLCP'";
    $nombreLCP = $this->nombre;
    $paternoLCP = $this->apellidoPaterno;
    $maternoLCP = $this->apellidoMaterno;
    $query="SELECT * FROM Responsables WHERE nombre like '%$nombreLCP%' AND apellidoPaterno like '%$paternoLCP%' AND apellidoMaterno like '%$maternoLCP%'";

    $consulta = $this->db->query($query);

    //mysqli_query($conn, "SELECT * FROM Login WHERE nombre = '$usuario' AND contrasena = '$pass'");

    if(!$consulta){
      echo mysqli_error();
      exit;
    }
    //$nombreLCP = mysqli_fetch_assoc($consulta)

    if ($consulta && $consulta->num_rows == 1) {
      //var_dump($consulta);
      $LCP = $consulta->fetch_object();
    
      $this->setIdResponsables($LCP->idResponsables);
      return true;
    }else {
      return false;
    }

  }

  public function insertarCorreo(){
    //$query="INSERT INTO Responsables (correo) VALUES ('{$this->getCorreo()}')";
    $query="UPDATE `Responsables` SET `correo` = '{$this->getCorreo()}' WHERE `Responsables`.`idResponsables` = '{$this->getIdResponsables()}' AND `Responsables`.`Pilares_idPilares` = '{$this->getIdPilares()}'
    AND `Responsables`.`Pilares_Direccion_idDireccion` = '{$this->getPilares_idDireccion()}' AND `Responsables`.`Pilares_Direccion_Colonias_idColonia` = '{$this->getPilares_idColonia()}' AND `Responsables`.`Pilares_Direccion_Colonias_CodigosPostales_idCodigoPostal` = '{$this->getPilares_idCodigoPostal()}'
    AND `Responsables`.`Pilares_Direccion_Colonias_Alcaldias_idAlcaldiasZonas` = '{$this->getPilares_idAlcaldiasZonas()}' AND `Responsables`.`Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas` = '{$this->getPilares_idZonas()}'";
    $save = $this->db->query($query);
    $result = false;

    if ($save) {
        $result = true;
    }
    return $result;
  }

  public function insertarContrasena(){
    $query="UPDATE `Responsables` SET `contrasena` = '{$this->getContrasena()}' WHERE `Responsables`.`idResponsables` = '{$this->getIdResponsables()}' AND `Responsables`.`Pilares_idPilares` = '{$this->getIdPilares()}'
    AND `Responsables`.`Pilares_Direccion_idDireccion` = '{$this->getPilares_idDireccion()}' AND `Responsables`.`Pilares_Direccion_Colonias_idColonia` = '{$this->getPilares_idColonia()}' AND `Responsables`.`Pilares_Direccion_Colonias_CodigosPostales_idCodigoPostal` = '{$this->getPilares_idCodigoPostal()}'
    AND `Responsables`.`Pilares_Direccion_Colonias_Alcaldias_idAlcaldiasZonas` = '{$this->getPilares_idAlcaldiasZonas()}' AND `Responsables`.`Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas` = '{$this->getPilares_idZonas()}'";

    $save = $this->db->query($query);
    $result = false;

    if ($save) {
        $result = true;
    }
    return $result;
  }

  public function validarAcceso(){
      $result = false;
      $correoLCP = $this->correo;
      $contrasenaLCP = $this->contrasena;
      $query="SELECT * FROM Responsables WHERE correo = '$correoLCP'";

      $login = $this->db->query($query);
        //mysqli_query($conn, "SELECT * FROM Login WHERE nombre = '$usuario' AND contrasena = '$pass'");
      if($login && $login->num_rows == 1){
        $usuario = $login->fetch_object();
        // Verificar la contraseñarra
        if ($contrasenaLCP == $usuario->contrasena) {
          $verify = true;
        }
        //$verify = password_verify($contrasenaLCP, $usuario->contrasena);
        if ($verify) {
          $result = $usuario;
        }
      }
    return $result;
  }

}

?>
