<?php
class CandidatoObjetivo {
    private $cpf;
    private $idObjetivo;
    private $cargo;
    private $nivel;
    private $pretSal;

    function inserirObjetivo($cpf, $idObjetivo, $cargo, $nivel, $pretSal) {
        $this->cpf = $cpf;
        $this->idObjetivo = $idObjetivo;
        $this->cargo = $cargo;
        $this->nivel = $nivel;
        $this->pretSal = $pretSal;
    }

    
    function getCpf() {
        return $this->cpf;
    }

    function getIdObjetivo() {
        return $this->idObjetivo;
    }

    function getCargo() {
        return $this->cargo;
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

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setPretSal($pretSal) {
        $this->pretSal = $pretSal;
    }
}
