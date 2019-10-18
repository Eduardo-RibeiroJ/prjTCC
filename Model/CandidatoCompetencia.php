<?php
class CandidatoCompetencia {
    private $cpf;
    private $idCompetencia;
    private $nivel;

    public function inserirCompetencia ($cpf, $idCompetencia, $competencia, $nivel) {
        $this->cpf = $cpf;
        $this->idCompetencia = $idCompetencia;
        $this->competencia = $competencia;
        $this->nivel = $nivel;
    }

    public function alterarCompetencia ($cpf, $idCompetencia, $nivel) {
        $this->cpf = $cpf;
        $this->idCompetencia = $idCompetencia;
        $this->nivel = $nivel;
    }
    
    function getCpf() {
        return $this->cpf;
    }

    function getIdCompetencia() {
        return $this->idCompetencia;
    }

    function getCompetencia() {
        return $this->competencia;
    }

    function getNivel() {
        return $this->nivel;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setIdCompetencia($idCompetencia) {
        $this->idCompetencia = $idCompetencia;
    }

    function setCompetencia($competencia) {
        $this->competencia = $competencia;
    }

    public function getUltimoRegistroComp() {

        return CandidatoCompetenciaDAO::UltimoRegistroComp($this) + 1;
    }

}
