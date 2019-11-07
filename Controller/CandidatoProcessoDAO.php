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

        if($candidatoProcesso->getIdProcesso() != NULL) {
            $conn = new Conexao();
            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoProcesso WHERE idProcesso ='". $candidatoProcesso->getIdProcesso()."';");
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
        if($candidatoProcesso->getCpf() != NULL) {
            $conn = new Conexao();
            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoProcesso WHERE cpf ='". $candidatoProcesso->getCpf()."';");
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
}

?>