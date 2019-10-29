<?php
class ProcessoCompetencia {
    private $idProcesso;
    private $idCompetencia;
    private $nivel;
    private $Competencia;

    function inserirProcessoCompetencia($idProcesso, $idCompetencia, $nivel) {
        $this->idProcesso = $idProcesso;
        $this->idCompetencia = $idCompetencia;
        $this->nivel = $nivel;
    }
    
    function getIdProcesso() {
        return $this->idProcesso;
    }

    function getIdCompetencia() {
        return $this->idCompetencia;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getCompetencia() {
        return $this->Competencia;
    }

    function setIdProcesso($idProcesso) {
        $this->idProcesso = $idProcesso;
    }

    function setIdCompetencia($idCompetencia) {
        $this->idCompetencia = $idCompetencia;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setCompetencia($competencia) {
        $this->Competencia = $competencia;
    }
}
