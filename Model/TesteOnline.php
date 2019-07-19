<?php
  
class TesteOnline {
  	
  	private $idTesteOnline;
    private $nomeTesteOnline;
    private $arrayQuestoes = array();

    public function inserirTesteOnline ($idTesteOnline, $nomeTesteOnline) {
        $this->idTesteOnline = $idTesteOnline;
        $this->nomeTesteOnline = $nomeTesteOnline;
    }

    public function getIdTesteOnline() {
        return $this->idTesteOnline;
    }
    public function getNomeTesteOnline() {
        return $this->nomeTesteOnline;
    }

    public function addQuestao($questao) {
        $this->arrayQuestoes[] = $questao;
        echo count($this->arrayQuestoes);
    }
}

?>