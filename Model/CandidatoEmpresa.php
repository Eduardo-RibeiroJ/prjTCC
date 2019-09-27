<?php
class CandidatoEmpresa {
    private $cpf;
    private $idEmpresa;
    private $nomeEmpresa;
    private $cargo;
    private $dataInicio;
    private $dataSaida;
    private $atividades;

     function inserirEmpresa($cpf, $idEmpresa, $nomeEmpresa, $cargo, $dataInicio, $dataSaida, $atividades) {
        $this->cpf = $cpf;
        $this->idEmpresa = $idEmpresa;
        $this->nomeEmpresa = $nomeEmpresa;
        $this->cargo = $cargo;
        $this->dataInicio = $dataInicio;
        $this->dataSaida = $dataSaida;
        $this->tipo = $tipo;
        $this->atividades = $atividades;
    }

    
    function getCpf() {
        return $this->cpf;
    }

    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function getNomeEmpresa() {
        return $this->nomeEmpresa;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getDataInicio() {
        return $this->dataInicio;
    }

    function getDataSaida() {
        return $this->dataSaida;
    }

    function getAtividades() {
        return $this->atividades;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    function setNomeEmpresa($nomeEmpresa) {
        $this->nomeEmpresa = $nomeEmpresa;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    function setDataSaida($dataSaida) {
        $this->dataSaida = $dataSaida;
    }

    function setAtividades($atividades) {
        $this->atividades = $atividades;
    }
}
