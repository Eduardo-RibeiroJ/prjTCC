<?php
class CandidatoProcesso {
    private $cpf;
    private $idProcesso;

    function inserirCandProcesso($cpf, $idProcesso) {
        $this->cpf = $cpf;
        $this->idProcesso = $idProcesso;
    }
    
    function getCpf() {
        return $this->cpf;
    }

    function getIdProcesso() {
        return $this->idProcesso;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setIdProcesso($idProcesso) {
        $this->idProcesso = $idProcesso;
    }
}
