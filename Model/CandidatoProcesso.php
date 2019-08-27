<?php
class CandidatoProcesso {
    private $cpf;
    private $idProcesso;
    
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
