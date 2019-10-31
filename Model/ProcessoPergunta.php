<?php
class ProcessoPergunta {
    private $processo;
    private $pergunta;

    function inserirProcessoPergunta($processo, $pergunta) {
        $this->processo = $processo;
        $this->pergunta = $pergunta;
    }
    
    function getProcesso() {
        return $this->processo;
    }

    function getPergunta() {
        return $this->pergunta;
    }

    function setProcesso($processo) {
        $this->processo = $processo;
    }

    function setPergunta($pergunta) {
        $this->pergunta = $pergunta;
    }
}
