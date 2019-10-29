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

    public function Listar(ProcessoPergunta $processoPergunta) {

        $conn = new Conexao();
        
        $query = $this->db->getConection()->query("SELECT * FROM tbProcessoPergunta WHERE idProcesso ='".$processoPergunta->getIdProcesso()."';");
        $arrayQuery = array();

        while($reg = $query->fetch_array()) {

            $processoPergunta = new ProcessoPergunta();
            $pergunta = new Pergunta();
            $perguntaDAO = new PerguntaDAO($conn);

            $pergunta->setIdPergunta($reg['idPergunta']);
            $perguntaDAO->Listar($pergunta);
            
            $processoPergunta->inserirProcessoPergunta(         
                $reg['idProcesso'],
                $reg['idPergunta']
            );
            $processoPergunta->setPergunta($pergunta);

            $arrayQuery[] = $processoPergunta;
        }

        return $arrayQuery;

    }
}

?>
