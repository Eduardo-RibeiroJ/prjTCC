<?php
class Competencia {
    private $idComp;
    private $nomeComp;

    function inserirCompetencia($idComp, $nomeComp) {
        $this->idComp = $idComp;
        $this->nomeComp = $nomeComp;
    }
    
    function getIdComp() {
        return $this->idComp;
    }

    function getNomeComp() {
        return $this->nomeComp;
    }

    function setIdComp($idComp) {
        $this->idComp = $idComp;
    }

    function setNomeComp($nomeComp) {
        $this->nomeComp = $nomeComp;
    }

    function idRegistro() {
        return CompetenciaDAO::Registro($this);
    }
}
