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
        $idProcesso = $processoPergunta->getProcesso()->getIdProcesso();
        $idPergunta = $processoPergunta->getPergunta()->getIdPergunta();

        $query = "INSERT INTO tbProcessoPergunta (idProcesso, idPergunta) VALUES (?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'ii', $idProcesso, $idPergunta);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(ProcessoPergunta $processoPergunta) {

        $conn = new Conexao();

        $idProcesso = $processoPergunta->getProcesso()->getIdProcesso();
        
        $query = $this->db->getConection()->query("SELECT * FROM tbProcessoPergunta WHERE idProcesso ='". $idProcesso ."';");
        $arrayQuery = array();

        while($reg = $query->fetch_array()) {

            $processoPergunta = new ProcessoPergunta();
            $pergunta = new Pergunta();
            $perguntaDAO = new PerguntaDAO($conn);
            $processo = new ProcessoSeletivo();
            $processoDAO = new ProcessoSeletivoDAO($conn);

            $processo->setIdProcesso($idProcesso);
            $processoDAO->Listar($processo);

            $pergunta->setIdPergunta($reg['idPergunta']);
            $pergunta->setCnpj($processo->getCnpj());
            $perguntaDAO->Listar($pergunta);
            
            $processoPergunta->inserirProcessoPergunta(         
                $processo,
                $pergunta
            );

            $arrayQuery[] = $processoPergunta;
        }

        return $arrayQuery;

    }
}

?>
