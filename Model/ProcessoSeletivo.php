<?php
class ProcessoSeletivo {
    private $idProcesso;
    private $cnpj;
    private $idCargo;
    private $dataInicio;
    private $dataLimiteCandidatar;
    private $resumoVaga;
    private $tipoContratacao;
    private $salario;
    private $cargo;
    
    function inserirProcessoSeletivo($idProcesso, $cnpj, $idCargo, $dataInicio, $dataLimiteCandidatar, $resumoVaga, $tipoContratacao, $salario) {
        $this->idProcesso = $idProcesso;
        $this->cnpj = $cnpj;
        $this->idCargo = $idCargo;
        $this->dataInicio = $dataInicio;
        $this->dataLimiteCandidatar = $dataLimiteCandidatar;
        $this->resumoVaga = $resumoVaga;
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

    function getTipoContratacao() {
        return $this->tipoContratacao;
    }

    function getSalario() {
        return $this->salario;
    }

    function getCargo() {
        return $this->cargo;
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

    function setTipoContratacao($tipoContratacao) {
        $this->tipoContratacao = $tipoContratacao;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }
    
    public function getUltimoRegistroProcesso() {

        return ProcessoSeletivoDAO::UltimoRegistroProcesso($this) + 1;
    }
}
