<?php
class CandidatoObjetivo {
    private $cpf;
    private $idObjetivo;
    private $idCargo;
    private $nivel;
    private $pretSal;
    private $cargo;


    function inserirObjetivo($cpf, $idObjetivo, $idCargo, $nivel, $pretSal) {
        $this->cpf = $cpf;
        $this->idObjetivo = $idObjetivo;
        $this->idCargo = $idCargo;
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

    function getNivel() {
        return $this->nivel;
    }

    function getPretSal() {
        return $this->pretSal;
    }

    function getCargo(){
        return $this->cargo;
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

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setPretSal($pretSal) {
        $this->pretSal = $pretSal;
    }

    function setCargo($cargo){
        $this->cargo = $cargo;
    }
}
