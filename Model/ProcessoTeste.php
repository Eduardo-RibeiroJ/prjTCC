<?php
class ProcessoTeste {
    private $idProcesso;
    private $idTesteOnline;
    
    function getIdProcesso() {
        return $this->idProcesso;
    }

    function getIdTesteOnline() {
        return $this->idTesteOnline;
    }

    function setIdProcesso($idProcesso) {
        $this->idProcesso = $idProcesso;
    }

    function setIdTesteOnline($idTesteOnline) {
        $this->idTesteOnline = $idTesteOnline;
    }
}
