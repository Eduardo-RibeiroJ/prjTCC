<?php

include_once "../Controller/CandidatoCursoDAO.php";

class CandidatoCurso {
    private $cpf;
    private $idCurso;
    private $nomeCurso;
    private $nomeInstituicao;
    private $anoConclusao;
    private $cargaHoraria;

    function inserirCurso($cpf, $idCurso, $nomeCurso, $nomeInstituicao, $anoConclusao, $cargaHoraria) {
        $this->cpf = $cpf;
        $this->idCurso = $idCurso;
        $this->nomeCurso = $nomeCurso;
        $this->nomeInstituicao = $nomeInstituicao;
        $this->anoConclusao = $anoConclusao;
        $this->cargaHoraria = $cargaHoraria;
    }
    
    public function getUltimoRegistroCurso() {
        return CandidatoCursoDAO::UltimoRegistroCurso($this) + 1;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getIdCurso() {
        return $this->idCurso;
    }

    function getNomeCurso() {
        return $this->nomeCurso;
    }

    function getNomeInstituicao() {
        return $this->nomeInstituicao;
    }

    function getAnoConclusao() {
        return $this->anoConclusao;
    }

    function getCargaHoraria() {
        return $this->cargaHoraria;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }

    function setNomeCurso($nomeCurso) {
        $this->nomeCurso = $nomeCurso;
    }

    function setNomeInstituicao($nomeInstituicao) {
        $this->nomeInstituicao = $nomeInstituicao;
    }

    function setAnoConclusao($anoConclusao) {
        $this->anoConclusao = $anoConclusao;
    }

    function setCargaHoraria($cargaHoraria) {
        $this->cargaHoraria = $cargaHoraria;
    }
}
