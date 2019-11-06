<?php

include_once "../Model/Conexao.php";

class ProcessoCandPerguntaDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(ProcessoCandPergunta $processoCandPergunta)
    {
        $idProcesso = $processoCandPergunta->getIdProcesso();
        $cpf = $processoCandPergunta->getCpf();
        $idPergunta = $processoCandPergunta->getIdPergunta();
        $resposta = $processoCandPergunta->getResposta();

        $query = "INSERT INTO tbProcessoCandPergunta (idProcesso, cpf, idPergunta, resposta) VALUES (?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'isis', $idProcesso, $cpf, $idPergunta, $resposta);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(ProcessoCandPergunta $processoCandPergunta) {
        
        $query = $this->db->getConection()->query("SELECT * FROM tbProcessoCandPergunta WHERE idPergunta ='". $processoCandPergunta->getIdPergunta()."' AND cpf ='" . $processoCandPergunta->getCpf(). "' AND idProcesso ='" . $processoCandPergunta->getIdProcesso() . "';");

        $reg = $query->fetch_array();

        $processoCandPergunta = new ProcessoCandPergunta();
        $processoCandPergunta->inserirProcCandPergunta(         
            $reg['idProcesso'],
            $reg['cpf'],
            $reg['idPergunta'],
            $reg['resposta']
        );

        return $processoCandPergunta;
    }
}

?>
