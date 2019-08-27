<?php
class Cargo {
    private $idCargo;
    private $nomeCargo;
    
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
}
