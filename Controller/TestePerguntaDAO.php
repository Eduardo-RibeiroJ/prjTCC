<?php

include_once "Model/Conexao.php";

class TestePerguntaDAO
{

    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(TestePergunta $testePergunta) 
    {
        $idTesteOnline = $testePergunta->getIdTesteOnline();
        $idPergunta = $testePergunta->getIdPergunta();
        $pergunta = $testePergunta->getPergunta();
        $altA = $testePergunta->getAltC();
        $altB = $testePergunta->getAltB();
        $altC = $testePergunta->getAltC();
        $altD = $testePergunta->getAltD();
        $resposta = $testePergunta->getResposta();
        $tempo = $testePergunta->getTempo();

        $query = "INSERT INTO tbPergunta (idTesteOnline, idPergunta, pergunta, altA, altB, altC, altD, resposta, tempo) VALUES (?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'iissssssi', $idTesteOnline, $idPergunta, $pergunta, $altA, $altB, $altC, $altD, $resposta, $tempo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Atualizar(TestePergunta $testePergunta) 
    { 
        $idTesteOnline = $testePergunta->getIdTesteOnline();
        $idPergunta = $testePergunta->getIdPergunta();
        $pergunta = $testePergunta->getPergunta();
        $altA = $testePergunta->getAltC();
        $altB = $testePergunta->getAltB();
        $altC = $testePergunta->getAltC();
        $altD = $testePergunta->getAltD();
        $resposta = $testePergunta->getResposta();
        $tempo = $testePergunta->getTempo();

        $query = "UPDATE tbProduto SET pergunta=?, altA=?, altB=?, altC=?, altD=?, resposta=?, tempo=?  WHERE idTesteOnline = ? AND idPergunta = ?";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'ssssssiii', $pergunta, $altA, $altB, $altC, $altD, $resposta, $tempo, $idTesteOnline, $idPergunta);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(TestePergunta $testePergunta) {

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbPergunta WHERE idTesteOnline = ? AND idPergunta = ?");
        $idTesteOnline = $testePergunta->getIdTesteOnline();
        $idPergunta = $testePergunta->getIdPergunta();

        $SQL->bind_param("ii", $idTesteOnline, $idPergunta);
        $SQL->execute();
        
        return true;
     }

    /*public function Listar(Produto $produto) {

        if ($produto->getIdProduto() == NULL) {

           $SQL = $this->db->getConection()->query("SELECT * FROM tbProduto");
           return $SQL;

        } else {

           $SQL = $this->db->getConection()->query("SELECT * FROM tbProduto WHERE idProduto ='".$produto->getIdProduto()."'");
           return $SQL;

        }
     }     */
}

?>
