<?php

class Recrutador {
    private $cnpj;
    private $nomeEmpresa;
    private $email;
    private $senha;
    private $cep;
    private $estado;
    private $cidade;
    private $endereco;
    private $bairro;
    private $tel1;
    private $tel2;
    private $linkedin;
    private $facebook;
    private $siteEmpresa;

    function inserirUsuarioRecrutador($cnpj, $email, $senha)
    {
        $this->cnpj = $cnpj;
        $this->email = $email;
        $this->senha = $senha;
    }

    function inserirRecrutador($cnpj, $nomeEmpresa, $email, $senha, $cep, $estado, $cidade, $endereco, $bairro, $tel1, $tel2, $linkedin, $facebook, $siteEmpresa)
    {
        $this->cnpj = $cnpj;
        $this->nomeEmpresa = $nomeEmpresa;
        $this->email = $email;
        $this->senha = $senha;
        $this->cep = $cep;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->tel1 = $tel1;
        $this->tel2 = $tel2;
        $this->linkedin = $linkedin;
        $this->facebook = $facebook;
        $this->siteEmpresa = $siteEmpresa;
    }

    function alterarRecrutadorEndereco($cnpj, $nomeEmpresa, $cep, $estado, $cidade, $endereco, $bairro)
    {
        $this->cnpj = $cnpj;
        $this->nomeEmpresa = $nomeEmpresa;
        $this->cep = $cep;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
    }

    function alterarRecrutadorContato($cnpj, $tel1, $tel2, $linkedin, $facebook, $siteEmpresa)
    {
        $this->cnpj = $cnpj;
        $this->tel1 = $tel1;
        $this->tel2 = $tel2;
        $this->linkedin = $linkedin;
        $this->facebook = $facebook;
        $this->siteEmpresa = $siteEmpresa;
    }
    
    
    function getCnpj() {
        return $this->cnpj;
    }

    function getNomeEmpresa() {
        return $this->nomeEmpresa;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getCep() {
        return $this->cep;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getTel1() {
        return $this->tel1;
    }

    function getTel2() {
        return $this->tel2;
    }

    function getLinkedin() {
        return $this->linkedin;
    }

    function getFacebook() {
        return $this->facebook;
    }

    function getSiteEmpresa() {
        return $this->siteEmpresa;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setNomeEmpresa($nomeEmpresa) {
        $this->nomeEmpresa = $nomeEmpresa;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setTel1($tel1) {
        $this->tel1 = $tel1;
    }

    function setTel2($tel2) {
        $this->tel2 = $tel2;
    }

    function setLinkedin($linkedin) {
        $this->linkedin = $linkedin;
    }

    function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    function setSiteEmpresa($siteEmpresa) {
        $this->siteEmpresa = $siteEmpresa;
    }
}
