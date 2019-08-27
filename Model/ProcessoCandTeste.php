<?php
class ProcessoCandTeste {
    private $idProcesso;
    private $cpf;
    private $idTesteOnline;
    private $resultado;
    
    function getIdProcesso() {
        return $this->idProcesso;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getIdTesteOnline() {
        return $this->idTesteOnline;
    }

    function getResultado() {
        return $this->resultado;
    }

    function setIdProcesso($idProcesso) {
        $this->idProcesso = $idProcesso;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setIdTesteOnline($idTesteOnline) {
        $this->idTesteOnline = $idTesteOnline;
    }

    function setResultado($resultado) {
        $this->resultado = $resultado;
    }
}
