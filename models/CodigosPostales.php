<?php
class CodigosPostales{

    private $idCodigoPostal;
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
        return $this->idCodigoPostal;
    }
    public function getNombre(){
        return $this->nombre;
    }
}
?>