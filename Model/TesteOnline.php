<?php
include_once "../Controller/TesteOnlineDAO.php";
  
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

    public function setIdTesteOnline($idTesteOnline) {
        $this->idTesteOnline = $idTesteOnline;
    }

    public function getNomeTesteOnline() {
        return $this->nomeTesteOnline;
    }

    public function getUltimoRegistro() {

        return TesteOnlineDAO::UltimoRegistro() + 1;
    }

    public function getQuantidadeQuestoes() {

        return TesteOnlineDAO::QuantidadeQuestoes($this);
    }

    public function getUltimoRegistroQuestao() {

        return TesteOnlineDAO::UltimoRegistroQuestao($this) + 1;
    }
}

?>