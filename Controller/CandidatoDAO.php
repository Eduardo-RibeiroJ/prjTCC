<?php

include_once "../Model/Conexao.php";

class CandidatoDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(Candidato $candidato) {
        $cpf = $candidato->getCpf();
        $nome = $candidato->getNome();
        $sexo = $candidato->getSexo();
        $dataNasc = $candidato->getDataNasc();
        $email = $candidato->getEmail();
        $senha = $candidato->getSenha();
        $estadoCivil = $candidato->getEstadoCivil();
        $cep = $candidato->getCep();
        $estado = $candidato->getEstado();
        $cidade = $candidato->getCidade();
        $endereco = $candidato->getEndereco();
        $bairro = $candidato->getBairro();
        $tel1 = $candidato->getTel1();
        $tel2 = $candidato->getTel2();
        $linkedin = $candidato->getLinkedin();
        $facebook = $candidato->getFacebook();
        $sitePessoal = $candidato->getSitePessoal();

        $query = "INSERT INTO tbCandidato (cpf, nome, sexo, dataNasc, 
                                            email, senha, estadoCivil,
                                            cep, estado, cidade, endereco,
                                            bairro, tel1, tel2, linkedin,
                                            facebook, sitePessoal) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'sssssssssssssssss', $cpf, $nome, $sexo, $dataNasc,
                                                            $email, $senha, $estadoCivil,
                                                            $cep, $estado, $cidade, $endereco,
                                                            $bairro, $tel1, $tel2, $linkedin,
                                                            $facebook, $sitePessoal);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function Alterar(Candidato $candidato) { 
        $cpf = $candidato->getCpf();
        $nome = $candidato->getNome();
        $sexo = $candidato->getSexo();
        $dataNasc = $candidato->getDataNasc();
        $email = $candidato->getEmail();
        $senha = $candidato->getSenha();
        $estadoCivil = $candidato->getEstadoCivil();
        $cep = $candidato->getCep();
        $estado = $candidato->getEstado();
        $cidade = $candidato->getCidade();
        $endereco = $candidato->getEndereco();
        $bairro = $candidato->getBairro();
        $tel1 = $candidato->getTel1();
        $tel2 = $candidato->getTel2();
        $linkedin = $candidato->getLinkedin();
        $facebook = $candidato->getFacebook();
        $sitePessoal = $candidato->getSitePessoal();

        $query = "UPDATE tbCandidato SET nome = ?, sexo = ?, dataNasc = ?, email = ?, 
                                         senha = ?, estadoCivil = ?, cep = ?, estado = ?,
                                         cidade = ?, endereco = ?, bairro = ?, tel1 = ?,
                                         tel2 = ?, linkedin = ?, facebook = ?, sitePessoal = ? WHERE cpf = ?;";

        $stmt = mysqli_prepare($this->db->getConection(), $query);                                 
    
        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }
        
        mysqli_stmt_bind_param($stmt, 'sssssssssssssssss', $cpf, $nome, $sexo, $dataNasc,
                                                            $email, $senha, $estadoCivil,
                                                            $cep, $estado, $cidade, $endereco,
                                                            $bairro, $tel1, $tel2, $linkedin,
                                                            $facebook, $sitePessoal);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function Apagar(Candidato $candidato) {
        $cpf = $candidato->getCpf();
        
        $SQL = $this->db->getConection()->prepare("DELETE FROM tbCandidato WHERE cpf = ?;");
        
        $SQL->bind_param("s", $cpf);
        $SQL->execute();

        return true;
    }

    public function Listar(Candidato $candidato) {
        $query = $this->db->getConection()->query("SELECT * FROM tbCandidato WHERE cpf ='".$cpf->getCpf()."';");
           
        $reg = $query->fetch_array();
        $candidato->inserirCandidato(
                $reg['cpf'],
                $reg['nome'],
                $reg['sexo'],
                $reg['dataNasc'],
                $reg['email'],
                $reg['senha'],
                $reg['estadoCivil'],
                $reg['cep'],
                $reg['estado'],
                $reg['cidade'],
                $reg['endereco'],
                $reg['bairro'],
                $reg['tel1'],
                $reg['tel2'],
                $reg['linkedin'],
                $reg['facebook'],
                $reg['sitePessoal']
        );
    }
}

?>