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
        
        $query = $this->db->getConection()->query("SELECT * FROM tbProcessoPergunta WHERE idProcesso ='".$processoPergunta->getIdProcesso()."';");
        $arrayQuery = array();

        while($reg = $query->fetch_array()) {

            $processoPergunta = new ProcessoPergunta();
            
            $processoPergunta->inserirProcessoPergunta(         
                $reg['idProcesso'],
                $reg['idPergunta']
            );
            $arrayQuery[] = $processoPergunta;
        }

        return $arrayQuery;

    }
}

?>
