<?php
class Pergunta {
    private $idPergunta;
    private $pergunta;
    
    function getIdPergunta() {
        return $this->idPergunta;
    }

    function getPergunta() {
        return $this->pergunta;
    }

    function setIdPergunta($idPergunta) {
        $this->idPergunta = $idPergunta;
    }

    function setPergunta($pergunta) {
        $this->pergunta = $pergunta;
    }
}
