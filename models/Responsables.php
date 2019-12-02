
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
    $this->Pilares_idPilares = $idLCP;
    //   $query="SELECT * FROM Responsables WHERE idResponsables = '$idLCP'";
    //   $tmp = $this->db->query($query);
    //   if ($row = mysqli_fetch_array($tmp)) {
    //       $this->Pilares_idPilares = $row['Pilares_idPilares'];
    //   }else {
    //       echo "No encontré tu Pilares_idPilares";
    //   }

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
    $query="SELECT * FROM Responsables WHERE nombre  LIKE '%$nombreLCP%' AND apellidoPaterno LIKE '%$paternoLCP%' AND apellidoMaterno LIKE '%$maternoLCP%'";

    $consulta = $this->db->query($query);

    //mysqli_query($conn, "SELECT * FROM Login WHERE nombre = '$usuario' AND contrasena = '$pass'");

    if($consulta && $consulta->num_rows == 1){
        $lcp = $consulta->fetch_object();
        $verify = true;
      //var_dump($consulta);
      //$LCP = $consulta->fetch_object();
      //$this->setIdResponsables($LCP->idResponsables);
      if ($verify) {
        $result = $lcp;
      }
    }
    return $result;
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

  public function getDataUsuariosPorPilar($lcpPilarId){     
    header('Content-Type: application/json');

    // select count(*) from Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '9' AND U1.fechaDeregistro like '%2019-04-24%'
    $mesAbril="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%2019-04%'";
    $result1 = $this->db->query($mesAbril);

    // $dia2="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-02%'";
    $mesMayo="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%2019-05%'";
    $result2 = $this->db->query($mesMayo);

    // $dia3="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-03%'";
    $mesJunio="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%2019-06%'";
    $result3 = $this->db->query($mesJunio);

    // $dia4="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-04%'";
    $mesJulio="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%2019-07%'";
    $result4 = $this->db->query($mesJulio);

    // $dia5="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-05%'";
    $mesAgosto="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%Aug% %2019%'";
    $result5 = $this->db->query($mesAgosto);

    // $dia6="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-06%'";
    $mesSeptiembre="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%Sep% %2019%'";
    $result6 = $this->db->query($mesSeptiembre);

    // $dia7="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-07%'";
    $mesOctubre="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%Oct% %2019%'";
    $result7 = $this->db->query($mesOctubre);

    // $dia8="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-08%'";
    $mesNovembre="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%Nov% %2019%'";
    $result8 = $this->db->query($mesNovembre);

    // $dia9="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-09%'";
    $mesDiciembre="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%Dec% %2019%'";
    $result9 = $this->db->query($mesDiciembre);

    // $dia10="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-10%'";
    // $result10 = $this->db->query($dia10);

    // $dia11="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-11%'";
    // $result11 = $this->db->query($dia11);
    
    // $dia12="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-12%'";
    // $result12 = $this->db->query($dia12);

    // $dia13="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-13%'";
    // $result13 = $this->db->query($dia13);

    // $dia14="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-14%'";
    // $result14 = $this->db->query($dia14);

    // $dia15="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-15%'";
    // $result15 = $this->db->query($dia15);

    // $dia16="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-16%'";
    // $result16 = $this->db->query($dia16);

    // $dia17="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-17%'";
    // $result17 = $this->db->query($dia17);

    // $dia18="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-18%'";
    // $result18 = $this->db->query($dia18);

    // $dia19="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-19%'";
    // $result19 = $this->db->query($dia19);

    // $dia20="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-20%'";
    // $result20 = $this->db->query($dia20);

    // $dia21="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-21%'";
    // $result21 = $this->db->query($dia21);

    // $dia22="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-22%'";
    // $result22 = $this->db->query($dia22);

    // $dia23="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-23%'";
    // $result23 = $this->db->query($dia23);

    // $dia24="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-24%'";
    // $result24 = $this->db->query($dia24);

    $data = array();
    foreach ($result1 as $row) {
    $data[] = $row;
    }
    foreach ($result2 as $row) {
    array_push($data, $row);
    }
    foreach ($result3 as $row) {
    array_push($data, $row);
    }
    foreach ($result4 as $row) {
    array_push($data, $row);
    }
    foreach ($result5 as $row) {
    array_push($data, $row);
    }
    foreach ($result6 as $row) {
    array_push($data, $row);
    }
    foreach ($result7 as $row) {
    array_push($data, $row);
    }
    foreach ($result8 as $row) {
    array_push($data, $row);
    }
    foreach ($result9 as $row) {
    array_push($data, $row);
    }
    // foreach ($result10 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result11 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result12 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result13 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result14 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result15 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result16 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result17 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result18 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result19 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result20 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result21 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result22 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result23 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result24 as $row) {
    // array_push($data, $row);
    // }

    return json_encode($data);

  }

  public function getDataUsuariosInscritos(){     
    header('Content-Type: application/json');

    // select count(*) from Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '9' AND U1.fechaDeregistro like '%2019-04-24%'
    // $mesAbril="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%2019-04%'";
    $mesAbril="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04%'";
    $result1 = $this->db->query($mesAbril);

    $mesMayo="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-05%'";
    // $mesMayo="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%2019-05%'";
    $result2 = $this->db->query($mesMayo);

    // $dia3="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-03%'";
    // $mesJunio="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%2019-06%'";
    $mesJunio="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-06%'";
    $result3 = $this->db->query($mesJunio);

    // $dia4="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-04%'";
    // $mesJulio="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%2019-07%'";
    $mesJulio="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-07%'";
    $result4 = $this->db->query($mesJulio);

    // $dia5="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-05%'";
    // $mesAgosto="SELECT count(*) AS fecha FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId' AND U1.fechaDeregistro like '%Aug% %2019%'";
    $mesAgosto="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%Aug%'";
    $result5 = $this->db->query($mesAgosto);

    // $dia6="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-06%'";
    // $result6 = $this->db->query($dia6);

    // $dia7="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-07%'";
    // $result7 = $this->db->query($dia7);

    // $dia8="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-08%'";
    // $result8 = $this->db->query($dia8);

    // $dia9="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-09%'";
    // $result9 = $this->db->query($dia9);

    // $dia10="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-10%'";
    // $result10 = $this->db->query($dia10);

    // $dia11="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-11%'";
    // $result11 = $this->db->query($dia11);
    
    // $dia12="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-12%'";
    // $result12 = $this->db->query($dia12);

    // $dia13="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-13%'";
    // $result13 = $this->db->query($dia13);

    // $dia14="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-14%'";
    // $result14 = $this->db->query($dia14);

    // $dia15="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-15%'";
    // $result15 = $this->db->query($dia15);

    // $dia16="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-16%'";
    // $result16 = $this->db->query($dia16);

    // $dia17="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-17%'";
    // $result17 = $this->db->query($dia17);

    // $dia18="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-18%'";
    // $result18 = $this->db->query($dia18);

    // $dia19="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-19%'";
    // $result19 = $this->db->query($dia19);

    // $dia20="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-20%'";
    // $result20 = $this->db->query($dia20);

    // $dia21="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-21%'";
    // $result21 = $this->db->query($dia21);

    // $dia22="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-22%'";
    // $result22 = $this->db->query($dia22);

    // $dia23="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-23%'";
    // $result23 = $this->db->query($dia23);

    // $dia24="SELECT count(*) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-24%'";
    // $result24 = $this->db->query($dia24);

    $data = array();
    foreach ($result1 as $row) {
    $data[] = $row;
    }
    foreach ($result2 as $row) {
    array_push($data, $row);
    }
    foreach ($result3 as $row) {
    array_push($data, $row);
    }
    foreach ($result4 as $row) {
    array_push($data, $row);
    }
    foreach ($result5 as $row) {
    array_push($data, $row);
    }
    // foreach ($result6 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result7 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result8 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result9 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result10 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result11 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result12 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result13 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result14 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result15 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result16 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result17 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result18 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result19 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result20 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result21 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result22 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result23 as $row) {
    // array_push($data, $row);
    // }
    // foreach ($result24 as $row) {
    // array_push($data, $row);
    // }

    return json_encode($data);

  }
    
  public function getDataActividadesPorPilar($lcpPilarId){
    header('Content-Type: application/json');
    // select count(*) from ActividadesPorUsuario A1, UsuariosPorPilar U1 
    // where A1.Usuario_idUsuarios = U1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades = '4' and U1.Pilares_idPilares = '23'; 
    // $usuariosPorTipoAct1="SELECT count(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '1'";
    $usuariosPorTipoAct1="SELECT count(*) AS userPorActividad FROM ActividadesPorUsuario A1, UsuariosPorPilar U1 WHERE A1.Usuario_idUsuarios = U1.Usuario_idUsuarios AND A1.Actividades_TiposActividades_idTiposActividades = '1' AND U1.Pilares_idPilares = '$lcpPilarId'";
    $resultZona1 = $this->db->query($usuariosPorTipoAct1);

    // $usuariosPorTipoAct2="SELECT count(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '2'";
    $usuariosPorTipoAct2="SELECT count(*) AS userPorActividad FROM ActividadesPorUsuario A1, UsuariosPorPilar U1 WHERE A1.Usuario_idUsuarios = U1.Usuario_idUsuarios AND A1.Actividades_TiposActividades_idTiposActividades = '2' AND U1.Pilares_idPilares = '$lcpPilarId'";
    $resultZona2 = $this->db->query($usuariosPorTipoAct2);

    // $usuariosPorTipoAct3="SELECT count(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '3'";
    $usuariosPorTipoAct3="SELECT count(*) AS userPorActividad FROM ActividadesPorUsuario A1, UsuariosPorPilar U1 WHERE A1.Usuario_idUsuarios = U1.Usuario_idUsuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.Pilares_idPilares = '$lcpPilarId'";
    $resultZona3 = $this->db->query($usuariosPorTipoAct3);

    // $usuariosPorTipoAct4="SELECT count(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '4'";
    $usuariosPorTipoAct4="SELECT count(*) AS userPorActividad FROM ActividadesPorUsuario A1, UsuariosPorPilar U1 WHERE A1.Usuario_idUsuarios = U1.Usuario_idUsuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.Pilares_idPilares = '$lcpPilarId'";
    $resultZona4 = $this->db->query($usuariosPorTipoAct4);

    $dataActividades = array();
        foreach ($resultZona1 as $row) {
        $dataActividades[] = $row;
        }
        foreach ($resultZona3 as $row) {
        array_push($dataActividades, $row);
        }
        foreach ($resultZona4 as $row) {
        array_push($dataActividades, $row);
        }
        foreach ($resultZona2 as $row) {
        array_push($dataActividades, $row);
        }

    return json_encode($dataActividades);

  }

  public function getDataRegistrosPorGenero($lcpPilarId){
    header('Content-Type: application/json');
    // SELECT count(*) AS registroGenero FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.sexo LIKE 'h' AND U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '9'
    // $usuariosMujer="SELECT count(*) AS registroGenero FROM Usuario WHERE sexo LIKE 'm'";
    $usuariosMujer="SELECT count(*) AS registroGenero FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.sexo LIKE 'm' AND U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId'";
    $resultMujer = $this->db->query($usuariosMujer);

    $usuariosHombre="SELECT count(*) AS registroGenero FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.sexo LIKE 'h' AND U1.idUsuarios = U2.Usuario_idUsuarios AND U2.Pilares_idPilares = '$lcpPilarId'";
    $resultHombre = $this->db->query($usuariosHombre);

    $dataRegistrosPorGenero = array();
        foreach ($resultMujer as $row) {
        $dataRegistrosPorGenero[] = $row;
        }
        foreach ($resultHombre as $row) {
        array_push($dataRegistrosPorGenero, $row);
        }
       

    return json_encode($dataRegistrosPorGenero);

  }

  public function getDataRegistrosPorZona(){
    header('Content-Type: application/json');

        $usuariosPorZona1="SELECT COUNT(*) AS userPorZona FROM Usuario WHERE Direccion_Colonias_Alcaldias_Zonas_idZonas = '1'";
        $resultZona1 = $this->db->query($usuariosPorZona1);

        $usuariosPorZona2="SELECT COUNT(*) AS userPorZona FROM Usuario WHERE Direccion_Colonias_Alcaldias_Zonas_idZonas = '2'";
        $resultZona2 = $this->db->query($usuariosPorZona2);

        $usuariosPorZona3="SELECT COUNT(*) AS userPorZona FROM Usuario WHERE Direccion_Colonias_Alcaldias_Zonas_idZonas = '3'";
        $resultZona3 = $this->db->query($usuariosPorZona3);

        $usuariosPorZona4="SELECT COUNT(*) AS userPorZona FROM Usuario WHERE Direccion_Colonias_Alcaldias_Zonas_idZonas = '4'";
        $resultZona4 = $this->db->query($usuariosPorZona4);

        $usuariosPorZona5="SELECT COUNT(*) AS userPorZona FROM Usuario WHERE Direccion_Colonias_Alcaldias_Zonas_idZonas = '5'";
        $resultZona5 = $this->db->query($usuariosPorZona5);

        $usuariosPorZona6="SELECT COUNT(*) AS userPorZona FROM Usuario WHERE Direccion_Colonias_Alcaldias_Zonas_idZonas = '6'";
        $resultZona6 = $this->db->query($usuariosPorZona6);

        $dataZona = array();
        foreach ($resultZona1 as $row) {
          $dataZona[] = $row;
        }
        foreach ($resultZona2 as $row) {
          array_push($dataZona, $row);
        }
        foreach ($resultZona3 as $row) {
          array_push($dataZona, $row);
        }
        foreach ($resultZona4 as $row) {
          array_push($dataZona, $row);
        }
        foreach ($resultZona5 as $row) {
          array_push($dataZona, $row);
        }
        foreach ($resultZona6 as $row) {
          array_push($dataZona, $row);
        }
      

        return json_encode($dataZona);

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
