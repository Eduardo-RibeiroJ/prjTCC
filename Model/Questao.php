<?php
  
class Questao {
  	
  	private $idTesteOnline;
  	private $cnpj;
    private $idQuestao;
    private $questao;
    private $altA;
    private $altB;
    private $altC;
    private $altD;
    private $resposta;
    private $tempo;
  

    public function inserirQuestao ($idTesteOnline, $cnpj, $idQuestao, $questao, $altA, $altB, $altC, $altD, $resposta, $tempo) {
        $this->idTesteOnline = $idTesteOnline;
        $this->cnpj = $cnpj;
        $this->idQuestao = $idQuestao;
        $this->questao = $questao;
        $this->altA = $altA;
        $this->altB = $altB;
        $this->altC = $altC;
        $this->altD = $altD;
        $this->resposta = $resposta;
        $this->tempo = $tempo;
    }

    public function getIdTesteOnline() {
        return $this->idTesteOnline;
    }
    public function setIdTesteOnline($idTesteOnline) {
        $this->idTesteOnline = $idTesteOnline;
    }

    public function getCnpj() {
        return $this->cnpj;
    }
    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function getIdQuestao() {
        return $this->idQuestao;
    }
    public function setIdQuestao($idQuestao) {
        $this->idQuestao = $idQuestao;
    }

    public function getQuestao() {
        return $this->questao;
    }
    public function setQuestao($questao) {
        $this->questao = $questao;
    }

    public function getAltA() {
        return $this->altA;
    }
    public function setAltA($altA) {
        $this->altA = $altA;
    }
    
    public function getAltB() {
        return $this->altB;
    }
    public function setAltB($altB) {
        $this->altB = $altB;
    }
    
    public function getAltC() {
        return $this->altC;
    }
    public function setAltC($altC) {
        $this->altC = $altC;
    }
    
    public function getAltD() {
        return $this->altD;
    }
    public function setAltD($altD) {
        $this->altD = $altD;
    }
    
    public function getResposta() {
        return $this->resposta;
    }
    public function setResposta($resposta) {
        $this->resposta = $resposta;
    }
    
    public function getTempo() {
        return $this->tempo;
    }
    public function setTempo($tempo) {
        $this->tempo = $tempo;
    }

    public function getRespostaCorreta() {
        if($this->resposta == "A")
            return $this->altA;
        else if ($this->resposta == "B")
            return $this->altB;
        else if ($this->resposta == "C")
            return $this->altC;
        else if ($this->resposta == "D")
            return $this->altD;
    }

    
}

?>