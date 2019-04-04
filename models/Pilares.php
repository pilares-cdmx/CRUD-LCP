<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
class Pilares{
    private $idPilares;
    private $nombre;
    private $tipo;
    private $Direccion_idDireccion;
    private $Direccion_Colonias_idColonia;
    private $Direccion_Colonias_CodigosPostales_idCodigoPostal;
    private $Direccion_Colonias_Alcaldias_idAlcaldiasZonas;
    private $Direccion_Colonias_Alcaldias_Zonas_idZonas;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdPilares(){
        return $this->idPilares;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getIdDireccion(){
        return $this->Direccion_idDireccion;
    }
    public function getIdColonia(){
        return $this->Direccion_Colonias_idColonia;
    }
    public function getIdCodigoPostal(){
        return $this->Direccion_Colonias_CodigosPostales_idCodigoPostal;
    }
    public function getIdAlcaldiasZonas(){
        return $this->Direccion_Colonias_Alcaldias_idAlcaldiasZonas;
    }
    public function getIdZonas(){
        return $this->Direccion_Colonias_Alcaldias_Zonas_idZonas;
    }


    public function setIdPilares($idPilares){
        $this->idPilares = $idPilares;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    public function setIdDireccion($Direccion_idDireccion){
        $this->Direccion_idDireccion = $Direccion_idDireccion;
    }
    public function setIdColonia($Direccion_Colonias_idColonia){
        $this->Direccion_Colonias_idColonia = $Direccion_Colonias_idColonia;
    }
    public function setIdCodigoPostal($Direccion_Colonias_CodigosPostales_idCodigoPostal){
        $this->Direccion_Colonias_CodigosPostales_idCodigoPostal = $Direccion_Colonias_CodigosPostales_idCodigoPostal;
    }
    public function setIdAlcaldiasZonas($Direccion_Colonias_Alcaldias_idAlcaldiasZonas){
        $this->Direccion_Colonias_Alcaldias_idAlcaldiasZonas = $Direccion_Colonias_Alcaldias_idAlcaldiasZonas;
    }
    public function setIdZonas($Direccion_Colonias_Alcaldias_Zonas_idZonas){
        $this->Direccion_Colonias_Alcaldias_Zonas_idZonas = $Direccion_Colonias_Alcaldias_Zonas_idZonas;
    }

}
?>
