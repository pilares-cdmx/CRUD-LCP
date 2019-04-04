<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
class Alcaldias{

    private $idAlcaldias;
    private $nombre;
    private $idZonas;
    private $db;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }
/**
 * GETTERS
 */
    public function getId(){
        return $this->idAlcaldias;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getIdZonas($id){
        
        $idZonas=$this->db->query("SELECT Zonas_idZonas FROM Alcaldias WHERE idAlcaldias ='$id'");
        
        return $idZonas;

    }
/**
 * SETTERS  
 */    
    public function setId($idAlcaldias){
        $this->idAlcaldias = $idAlcaldias;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setIdZonas($idZonas){
        $this->idZonas = $idZonas;
    }
}


?>