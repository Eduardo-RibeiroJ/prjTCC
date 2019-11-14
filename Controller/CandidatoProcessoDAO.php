<?php

include_once "../Model/Conexao.php";

class CandidatoProcessoDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(CandidatoProcesso $candidatoProcesso)
    {
        $cpf = $candidatoProcesso->getCpf();
        $idProcesso = $candidatoProcesso->getIdProcesso();

        $query = "INSERT INTO tbCandidatoProcesso (cpf, idProcesso) VALUES (?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'si', $cpf, $idProcesso);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(CandidatoProcesso $candidatoProcesso) {

        if($candidatoProcesso->getIdProcesso() != NULL && $candidatoProcesso->getCpf() != NULL) {
            $conn = new Conexao();
            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoProcesso WHERE idProcesso ='". $candidatoProcesso->getIdProcesso()."' AND cpf ='". $candidatoProcesso->getCpf()."' ORDER BY idProcesso DESC;");

            $reg = $query->fetch_array();
            $candidatoProcesso->setCpf($reg['cpf']);

            return $candidatoProcesso;

        }
        else if($candidatoProcesso->getIdProcesso() != NULL) {
            $conn = new Conexao();
            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoProcesso WHERE idProcesso ='". $candidatoProcesso->getIdProcesso()."' ORDER BY idProcesso DESC;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {
                $candidato = new Candidato();
                $candidatoDAO = new CandidatoDAO($conn);
                $candidato->setCpf($reg['cpf']);
                $candidatoDAO->Listar($candidato);

                $arrayQuery[] = $candidato;
            }
            return $arrayQuery;

        }
        else if($candidatoProcesso->getCpf() != NULL) {
            $conn = new Conexao();
            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoProcesso WHERE cpf ='". $candidatoProcesso->getCpf()."' ORDER BY idProcesso DESC;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {
                $processo = new ProcessoSeletivo();
                $processoDAO = new ProcessoSeletivoDAO($conn);
                $processo->setIdProcesso($reg['idProcesso']);
                $processoDAO->Listar($processo);

                $arrayQuery[] = $processo;
            }
            return $arrayQuery;

        }
    }

    public function ListarProcessosCandidato(CandidatoProcesso $candidatoProcesso) {

        if($candidatoProcesso->getCpf() != NULL) {
            $conn = new Conexao();
            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoProcesso WHERE cpf ='". $candidatoProcesso->getCpf()."' ORDER BY idProcesso DESC LIMIT 3;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {
                $processo = new ProcessoSeletivo();
                $processoDAO = new ProcessoSeletivoDAO($conn);
                $processo->setIdProcesso($reg['idProcesso']);
                $processoDAO->Listar($processo);

                $arrayQuery[] = $processo;
            }
            return $arrayQuery;

        }
    }

    public function quantCandidatos(CandidatoProcesso $candidatoProcesso) {

        $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoProcesso WHERE idProcesso ='". $candidatoProcesso->getIdProcesso()."';");

        return mysqli_num_rows($query);

    }
}

?>
