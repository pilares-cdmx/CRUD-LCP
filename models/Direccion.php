<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

//require_once 'models/Alcaldias.php';
class Direccion{

    private $idDireccion;
    private $calleYnumero;
    private $Colonias_idColonia;
    private $Colonias_CodigosPostales_idCodigoPostal;
    private $Colonias_Alcaldias_idAlcaldiasZonas;
    private $Colonias_Alcaldias_Zonas_idZonas;
    private $db;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }
/**
 * getters
 */
    public function getId(){
        return $this->idDireccion;
    }
    public function getCalleYnumero(){
        return $this->calleYnumero;
    }
    public function getIdColonia(){
        return $this->Colonias_idColonia;
    }
    public function getIdCodigoPostal(){
        return $this->Colonias_CodigosPostales_idCodigoPostal;
    }
    public function getIdAlcaldias(){
        return $this->Colonias_Alcaldias_idAlcaldiasZonas;
    }
    public function getIdZonas(){

        return $this->Colonias_Alcaldias_Zonas_idZonas;
    }

/**
 * setters
 */
    public function setId($idDireccion){
        $this->idDireccion = $idDireccion;
    }
    public function setCalleYnumero($calleYnumero){
        $this->calleYnumero = $this->db->real_escape_string($calleYnumero);
    }
    public function setIdColonia($Colonias_idColonia){
        $this->Colonias_idColonia = $Colonias_idColonia;
    }
    public function setIdCodigoPostal($Colonias_CodigosPostales_idCodigoPostal){
        $this->Colonias_CodigosPostales_idCodigoPostal = $Colonias_CodigosPostales_idCodigoPostal;
    }
    public function setIdAlcaldias($Colonias_Alcaldias_idAlcaldiasZonas){
        $this->Colonias_Alcaldias_idAlcaldiasZonas = $Colonias_Alcaldias_idAlcaldiasZonas;
    }
    public function setIdZonas($idAlcaldia){
       // $this->Colonias_Alcaldias_Zonas_idZonas = $Colonias_Alcaldias_Zonas_idZonas;
       $query="SELECT * FROM Alcaldias WHERE idAlcaldias = '$idAlcaldia'";
       $tmp = $this->db->query($query);
       if ($row = mysqli_fetch_array($tmp)) {
           $this->Colonias_Alcaldias_Zonas_idZonas = $row['Zonas_idZonas'];
       }else {
           echo "No encontré tu zona";
       }

    }


    Public function save(){

        $sql="INSERT INTO Direccion VALUES(NULL,
        '{$this->getCalleYnumero()}',
        '{$this->getIdColonia()}',
        '{$this->getIdCodigoPostal()}',
        '{$this->getIdAlcaldias()}',
        '{$this->getIdZonas()}'
        );";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
                $result = true;
        }
        return $result;
    }

    public function lastInsertID(){
        $tmp = $this->db->insert_id;
        return $this->idDireccion = $tmp;
    }

 }


?>
