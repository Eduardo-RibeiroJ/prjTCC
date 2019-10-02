<?php

include_once "../Criptografia/Bcrypt.php";

class Candidato {
    private $cpf;
    private $nome;
    private $sobrenome;
    private $sexo;
    private $dataNasc;
    private $email;
    private $senha;
    private $estadoCivil;
    private $cep;
    private $estado;
    private $cidade;
    private $endereco;
    private $bairro;
    private $tel1;
    private $tel2;
    private $linkedin;
    private $facebook;
    private $sitePessoal;

    function inserirUsuarioCandidato($cpf, $email, $senha) {

        $senha_banco = Bcrypt::hash($senha);

        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha_banco;
    }

    function inserirCandidato($cpf, $nome, $sobrenome, $sexo, $dataNasc, $email, $senha, $estadoCivil, $cep, $endereco, $bairro, $cidade, $estado, $tel1, $tel2, $linkedin, $facebook, $sitePessoal) {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->sexo = $sexo;
        $this->dataNasc = $dataNasc;
        $this->email = $email;
        $this->senha = $senha;
        $this->estadoCivil = $estadoCivil;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->tel1 = $tel1;
        $this->tel2 = $tel2;
        $this->linkedin = $linkedin;
        $this->facebook = $facebook;
        $this->sitePessoal = $sitePessoal;
    }

    function alterarCandidatoDadosPessoais($cpf, $nome, $sobrenome, $dataNasc, $estadoCivil, $sexo) {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->dataNasc = $dataNasc;
        $this->estadoCivil = $estadoCivil;
        $this->sexo = $sexo;
    }

    function alterarCandidatoEndereco($cpf, $cep, $endereco, $bairro, $cidade, $estado) {
        $this->cpf = $cpf;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    function alterarCandidatoContato($cpf, $tel1, $tel2, $linkedin, $facebook, $sitePessoal) {
        $this->cpf = $cpf;
        $this->tel1 = $tel1;
        $this->tel2 = $tel2;
        $this->linkedin = $linkedin;
        $this->facebook = $facebook;
        $this->sitePessoal = $sitePessoal;
    }
    
    function getCpf() {
        return $this->cpf;
    }

    function getNome() {
        return $this->nome;
    }

    function getSobrenome() {
        return $this->sobrenome;
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

    function getSitePessoal() {
        return $this->sitePessoal;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
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

    function setSitePessoal($sitePessoal) {
        $this->sitePessoal = $sitePessoal;
    }
}