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
        $cep = $recrutador->getCep();
        $estado = $recrutador->getEstado();
        $cidade = $recrutador->getCidade();
        $endereco = $recrutador->getEndereco();
        $bairro = $recrutador->getBairro();
        $tel1 = $recrutador->getTel1();
        $tel2 = $recrutador->getTel2();
        $linkedin = $recrutador->getLinkedin();
        $facebook = $recrutador->getFacebook();
        $siteEmpresa = $recrutador->getSiteEmpresa();

        $query = "INSERT INTO tbEmpresa (cnpj, nomeEmpresa, email, senha, 
                                            cep, estado, cidade,
                                            endereco, bairro, tel1, tel2,
                                            linkedin, facebook, siteEmpresa) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'isssssssssssss', $cnpj, $nomeEmpresa, $email, $senha,
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
        $cep = $recrutador->getCep();
        $estado = $recrutador->getEstado();
        $cidade = $recrutador->getCidade();
        $endereco = $recrutador->getEndereco();
        $bairro = $recrutador->getBairro();
        $tel1 = $recrutador->getTel1();
        $tel2 = $recrutador->getTel2();
        $linkedin = $recrutador->getLinkedin();
        $facebook = $recrutador->getFacebook();
        $siteEmpresa = $recrutador->getSiteEmpresa();

        $query = "UPDATE tbEmpresa SET nomeEmpresa = ?, email = ?, senha = ?, cep = ?, 
                                         estado = ?, cidade = ?, endereco = ?, bairro = ?,
                                         tel1 = ?, tel2 = ?, linkedin = ?, facebook = ?,
                                         siteEmpresa = ? WHERE cnpj = ?;";

        $stmt = mysqli_prepare($this->db->getConection(), $query);                                 
    
        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }
        
        mysqli_stmt_bind_param($stmt, 'sssssssssssssi', $nomeEmpresa, $email, $senha, $cep, 
                                                        $estado, $cidade, $endereco, $bairro, $tel1, $tel2,
                                                        $linkedin,$facebook,$siteEmpresa,$cnpj );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function Apagar(Recrutador $recrutador) {
		$cnpj = $recrutador->getCnpj();
        
        $SQL = $this->db->getConection()->prepare("DELETE FROM tbEmpresa WHERE cnpj = ?;");
        
        $SQL->bind_param("i", $cnpj);
        $SQL->execute();

        return true;
    }

    public function Listar(Recrutador $recrutador) {
        $query = $this->db->getConection()->query("SELECT * FROM tbEmpresa WHERE cnpj ='".$recrutador->getCnpj()."';");
           
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

        $sql = "SELECT * FROM tbEmpresa WHERE email='" . $recrutador->getEmail() . "' ;";

        $db = new Conexao();

        $dados = mysqli_query($db->getConection(), $sql);

        if (mysqli_num_rows($dados)) {

            $linha = mysqli_fetch_array($dados);

            if (Bcrypt::check($recrutador->getSenha(), $linha['senha'])) {

                $_SESSION['logado'] = 1;
                $_SESSION['nomeEmpresa'] = $linha['nome'];
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
