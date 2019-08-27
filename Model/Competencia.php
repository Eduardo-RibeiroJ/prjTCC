<?php
class Competencia {
    private $idComp;
    private $nomeComp;
    
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
}
