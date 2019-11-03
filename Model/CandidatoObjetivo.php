<?php
class CandidatoObjetivo {
    private $cpf;
    private $idObjetivo;
    private $idCargo;
    private $nomeCargo;
    private $nivel;
    private $pretSal;

    function inserirObjetivo($cpf, $idObjetivo, $idCargo, $nomeCargo, $nivel, $pretSal) {
        $this->cpf = $cpf;
        $this->idObjetivo = $idObjetivo;
        $this->idCargo = $idCargo;
        $this->nomeCargo = $nomeCargo;
        $this->nivel = $nivel;
        $this->pretSal = $pretSal;
    }

    
    function getCpf() {
        return $this->cpf;
    }

    function getIdObjetivo() {
        return $this->idObjetivo;
    }

    function getIdCargo() {
        return $this->idCargo;
    }

    function getNomeCargo() {
        return $this->nomeCargo;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getPretSal() {
        return $this->pretSal;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setIdObjetivo($idObjetivo) {
        $this->idObjetivo = $idObjetivo;
    }

    function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    function setNomeCargo($nomeCargo){
        $this->nomeCargo = $nomeCargo;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setPretSal($pretSal) {
        $this->pretSal = $pretSal;
    }
}
