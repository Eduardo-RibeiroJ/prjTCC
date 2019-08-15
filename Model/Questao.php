<?php
  
class Questao {
  	
  	private $idTesteOnline;
    private $idQuestao;
    private $questao;
    private $altA;
    private $altB;
    private $altC;
    private $altD;
    private $resposta;
    private $tempo;
  

    public function inserirQuestao ($idTesteOnline, $idQuestao, $questao, $altA, $altB, $altC, $altD, $resposta, $tempo) {
        $this->idTesteOnline = $idTesteOnline;
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
}

?>