<?php

include_once "../Model/Conexao.php";
include_once "../Criptografia/Bcrypt.php";

class RecrutadorDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(Recrutador $recrutador) {
        $cnpj = $recrutador->getCnpj();
        $nomeEmpresa = $recrutador->getNomeEmpresa();
        $email = $recrutador->getEmail();
        $senha = $recrutador->getSenha();
        $cep = preg_replace('/[^0-9]/', '', $recrutador->getCep());
        $estado = $recrutador->getEstado();
        $cidade = $recrutador->getCidade();
        $endereco = $recrutador->getEndereco();
        $bairro = $recrutador->getBairro();
        $tel1 = preg_replace('/[^0-9]/', '', $recrutador->getTel1());
        $tel2 = preg_replace('/[^0-9]/', '', $recrutador->getTel2());
        $linkedin = $recrutador->getLinkedin();
        $facebook = $recrutador->getFacebook();
        $siteEmpresa = $recrutador->getSiteEmpresa();

        $query = "INSERT INTO tbRecrutador (cnpj, nomeEmpresa, email, senha, 
                                            cep, estado, cidade,
                                            endereco, bairro, tel1, tel2,
                                            linkedin, facebook, siteEmpresa) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        $senha_banco = Bcrypt::hash($senha);

        mysqli_stmt_bind_param($stmt, 'ssssssssssssss', $cnpj, $nomeEmpresa, $email,$senha_banco,
                                                            $cep, $estado, $cidade,
                                                            $endereco, $bairro, $tel1, $tel2,
                                                            $linkedin, $facebook, $siteEmpresa);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function Alterar(Recrutador $recrutador) { 
        $cnpj = $recrutador->getCnpj();
        $nomeEmpresa = $recrutador->getNomeEmpresa();
        $email = $recrutador->getEmail();
        $senha = $recrutador->getSenha();
        $cep = preg_replace('/[^0-9]/', '', $recrutador->getCep());
        $estado = $recrutador->getEstado();
        $cidade = $recrutador->getCidade();
        $endereco = $recrutador->getEndereco();
        $bairro = $recrutador->getBairro();
        $tel1 = preg_replace('/[^0-9]/', '', $recrutador->getTel1());
        $tel2 = preg_replace('/[^0-9]/', '', $recrutador->getTel2());
        $linkedin = $recrutador->getLinkedin();
        $facebook = $recrutador->getFacebook();
        $siteEmpresa = $recrutador->getSiteEmpresa();

        $query = "UPDATE tbRecrutador SET nomeEmpresa = ?, email = ?, senha = ?, cep = ?, 
                                         estado = ?, cidade = ?, endereco = ?, bairro = ?,
                                         tel1 = ?, tel2 = ?, linkedin = ?, facebook = ?,
                                         siteEmpresa = ? WHERE cnpj = ?;";

        $stmt = mysqli_prepare($this->db->getConection(), $query);                                 
    
        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }
        
        mysqli_stmt_bind_param($stmt, 'ssssssssssssss', $nomeEmpresa, $email, $senha, $cep, 
                                                        $estado, $cidade, $endereco, $bairro, $tel1, $tel2,
                                                        $linkedin,$facebook,$siteEmpresa,$cnpj );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function Apagar(Recrutador $recrutador) {
        $cnpj = $recrutador->getCnpj();
        
        $SQL = $this->db->getConection()->prepare("DELETE FROM tbRecrutador WHERE cnpj = ?;");
        
        $SQL->bind_param("i", $cnpj);
        $SQL->execute();

        return true;
    }

    public function BuscarCnpj($recrutador, $email)
    {
        $sql = "SELECT * FROM tbCandidato C, tbRecrutador R WHERE cnpj = '$recrutador' OR R.email = '$email' OR C.email = '$email';";
        $db = new Conexao();
        $validacao = mysqli_query($db->getConection(), $sql);

        if (mysqli_num_rows($validacao) != 0)
            return true;
        else
            return mysqli_num_rows($validacao);
    }

    public function Listar(Recrutador $recrutador) {
        $query = $this->db->getConection()->query("SELECT * FROM tbRecrutador WHERE cnpj ='".$recrutador->getCnpj()."';");
           
        $reg = $query->fetch_array();
        $recrutador->inserirRecrutador(
                $reg['cnpj'],
                $reg['nomeEmpresa'],
                $reg['email'],
                $reg['senha'],
                $reg['cep'],
                $reg['estado'],
                $reg['cidade'],
                $reg['endereco'],
                $reg['bairro'],
                $reg['tel1'],
                $reg['tel2'],
                $reg['linkedin'],
                $reg['facebook'],
                $reg['siteEmpresa']
        );
    }

    public static function Logar(Recrutador $recrutador)
    {
        $sql = "SELECT * FROM tbRecrutador WHERE cnpj ='" . $recrutador->getCnpj() . "';";

        $db = new Conexao();

        $dados = mysqli_query($db->getConection(), $sql);

        if (mysqli_num_rows($dados)) {

            $linha = mysqli_fetch_array($dados);

            if (Bcrypt::check($recrutador->getSenha(), $linha['senha'])) {

                $_SESSION['logado'] = 2;
                $_SESSION['nomeEmpresa'] = $linha['nomeEmpresa'];
                $_SESSION['cnpj'] = $linha['cnpj'];

                $response = 1; //Login deu certo
            } else {
                $response = 2; //Senha errada
            }
        } else {
            $response = 3; //Não existe o cadastro
        }
        return $response;
    }

}

?>