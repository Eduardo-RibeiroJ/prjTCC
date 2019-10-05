<?php
include_once "../Controller/PerguntaDAO.php";


class Pergunta {
    private $idPergunta;
    private $pergunta;

    function inserirPergunta($idPergunta, $pergunta)
    {
        $this->idPergunta = $idPergunta;
        $this->pergunta = $pergunta;
    }

    public function getUltimoRegistroPergunta() {
        return PerguntaDAO::UltimoRegistroPergunta($this) + 1;
    }
    
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
