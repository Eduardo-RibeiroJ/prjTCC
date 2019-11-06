<?php
class ProcessoCandPergunta {
    private $idProcesso;
    private $cpf;
    private $idPergunta;
    private $resposta;

    function inserirProcCandPerg($idProcesso, $cpf, $idPergunta, $resposta) {
        $this->idProcesso = $idProcesso;
        $this->cpf = $cpf;
        $this->idPergunta = $idPergunta;
        $this->resposta = $resposta;
    }
    
    function getIdProcesso() {
        return $this->idProcesso;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getIdPergunta() {
        return $this->idPergunta;
    }

    function getResposta() {
        return $this->resposta;
    }

    function setIdProcesso($idProcesso) {
        $this->idProcesso = $idProcesso;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setIdPergunta($idPergunta) {
        $this->idPergunta = $idPergunta;
    }

    function setResposta($resposta) {
        $this->resposta = $resposta;
    }
}
