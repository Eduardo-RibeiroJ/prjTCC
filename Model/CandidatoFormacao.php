<?php

include_once "../Controller/CandidatoFormacaoDAO.php";

class CandidatoFormacao {
    private $cpf;
    private $idFormacao;
    private $nomeCurso;
    private $nomeInstituicao;
    private $dataInicio;
    private $dataTermino;
    private $tipo;
    private $estado;
    

    function inserirFormacao($cpf, $idFormacao, $nomeCurso, $nomeInstituicao, $dataInicio, $dataTermino, $tipo, $estado) {
        $this->cpf = $cpf;
        $this->idFormacao = $idFormacao;
        $this->nomeCurso = $nomeCurso;
        $this->nomeInstituicao = $nomeInstituicao;
        $this->dataInicio = $dataInicio;
        $this->dataTermino = $dataTermino;
        $this->tipo = $tipo;
        $this->estado = $estado;
    }

    public function getUltimoRegistroFormacao() {
        return CandidatoFormacaoDAO::UltimoRegistroFormacao($this) + 1;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getIdFormacao() {
        return $this->idFormacao;
    }

    function getNomeCurso() {
        return $this->nomeCurso;
    }

    function getNomeInstituicao() {
        return $this->nomeInstituicao;
    }

    function getDataInicio() {
        return $this->dataInicio;
    }

    function getDataTermino() {
        return $this->dataTermino;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getEstado() {
        return $this->estado;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setIdFormacao($idFormacao) {
        $this->idFormacao = $idFormacao;
    }

    function setNomeCurso($nomeCurso) {
        $this->nomeCurso = $nomeCurso;
    }

    function setNomeInstituicao($nomeInstituicao) {
        $this->nomeInstituicao = $nomeInstituicao;
    }

    function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    function setDataTermino($dataTermino) {
        $this->dataTermino = $dataTermino;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
}
