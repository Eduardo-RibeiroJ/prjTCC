<?php
class CandidatoCompetencia {
    private $cpf;
    private $idCompetencia;
    private $nivel;

    public function inserirCompetencia ($cpf, $idCompetencia, $nivel) {
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

    public function getUltimoRegistro() {

        return CandidatoCompetenciaDAO::UltimoRegistro() + 1;
    }

    public function getUltimoRegistroComp() {

        return CandidatoCompetenciaDAO::UltimoRegistroComp($this) + 1;
    }

}
