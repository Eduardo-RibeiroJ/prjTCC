<?php
class ProcessoPergunta {
    private $idProcesso;
    private $idPergunta;
    private $pergunta;

    function inserirProcessoPergunta($idProcesso, $idPergunta) {
        $this->idProcesso = $idProcesso;
        $this->idPergunta = $idPergunta;
    }
    
    function getIdProcesso() {
        return $this->idProcesso;
    }

    function getIdPergunta() {
        return $this->idPergunta;
    }

    function getPergunta() {
        return $this->pergunta;
    }

    function setIdProcesso($idProcesso) {
        $this->idProcesso = $idProcesso;
    }

    function setIdPergunta($idPergunta) {
        $this->idPergunta = $idPergunta;
    }

    function setPergunta($pergunta) {
        $this->pergunta = $pergunta;
    }
}
