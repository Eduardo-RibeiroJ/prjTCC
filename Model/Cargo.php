<?php
class Cargo {
    private $idCargo;
    private $nomeCargo;

    public function inserirCargo ($idCargo, $nomeCargo) {
        $this->idCargo = $idCargo;
        $this->nomeCargo = $nomeCargo;
    }
    
    function getIdCargo() {
        return $this->idCargo;
    }

    function getNomeCargo() {
        return $this->nomeCargo;
    }

    function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    function setNomeCargo($nomeCargo) {
        $this->nomeCargo = $nomeCargo;
    }

    function idRegistro() {
        return CargoDAO::Registro($this);
    }
}
