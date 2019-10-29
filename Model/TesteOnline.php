<?php
include_once "../Controller/TesteOnlineDAO.php";
  
class TesteOnline {
  	
  	private $idTesteOnline;
  	private $cnpj;
    private $nomeTesteOnline;

    public function inserirTesteOnline ($idTesteOnline, $cnpj, $nomeTesteOnline) {
        $this->idTesteOnline = $idTesteOnline;
        $this->cnpj = $cnpj;
        $this->nomeTesteOnline = $nomeTesteOnline;
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

    public function getNomeTesteOnline() {
        return $this->nomeTesteOnline;
    }

    public function getUltimoRegistro(TesteOnline $testeOnline) {

        return TesteOnlineDAO::UltimoRegistro($testeOnline) + 1;
    }

    public function getQuantidadeQuestoes() {

        return TesteOnlineDAO::QuantidadeQuestoes($this);
    }

    public function getUltimoRegistroQuestao() {

        return TesteOnlineDAO::UltimoRegistroQuestao($this) + 1;
    }
}

?>