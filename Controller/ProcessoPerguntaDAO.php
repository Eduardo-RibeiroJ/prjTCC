<?php

include_once "../Model/Conexao.php";

class ProcessoPerguntaDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(ProcessoPergunta $processoPergunta)
    {
        $idProcesso = $processoPergunta->getIdProcesso();
        $idPergunta = $processoPergunta->getIdPergunta();

        $query = "INSERT INTO tbProcessoPergunta (idProcesso, idPergunta) VALUES (?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'ii', $idProcesso, $idPergunta);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(ProcessoCompetencia $processoCompetencia) {
        
        $query = $this->db->getConection()->query("SELECT * FROM tbProcessoCompetencia WHERE cpf ='".$candCompetencia->getCpf()."' ORDER BY competencia asc;");
        $arrayQuery = array();

        while($reg = $query->fetch_array()) {

            $candCompetencia = new CandidatoCompetencia();
            
            $candCompetencia->InserirCompetencia(         
                $reg['cpf'],
                $reg['idCompetencia'],
                $reg['competencia'],
                $reg['nivel']
            );
            $arrayQuery[] = $candCompetencia;
        }

        return $arrayQuery;

    }
}

?>
