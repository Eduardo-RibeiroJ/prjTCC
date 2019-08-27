<?php
class CandidatoCompetencia {
    private $cpf;
    private $idCompetencia;
    private $nivel;
    
    function getCpf() {
        return $this->cpf;
    }

    function getIdCompetencia() {
        return $this->idCompetencia;
    }

    function getNivel() {
        return $this->nivel;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setIdCompetencia($idCompetencia) {
        $this->idCompetencia = $idCompetencia;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }
}
