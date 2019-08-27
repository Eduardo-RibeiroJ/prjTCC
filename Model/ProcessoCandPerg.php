<?php
class ProcessoCandPerg {
    private $idProcesso;
    private $cpf;
    private $idPergunta;
    private $resposta;
    
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
