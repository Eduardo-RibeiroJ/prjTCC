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

    public function Alterar(Questao $questao)
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

        $query = "UPDATE tbQuestao SET questao=?, altA=?, altB=?, altC=?, altD=?, resposta=?, tempo=? WHERE idTesteOnline = ? AND idQuestao = ?;";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'ssssssiii', $questao, $altA, $altB, $altC, $altD, $resposta, $tempo, $idTesteOnline, $idQuestao);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(Questao $questao) {


        $idTesteOnline = $questao->getIdTesteOnline();
        $idQuestao = $questao->getIdQuestao();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbQuestao WHERE idTesteOnline = ? AND idQuestao = ?;");

        $SQL->bind_param("ii", $idTesteOnline, $idQuestao);
        $SQL->execute();

        //Realocar os números das questões para não ficar "buraco"
        $SQL = $this->db->getConection()->prepare("UPDATE tbQuestao SET idQuestao = (idQuestao - 1) WHERE idQuestao > ? AND idTesteOnline = ?;");

        $SQL->bind_param("ii", $idQuestao, $idTesteOnline);
        $SQL->execute();
   
        return true;
    }

    public function Listar(Questao $questao) {
        
        if ($questao->getIdQuestao() == NULL) {

            $query = $this->db->getConection()->query("SELECT * FROM tbQuestao WHERE idTesteOnline ='".$questao->getIdTesteOnline()."' ORDER BY idQuestao;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $questao = new Questao();
                $questao->inserirQuestao(
                    
                    $reg['idTesteOnline'],
                    $reg['idQuestao'],
                    $reg['questao'],
                    $reg['altA'],
                    $reg['altB'],
                    $reg['altC'],
                    $reg['altD'],
                    $reg['resposta'],
                    $reg['tempo']
                );

                $arrayQuery[] = $questao;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbQuestao WHERE idTesteOnline ='".$questao->getIdTesteOnline()."' AND idQuestao ='".$questao->getIdQuestao()."';");

            $reg = $query->fetch_array();
            $questao->inserirQuestao(
                    
                    $reg['idTesteOnline'],
                    $reg['idQuestao'],
                    $reg['questao'],
                    $reg['altA'],
                    $reg['altB'],
                    $reg['altC'],
                    $reg['altD'],
                    $reg['resposta'],
                    $reg['tempo']
            );
        }
    }
}

?>
