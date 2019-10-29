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
        $cnpj = $testeOnline->getCnpj();
        $nomeTesteOnline = $testeOnline->getNomeTesteOnline();

        $query = "INSERT INTO tbTesteOnline (idTesteOnline, cnpj, nomeTesteOnline) VALUES (?,?,?);"; 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'iss', $idTesteOnline, $cnpj, $nomeTesteOnline);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(TesteOnline $testeOnline) {

        if ($testeOnline->getIdTesteOnline() == NULL) {

            $query = $this->db->getConection()->query("SELECT * FROM tbTesteOnline WHERE cnpj = '".$testeOnline->getCnpj()."' ORDER BY idTesteOnline;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $testeOnline = new TesteOnline();
                $testeOnline->inserirTesteOnline(
                    $reg['idTesteOnline'],
                    $reg['cnpj'],
                    $reg['nomeTesteOnline']
                );

                $arrayQuery[] = $testeOnline;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbTesteOnline WHERE idTesteOnline = '".$testeOnline->getIdTesteOnline()."' AND cnpj = '".$testeOnline->getCnpj()."';");
           
            $reg = $query->fetch_array();
            $testeOnline->inserirTesteOnline(
                    $reg['idTesteOnline'],
                    $reg['cnpj'],
                    $reg['nomeTesteOnline']
            );
        }
     }

    public function Apagar(TesteOnline $testeOnline) {

        $idTesteOnline = $testeOnline->getIdTesteOnline();
        $cnpj = $testeOnline->getCnpj();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbTesteOnline WHERE idTesteOnline = ? AND cnpj = ?;");

        $SQL->bind_param("is", $idTesteOnline, $cnpj);
        $SQL->execute();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbQuestao WHERE idTesteOnline = ? AND cnpj = ?;");

        $SQL->bind_param("is", $idTesteOnline, $cnpj);
        $SQL->execute();
        
        return true;
    }


    public function UltimoRegistro(TesteOnline $testeOnline) 
    {
        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idTesteOnline) as idTesteOnline FROM tbTesteOnline WHERE cnpj = '".$testeOnline->getCnpj()."';");
        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        
        return $linha["idTesteOnline"];
    }

    public function UltimoRegistroQuestao(TesteOnline $testeOnline) 
    {
        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT * FROM tbQuestao WHERE idTesteOnline = '".$testeOnline->getIdTesteOnline()."' AND cnpj = '".$testeOnline->getCnpj()."';");
        
        return mysqli_num_rows($dados);
    }

    public function QuantidadeQuestoes(TesteOnline $testeOnline)
    {
        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT * FROM tbQuestao WHERE idTesteOnline = '".$testeOnline->getIdTesteOnline()."' AND cnpj = '".$testeOnline->getCnpj()."';");
        
        return mysqli_num_rows($dados);
    }
}

?>
