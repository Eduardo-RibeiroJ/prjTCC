<?php
include_once "../Controller/PerguntaDAO.php";


class Pergunta {
    private $cnpj;
    private $idPergunta;
    private $pergunta;

    function inserirPergunta($cnpj, $idPergunta, $pergunta)
    {
        $this->cnpj = $cnpj;
        $this->idPergunta = $idPergunta;
        $this->pergunta = $pergunta;
    }
    
    function getCnpj(){
        return $this->cnpj;
    }
    
    function getIdPergunta() {
        return $this->idPergunta;
    }
    
    function getPergunta() {
        return $this->pergunta;
    }
    
    function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }
    
    function setIdPergunta($idPergunta) {
        $this->idPergunta = $idPergunta;
    }
    
    function setPergunta($pergunta) {
        $this->pergunta = $pergunta;
    }

    public function getUltimoRegistroPergunta() {
        return PerguntaDAO::UltimoRegistroPergunta($this) + 1;
    }
}
