<?php

include_once "../Model/Conexao.php";
include_once "../Criptografia/Bcrypt.php";

class CandidatoDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(Candidato $candidato) {
        $cpf = $candidato->getCpf();
        $nome = $candidato->getNome();
        $sobrenome = $candidato->getSobrenome();
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

        $query = "INSERT INTO tbCandidato (cpf, nome, sobrenome, sexo, dataNasc, 
                                            email, senha, estadoCivil,
                                            cep, estado, cidade, endereco,
                                            bairro, tel1, tel2, linkedin,
                                            facebook, sitePessoal) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        $senha_banco = Bcrypt::hash($senha);

        mysqli_stmt_bind_param($stmt, 'ssssssssssssssssss', $cpf, $nome, $sobrenome, $sexo, $dataNasc,
                                                            $email,$senha_banco, $estadoCivil,
                                                            $cep, $estado, $cidade, $endereco,
                                                            $bairro, $tel1, $tel2, $linkedin,
                                                            $facebook, $sitePessoal);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function Alterar(Candidato $candidato) { 
        $cpf = $candidato->getCpf();
        $nome = $candidato->getNome();
        $sobrenome = $candidato->getSobrenome();
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

        $query = "UPDATE tbCandidato SET nome = ?, sobrenome = ?, sexo = ?, dataNasc = ?, email = ?, 
                                         senha = ?, estadoCivil = ?, cep = ?, estado = ?,
                                         cidade = ?, endereco = ?, bairro = ?, tel1 = ?,
                                         tel2 = ?, linkedin = ?, facebook = ?, sitePessoal = ? WHERE cpf = ?;";

        $stmt = mysqli_prepare($this->db->getConection(), $query);
    
        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }
        
        mysqli_stmt_bind_param($stmt, 'ssssssssssssssssss', $nome, $sobrenome, $sexo, $dataNasc,
                                                            $email, $senha, $estadoCivil,
                                                            $cep, $estado, $cidade, $endereco,
                                                            $bairro, $tel1, $tel2, $linkedin,
                                                            $facebook, $sitePessoal, $cpf);
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
        $query = $this->db->getConection()->query("SELECT * FROM tbCandidato WHERE cpf ='".$candidato->getCpf()."';");
           
        $reg = $query->fetch_array();
        
        if($reg['estadoCivil'] == 'S') {
            $reg['estadoCivil'] = 'Solteiro(a)';
        } 
        else if($reg['estadoCivil'] == 'C') {
            $reg['estadoCivil'] = 'Casado(a)';
        } 
        else if($reg['estadoCivil'] == 'D') {
            $reg['estadoCivil'] = 'Divorciado(a)';
        } 
        else if($reg['estadoCivil'] == 'V') {
            $reg['estadoCivil'] = 'Viúvo(a)';
        }

        if($reg['sexo'] == 'M') {
            $reg['sexo'] = 'Masculino';
        } 
        else if($reg['sexo'] == 'F') {
            $reg['sexo'] = 'Feminino';
        }

        $candidato->inserirCandidato(
                $reg['cpf'],
                $reg['nome'],
                $reg['sobrenome'],
                $reg['sexo'],
                $reg['dataNasc'],
                $reg['email'],
                $reg['senha'],
                $reg['estadoCivil'],
                $reg['cep'],
                $reg['endereco'],
                $reg['bairro'],
                $reg['cidade'],
                $reg['estado'],
                $reg['tel1'],
                $reg['tel2'],
                $reg['linkedin'],
                $reg['facebook'],
                $reg['sitePessoal']
        );
    }

    public static function Logar(Candidato $candidato){        
    
        $sql = "SELECT * FROM tbCandidato WHERE email='".$candidato->getEmail()."' ;";

        $db = new Conexao();

        $dados = mysqli_query($db->getConection(), $sql);

        if(mysqli_num_rows($dados)){

            $linha=mysqli_fetch_array($dados);

            if(Bcrypt::check($candidato->getSenha(), $linha['senha'])){

                $_SESSION['logado'] = 1;
                $_SESSION['nomeCandidato'] = $linha['nome'];
                $_SESSION['cpf'] = $linha['cpf'];

                $response = 1; //Login deu certo
            }
            else {
                $response = 2; //Senha errada
            }
        }
        else {
            $response = 3; //Não existe o cadastro
        }
        return $response;
    }
}

?>
