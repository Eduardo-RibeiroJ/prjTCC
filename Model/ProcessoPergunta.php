<?php
class ProcessoPergunta {
    private $idProcesso;
    private $idPergunta;

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

    function setIdProcesso($idProcesso) {
        $this->idProcesso = $idProcesso;
    }

    function setIdPergunta($idPergunta) {
        $this->idPergunta = $idPergunta;
    }
}
