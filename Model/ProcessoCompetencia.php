<?php
class ProcessoCompetencia {
    private $idProcesso;
    private $idCompetencia;
    private $nivel;
    
    function getIdProcesso() {
        return $this->idProcesso;
    }

    function getIdCompetencia() {
        return $this->idCompetencia;
    }

    function getNivel() {
        return $this->nivel;
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
}
