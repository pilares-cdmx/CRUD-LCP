
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

  private $pilarAsignado;

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

  public function getPilarAsignado(){
      return $this->pilarAsignado;
  }


/**
* SETTERS
*/
  public function setIdResponsables(){
      //$this->idResponsables = $idResponsables;
      $nombreLCP = $this->nombre;
      $paternoLCP = $this->apellidoPaterno;
      $maternoLCP = $this->apellidoMaterno;
      $query="SELECT * FROM Responsables WHERE nombre like '%$nombreLCP%' AND apellidoPaterno like '%$paternoLCP%' AND apellidoMaterno like '%$maternoLCP%'";

      $tmp = $this->db->query($query);
      if ($row = mysqli_fetch_array($tmp)) {
          $this->idResponsables = $row['idResponsables'];
      }else {
          echo "No encontré tu idResponsables";
      }
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

  public function setPilarAsignado($Pilares_idPilares){
      //$this->Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = $Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas;
      $query="SELECT * FROM Pilares WHERE idPilares = '$Pilares_idPilares'";
      $tmp = $this->db->query($query);
      if ($row = mysqli_fetch_array($tmp)) {
          $this->pilarAsignado = $row['nombre'];
      }else {
          echo "No encontré tu 	nombre de pilar";
      }
  }

/**
* Otras funciones
*/
  public function validarLCP(){
    //$query="SELECT * FROM Responsables WHERE nombre = '$nombreLCP' AND apellidoPaterno = '$paternoLCP' AND apellidoMaterno = '$maternoLCP'";
    $result = false;
    $nombreLCP = $this->nombre;
    $paternoLCP = $this->apellidoPaterno;
    $maternoLCP = $this->apellidoMaterno;
    $query="SELECT * FROM Responsables WHERE nombre = '$nombreLCP' AND apellidoPaterno  = '$paternoLCP' AND apellidoMaterno = '$maternoLCP'";

    $consulta = $this->db->query($query);

    //mysqli_query($conn, "SELECT * FROM Login WHERE nombre = '$usuario' AND contrasena = '$pass'");

    if($consulta && $consulta->num_rows == 1){
        $lcp = $consulta->fetch_object();
      
    }
    //$nombreLCP = mysqli_fetch_assoc($consulta)

    if ($consulta && $consulta->num_rows == 1) {
      //var_dump($consulta);
      //$LCP = $consulta->fetch_object();
      //$this->setIdResponsables($LCP->idResponsables);
      return true;
    }else {
      return false;
    }

  }

  public function insertarCorreo($idLCP){
    //$query="INSERT INTO Responsables (correo) VALUES ('{$this->getCorreo()}')";
    //$correo = $this->getCorreo();
    $query="UPDATE Responsables set correo = '{$this->getCorreo()}'
     WHERE idResponsables = '$idLCP'";
    $save = $this->db->query($query);
    $result = false;

    if ($save) {
        $result = true;
    }
    return $result;
  }

  public function insertarContrasena($idLCP){
    $query="UPDATE Responsables set contrasena = '{$this->getContrasena()}'
     WHERE idResponsables = '$idLCP'";
    
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
        $lcp = $login->fetch_object();
        // Verificar la contraseñarra
        if ($contrasenaLCP == $lcp->contrasena) {
          $verify = true;
        }
        //$verify = password_verify($contrasenaLCP, $usuario->contrasena);
        if ($verify) {
          $result = $lcp;
        }
      }
    return $result;
  }

//   public function dataUsuarios(){
//       /*header('Content-Type: application/json');
//       $query="SELECT nombre, apellidoPaterno, apellidoMaterno, folio, correo, curp, telefonoCasa, fechaDeRegistro FROM Usuario";

//       $result = $this->db->query($query);

//       $data = array();
//       foreach ($result as $row){
//         $data[] = $row;
//       }
//       $dataJSON = json_encode($data);
//       return $dataJSON;
//       */
//       $sql="SELECT * FROM Usuario";
//       $result = $this->db->query($query);

//             echo "<thead>
//                       <tr>
//                         <th>Nombre</th>
//                         <th>Apellido Paterno</th>
//                         <th>Apellido Materno</th>
//                         <th>folio</th>
//                         <th>correo</th>
//                         <th>CURP</th>
//                         <th>Telefono Casa</th>
//                         <th>Fecha Registro</th>
//                       </tr>
//                     </thead>
//                     <tfoot>
//                       <tr>
//                         <th>Nombre</th>
//                         <th>Apellido Paterno</th>
//                         <th>Apellido Materno</th>
//                         <th>folio</th>
//                         <th>correo</th>
//                         <th>CURP</th>
//                         <th>Telefono Casa</th>
//                         <th>Fecha Registro</th>
//                       </tr>
//                     </tfoot>
//                     <tbody>";

//         while ($row = mysqli_fetch_array($result)) {
//             //echo "<option value=" . $row['idCodigoPostal'] . ">" . $row['codigo'] . "</option>";
//             echo "<tr>
//                     <td>". $row['nombre'] . "</td>" .
//                    "<td>". $row['apellidoPaterno'] . "</td>" .
//                    "<td>". $row['apellidoMaterno'] . "</td>" .
//                    "<td>". $row['folio'] . "</td>" .
//                    "<td>". $row['correo'] . "</td>" .
//                    "<td>". $row['curp'] . "</td>" .
//                    "<td>". $row['telefonoCasa'] . "</td>" .
//                    "<td>". $row['fechaDeRegistro'] . "</td>" .
//                   "</tr>";
//         }

//         mysqli_close($con);

//   }

}

?>
