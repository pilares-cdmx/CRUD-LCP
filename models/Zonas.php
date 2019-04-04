<?php
class Zonas{

    private $idZonas;
    private $nombre;
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
        return $this->idZonas;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM Zonas ORDER BY id DESC");

        while($row = $query->fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }

/**
 * SETTERS
 */
   public function setId(){
    $this->idZonas = $idUsusarios;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    
}


?>