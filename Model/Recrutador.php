<?php

class Recrutador
{
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
    private $cnpjValidar;

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

    function alterarRecrutadorEndereco($cnpj, $nomeEmpresa, $endereco, $cep, $estado, $cidade, $bairro)
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

    function validaCNPJ($cnpjValidar)
    {
        $this->cnpjValidar = $cnpjValidar;

        // Verifica se um número foi informado
        if (empty($cnpjValidar)) {
            return false;
        }

        // Elimina possivel mascara
        $cnpjValidar = preg_replace("/[^0-9]/", "", $cnpjValidar);
        $cnpjValidar = str_pad($cnpjValidar, 14, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cnpjValidar) != 14) {
            return false;
        }

        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if (
            $cnpjValidar == '00000000000000' ||
            $cnpjValidar == '11111111111111' ||
            $cnpjValidar == '22222222222222' ||
            $cnpjValidar == '33333333333333' ||
            $cnpjValidar == '44444444444444' ||
            $cnpjValidar == '55555555555555' ||
            $cnpjValidar == '66666666666666' ||
            $cnpjValidar == '77777777777777' ||
            $cnpjValidar == '88888888888888' ||
            $cnpjValidar == '99999999999999'
        ) {
            return false;

            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            $j = 5;
            $k = 6;
            $soma1 = "";
            $soma2 = "";

            for ($i = 0; $i < 13; $i++) {

                $j = $j == 1 ? 9 : $j;
                $k = $k == 1 ? 9 : $k;

                $soma2 += ($cnpjValidar{
                    $i} * $k);

                if ($i < 12) {
                    $soma1 += ($cnpjValidar{
                        $i} * $j);
                }

                $k--;
                $j--;
            }

            $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
            $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

            return (($cnpjValidar{
                12} == $digito1) and ($cnpjValidar{
                13} == $digito2));
        }
    }

    function getCnpj()
    {
        return $this->cnpj;
    }

    function getNomeEmpresa()
    {
        return $this->nomeEmpresa;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getSenha()
    {
        return $this->senha;
    }

    function getCep()
    {
        return $this->cep;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function getCidade()
    {
        return $this->cidade;
    }

    function getEndereco()
    {
        return $this->endereco;
    }

    function getBairro()
    {
        return $this->bairro;
    }

    function getTel1()
    {
        return $this->tel1;
    }

    function getTel2()
    {
        return $this->tel2;
    }

    function getLinkedin()
    {
        return $this->linkedin;
    }

    function getFacebook()
    {
        return $this->facebook;
    }

    function getSiteEmpresa()
    {
        return $this->siteEmpresa;
    }

    function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    function setNomeEmpresa($nomeEmpresa)
    {
        $this->nomeEmpresa = $nomeEmpresa;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setSenha($senha)
    {
        $this->senha = $senha;
    }

    function setCep($cep)
    {
        $this->cep = $cep;
    }

    function setEstado($estado)
    {
        $this->estado = $estado;
    }

    function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    function setTel1($tel1)
    {
        $this->tel1 = $tel1;
    }

    function setTel2($tel2)
    {
        $this->tel2 = $tel2;
    }

    function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
    }

    function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    function setSiteEmpresa($siteEmpresa)
    {
        $this->siteEmpresa = $siteEmpresa;
    }
}
