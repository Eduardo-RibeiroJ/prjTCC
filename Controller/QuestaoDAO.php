<?php

include_once "../Model/Conexao.php";

class QuestaoDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(Questao $questao) 
    {
        $idTesteOnline = $questao->getIdTesteOnline();
        $idPergunta = $questao->getIdPergunta();
        $pergunta = $questao->getPergunta();
        $altA = $questao->getAltC();
        $altB = $questao->getAltB();
        $altC = $questao->getAltC();
        $altD = $questao->getAltD();
        $resposta = $questao->getResposta();
        $tempo = $questao->getTempo();

        $query = "INSERT INTO tbPergunta (idTesteOnline, idPergunta, pergunta, altA, altB, altC, altD, resposta, tempo) VALUES (?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'iissssssi', $idTesteOnline, $idPergunta, $pergunta, $altA, $altB, $altC, $altD, $resposta, $tempo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Atualizar(Questao $questao) 
    { 
        $idTesteOnline = $questao->getIdTesteOnline();
        $idPergunta = $questao->getIdPergunta();
        $pergunta = $questao->getPergunta();
        $altA = $questao->getAltC();
        $altB = $questao->getAltB();
        $altC = $questao->getAltC();
        $altD = $questao->getAltD();
        $resposta = $questao->getResposta();
        $tempo = $questao->getTempo();

        $query = "UPDATE tbProduto SET pergunta=?, altA=?, altB=?, altC=?, altD=?, resposta=?, tempo=?  WHERE idTesteOnline = ? AND idPergunta = ?";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'ssssssiii', $pergunta, $altA, $altB, $altC, $altD, $resposta, $tempo, $idTesteOnline, $idPergunta);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(Questao $questao) {

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbPergunta WHERE idTesteOnline = ? AND idPergunta = ?");
        $idTesteOnline = $questao->getIdTesteOnline();
        $idPergunta = $questao->getIdPergunta();

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
