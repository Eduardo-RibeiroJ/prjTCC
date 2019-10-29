<?php
class ProcessoTeste {
    private $idProcesso;
    private $idTesteOnline;
    private $testeOnline;

    function inserirProcessoTeste($idProcesso, $idTesteOnline) {
        $this->idProcesso = $idProcesso;
        $this->idTesteOnline = $idTesteOnline;
    }
    
    function getIdProcesso() {
        return $this->idProcesso;
    }

    function getIdTesteOnline() {
        return $this->idTesteOnline;
    }

    function getTesteOnline() {
        return $this->testeOnline;
    }

    function setIdProcesso($idProcesso) {
        $this->idProcesso = $idProcesso;
    }

    function setIdTesteOnline($idTesteOnline) {
        $this->idTesteOnline = $idTesteOnline;
    }

    function setTesteOnline($testeOnline) {
        $this->testeOnline = $testeOnline;
    }
}
