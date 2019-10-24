<?php
class ProcessoSeletivo {
    private $idProcesso;
    private $cnpj;
    private $idCargo;
    private $dataInicio;
    private $dataLimiteCandidatar;
    private $resumoVaga;
    private $nivelCargo;
    private $tipoContratacao;
    private $salario;

    function inserirProcessoSeletivo($idProcesso, $cnpj, $idCargo, $dataInicio, $dataLimiteCandidatar, $resumoVaga, $nivelCargo, $tipoContratacao, $salario) {
        $this->idProcesso = $idProcesso;
        $this->cnpj = $cnpj;
        $this->idCargo = $idCargo;
        $this->dataInicio = $dataInicio;
        $this->dataLimiteCandidatar = $dataLimiteCandidatar;
        $this->resumoVaga = $resumoVaga;
        $this->nivelCargo = $nivelCargo;
        $this->tipoContratacao = $tipoContratacao;
        $this->salario = $salario;
    }
    
    function getIdProcesso() {
        return $this->idProcesso;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function getIdCargo() {
        return $this->idCargo;
    }

    function getDataInicio() {
        return $this->dataInicio;
    }

    function getDataLimiteCandidatar() {
        return $this->dataLimiteCandidatar;
    }

    function getResumoVaga() {
        return $this->resumoVaga;
    }

    function getNivelCargo() {
        return $this->nivelCargo;
    }

    function getTipoContratacao() {
        return $this->tipoContratacao;
    }

    function getSalario() {
        return $this->salario;
    }

    function setIdProcesso($idProcesso) {
        $this->idProcesso = $idProcesso;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    function setDataLimiteCandidatar($dataLimiteCandidatar) {
        $this->dataLimiteCandidatar = $dataLimiteCandidatar;
    }

    function setResumoVaga($resumoVaga) {
        $this->resumoVaga = $resumoVaga;
    }

    function setNivelCargo($nivelCargo) {
        $this->nivelCargo = $nivelCargo;
    }

    function setTipoContratacao($tipoContratacao) {
        $this->tipoContratacao = $tipoContratacao;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }
    
    public function getUltimoRegistroProcesso() {

        return ProcessoSeletivoDAO::UltimoRegistroProcesso($this) + 1;
    }
}
