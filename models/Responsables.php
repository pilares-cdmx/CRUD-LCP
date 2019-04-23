
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
//    $var1 = $this->getApellidoMaterno;
//    $var2 = " SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-02%' AND U2.Pilares_idPilares = '$lcpPilarId'";
//     var_dump($var1);
//     return $var2;
   // $con = mysqli_connect('localhost', 'pilaresDevSergio', '%C2MB10cl1m2t1c0%', 'pilaresDB');
    // $con = mysqli_connect('localhost', 'root', '', 'pilaresDB');
    //     if (!$con) {
    //         die('Could not connect: ' . mysqli_error($con));
    //     } 

    // SELECT COUNT(*), U2.Pilares_idPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-08%' AND U2.Pilares_idPilares = '9'

    // mysqli_select_db($con, "pilaresDB");
    // mysqli_query($con, "SET NAMES 'utf8mb4'");

    // $dia1="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-01%'";
    
    $dia1="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-01%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result1 = $this->db->query($dia1);

    $dia2="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-02%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result2 = $this->db->query($dia2);

    $dia3="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-03%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result3 = $this->db->query($dia3);

    $dia4="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-04%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result4 = $this->db->query($dia4);

    $dia5="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-05%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result5 = $this->db->query($dia5);

    $dia6="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-06%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result6 = $this->db->query($dia6);

    $dia7="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-07%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result7 = $this->db->query($dia7);

    $dia8="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-08%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result8 = $this->db->query($dia8);

    $dia9="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-09%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result9 = $this->db->query($dia9);

    $dia10="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-10%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result10 = $this->db->query($dia10);

    $dia11="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-11%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result11 = $this->db->query($dia11);

    $dia12="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-12%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result12 = $this->db->query($dia12);

    $dia13="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-13%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result13 = $this->db->query($dia13);

    $dia14="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-14%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result14 = $this->db->query($dia14);

    $dia15="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-15%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result15 = $this->db->query($dia15);

    $dia16="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-16%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result16 = $this->db->query($dia16);

    $dia17="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-17%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result17 = $this->db->query($dia17);

    $dia18="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-18%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result18 = $this->db->query($dia18);

    $dia19="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-19%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result19 = $this->db->query($dia19);

    $dia20="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-20%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result20 = $this->db->query($dia20);

    $dia21="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-21%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result21 = $this->db->query($dia21);

    $dia22="SELECT COUNT(*) AS fecha  FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idUsuarios = U2.Usuario_idUsuarios AND U1.fechaDeRegistro LIKE '%2019-04-22%' AND U2.Pilares_idPilares = '$lcpPilarId'";
    $result22 = $this->db->query($dia22);

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
    foreach ($result10 as $row) {
    array_push($data, $row);
    }
    foreach ($result11 as $row) {
    array_push($data, $row);
    }
    foreach ($result12 as $row) {
    array_push($data, $row);
    }
    foreach ($result13 as $row) {
    array_push($data, $row);
    }
    foreach ($result14 as $row) {
    array_push($data, $row);
    }
    foreach ($result15 as $row) {
    array_push($data, $row);
    }
    foreach ($result16 as $row) {
    array_push($data, $row);
    }
    foreach ($result17 as $row) {
    array_push($data, $row);
    }
    foreach ($result18 as $row) {
    array_push($data, $row);
    }
    foreach ($result19 as $row) {
    array_push($data, $row);
    }
    foreach ($result20 as $row) {
    array_push($data, $row);
    }
    foreach ($result21 as $row) {
    array_push($data, $row);
    }
    foreach ($result22 as $row) {
    array_push($data, $row);
    }



    //free memory associated with result
    // $result3->close();
    // $result4->close();
    // $result5->close();
    // $result6->close();
    // $result7->close();
    // $result8->close();
    // $result9->close();
    // $result10->close();
    // $result11->close();
    // $result12->close();
    // $result13->close();
    // $result14->close();
    // $result15->close();
    // $result16->close();
    // $result17->close();

    //close connection
    // $con->close();

    //now print the data
    // print json_encode($data);
    return json_encode($data);

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
