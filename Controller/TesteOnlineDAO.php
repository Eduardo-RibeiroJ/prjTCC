<?php

include_once "../Model/Conexao.php";
include_once "../Model/TesteOnline.php";
include_once "../Controller/TesteOnlineDAO.php";

class TesteOnlineDAO
{
    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(TesteOnline $testeOnline) 
    {
        $idTesteOnline = $testeOnline->getIdTesteOnline();
        $nomeTesteOnline = $testeOnline->getNomeTesteOnline();

        $query = "INSERT INTO tbTesteOnline (idTesteOnline, nomeTesteOnline) VALUES (?,?);"; 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'is', $idTesteOnline, $nomeTesteOnline);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(TesteOnline $testeOnline) {

        if ($testeOnline->getIdTesteOnline() == NULL) {

            $query = $this->db->getConection()->query("SELECT * FROM tbTesteOnline ORDER BY idTesteOnline;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $testeOnline = new TesteOnline();
                $testeOnline->inserirTesteOnline(
                    $reg['idTesteOnline'],
                    $reg['nomeTesteOnline']
                );

                $arrayQuery[] = $testeOnline;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbTesteOnline WHERE idTesteOnline ='".$testeOnline->getIdTesteOnline()."';");
           
            $reg = $query->fetch_array();
            $testeOnline->inserirTesteOnline(
                    $reg['idTesteOnline'],
                    $reg['nomeTesteOnline']
            );
        }
     }

    public function Apagar(TesteOnline $testeOnline) {

        $idTesteOnline = $testeOnline->getIdTesteOnline();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbTesteOnline WHERE idTesteOnline = ?;");

        $SQL->bind_param("i", $idTesteOnline);
        $SQL->execute();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbQuestao WHERE idTesteOnline = ?;");

        $SQL->bind_param("i", $idTesteOnline);
        $SQL->execute();
        
        return true;
    }


    public function UltimoRegistro() 
    {
        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idTesteOnline) as idTesteOnline FROM tbTesteOnline;");
        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        
        return $linha["idTesteOnline"];
    }

    public function QuantidadeQuestoes(TesteOnline $testeOnline)
    {
        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT * FROM tbQuestao WHERE idTesteOnline = '".$testeOnline->getIdTesteOnline()."';");
        
        mysqli_num_rows($dados);
        
        return mysqli_num_rows ($dados);
    }
}

?>
