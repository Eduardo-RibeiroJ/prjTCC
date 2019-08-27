<?php
class Candidato {
    private $cpf;
    private $nome;
    private $sexo;
    private $dataNasc;
    private $email;
    private $senha;
    private $estadoCivil;
    private $cep;
    private $cidade;
    private $endereco;
    private $bairro;
    private $tel1;
    private $tel2;
    private $linkedin;
    private $facebook;
    private $sitePessoal;
    
    function getCpf() {
        return $this->cpf;
    }

    function getNome() {
        return $this->nome;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getDataNasc() {
        return $this->dataNasc;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getEstadoCivil() {
        return $this->estadoCivil;
    }

    function getCep() {
        return $this->cep;
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

    function getSitePessoal() {
        return $this->sitePessoal;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    function setCep($cep) {
        $this->cep = $cep;
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

    function setSitePessoal($sitePessoal) {
        $this->sitePessoal = $sitePessoal;
    }
}