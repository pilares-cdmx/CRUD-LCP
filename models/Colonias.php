<?php
class Colonias{

    private $idColonia;
    private $nombre;
    private $CodigosPostales_idCodigoPostal;
    private $Alcaldias_idAlcaldiasZonas;
    private $Alcaldias_Zonas_idZonas;
    private $db;

    /**
     * Class constructor.
     */
    public function __construct(){
        $this->db = Database::connect();
    }
/**
 * GETTERS
 */
    public function getId(){
        return $this->idColonia;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getIdCodigoPostal(){
        return $this->CodigosPostales_idCodigoPostal;
    }
    public function getIdAlcaldias(){
        return $this->Alcaldias_idAlcaldiasZonas;
    }
    public function getZonas(){
        return $this->Alcaldias_Zonas_idZonas;
    }
    public function getColoniasPorId($id){
        /*
        $query=$this->db->query("SELECT * FROM Colonias WHERE id=$id");

        if($row = $query->fetch_object()){
            $resultSet=$row;
        }

        return $resultSet;
        */
    }
    
}

?>