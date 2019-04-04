<?php
class Actividades{
    private $idActividades;
    private $nombre;
    private $TiposActividades_idTiposActividades;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdActividades(){
        return $this->idActividades;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getIdTiposActividades(){
        return $this->TiposActividades_idTiposActividades;
    }

    public function setIdActividades($idActividades){
        $this->idActividades = $idActividades;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setIdTiposActividades($TiposActividades_idTiposActividades){
        $this->TiposActividades_idTiposActividades;
    }
}
?>
