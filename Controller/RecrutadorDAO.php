<?php

include_once "../Model/Conexao.php";

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
}

?>
