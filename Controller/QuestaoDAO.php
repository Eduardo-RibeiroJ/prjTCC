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
        $altA = $questao->getAltA();
        $altB = $questao->getAltB();
        $altC = $questao->getAltC();
        $altD = $questao->getAltD();
        $tempo = $questao->getTempo();
        $resposta = $questao->getResposta();
        $idTesteOnline = $questao->getIdTesteOnline();
        $idQuestao = $questao->getIdQuestao();
        $questao = $questao->getQuestao();

        $query = "INSERT INTO tbQuestao (idTesteOnline, idQuestao, questao, altA, altB, altC, altD, resposta, tempo) VALUES (?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'iissssssi', $idTesteOnline, $idQuestao, $questao, $altA, $altB, $altC, $altD, $resposta, $tempo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Atualizar(Questao $questao) 
    { 
        $idTesteOnline = $questao->getIdTesteOnline();
        $idQuestao = $questao->getIdQuestao();
        $questao = $questao->getQuestao();
        $altA = $questao->getAltA();
        $altB = $questao->getAltB();
        $altC = $questao->getAltC();
        $altD = $questao->getAltD();
        $resposta = $questao->getResposta();
        $tempo = $questao->getTempo();

        $query = "UPDATE tbQuestao SET questao=?, altA=?, altB=?, altC=?, altD=?, resposta=?, tempo=?  WHERE idTesteOnline = ? AND idQuestao = ?";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'ssssssii', $questao, $altA, $altB, $altC, $altD, $resposta, $tempo, $idQuestao);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(Questao $questao) {

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbQuestao WHERE idTesteOnline = ? AND idQuestao = ?");
        $idTesteOnline = $questao->getIdTesteOnline();
        $idQuestao = $questao->getIdQuestao();

        $SQL->bind_param("ii", $idTesteOnline, $idQuestao);
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
