<?php

include_once "../Model/Conexao.php";

class RecrutadorDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(Recrutador $recrutador) {
        $cnpj = $cnpj->getCnpj();
        $nomeEmpresa = $nomeEmpresa->getNomeEmpresa();
        $email = $email->getEmail();
        $senha = $senha->getSenha();
        $cep = $cep->getCep();
        $estado = $estado->getEstado();
        $cidade = $cidade->getCidade();
        $endereco = $endereco->getEndereco();
        $bairro = $bairro->getBairro();
        $tel1 = $tel1->getTel1();
        $tel2 = $tel2->getTel2();
        $linkedin = $linkedin->getLinkedin();
        $facebook = $facebook->getFacebook();
        $siteEmpresa = $siteEmpresa->getSiteEmpresa();

        $query = "INSERT INTO tbRecrutador (cnpj, nomeEmpresa, email, senha, 
                                            cep, estado, cidade,
                                            endereco, bairro, tel1, tel2,
                                            linkedin, facebook, siteEmpresa) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'ssssssssssssss', $cnpj, $nomeEmpresa, $email, $senha,
                                                            $cep, $estado, $cidade,
                                                            $endereco, $bairro, $tel1, $tel2,
                                                            $linkedin, $facebook, $siteEmpresa);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function Alterar(Recrutador $recrutador) { 
        $cnpj = $cnpj->getCnpj();
        $nomeEmpresa = $nomeEmpresa->getNomeEmpresa();
        $email = $email->getEmail();
        $senha = $senha->getSenha();
        $cep = $cep->getCep();
        $estado = $estado->getEstado();
        $cidade = $cidade->getCidade();
        $endereco = $endereco->getEndereco();
        $bairro = $bairro->getBairro();
        $tel1 = $tel1->getTel1();
        $tel2 = $tel2->getTel2();
        $linkedin = $linkedin->getLinkedin();
        $facebook = $facebook->getFacebook();
        $siteEmpresa = $siteEmpresa->getSiteEmpresa();

        $query = "UPDATE tbRecrutador SET nomeEmpresa = ?, email = ?, senha = ?, cep = ?, 
                                         estado = ?, cidade = ?, endereco = ?, bairro = ?,
                                         tel1 = ?, tel2 = ?, linkedin = ?, facebook = ?,
                                         siteEmpresa = ? WHERE cnpj = ?;";

        $stmt = mysqli_prepare($this->db->getConection(), $query);                                 
    
        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }
        
        mysqli_stmt_bind_param($stmt, 'ssssssssssssss', $cnpj, $nomeEmpresa, $email, $senha,
                                                            $cep, $estado, $cidade,
                                                            $endereco, $bairro, $tel1, $tel2,
                                                            $linkedin, $facebook, $siteEmpresa);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function Apagar(Recrutador $recrutador) {
		$cnpj = $cnpj->getCnpj();
        
        $SQL = $this->db->getConection()->prepare("DELETE FROM tbRecrutador WHERE cnpj = ?;");
        
        $SQL->bind_param("s", $cnpj);
        $SQL->execute();

        return true;
    }

    public function Listar(Recrutador $recrutador) {
        $query = $this->db->getConection()->query("SELECT * FROM tbRecrutador WHERE cnpj ='".$cnpj->getCnpj()."';");
           
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
