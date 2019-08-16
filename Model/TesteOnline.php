<?php
  
class TesteOnline {
  	
  	private $idTesteOnline;
    private $nomeTesteOnline;

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
}

?>