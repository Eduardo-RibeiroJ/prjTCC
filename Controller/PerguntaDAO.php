<?php

include_once "../Model/Conexao.php";

class PerguntaDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(Pergunta $pergunta) 
    {
        $idPergunta = $pergunta->getIdPergunta();
        $pergunta = $pergunta->getPergunta();

        $query = "INSERT INTO tbPergunta (idPergunta, pergunta) VALUES (?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'is', $idPergunta, $pergunta);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Alterar(Pergunta $pergunta) 
    { 
        $idPergunta = $pergunta->getIdPergunta();

        $query = "UPDATE tbPergunta SET pergunta=? WHERE idPergunta = ?;";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'si', $pergunta, $idPergunta);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(Pergunta $pergunta) {

        $idPergunta = $pergunta->getIdPergunta();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbPergunta WHERE idPergunta = ?;");

        $SQL->bind_param($stmt, "i", $idPergunta);
        $SQL->execute();

        return true;
    }

    public function Listar(Pergunta $pergunta) {

          if ($pergunta->getIdPergunta() == NULL) {
        
            $query = $this->db->getConection()->query("SELECT * FROM tbPergunta WHERE idPergunta ='".$pergunta->getIdPergunta()."';");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $pergunta = new Pergunta();            
                $pergunta->InserirPergunta(
                            
                    $reg['idPergunta'],
                    $reg['pergunta']
        
                );

                $arrayQuery[] = $pergunta;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbPergunta WHERE idPergunta ='".$pergunta->getIdPergunta()."';");

            $reg = $query->fetch_array();
            $pergunta->InserirPergunta(
                    
                $reg['idPergunta'],
                $reg['pergunta']
            );
        }
    }


    public function UltimoRegistroPergunta(Pergunta $pergunta) {

        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idPergunta) as Pergunta FROM tbPergunta WHERE idPergunta = '".$pergunta->getIdPergunta()."';");

        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        return $linha["idPergunta"];
    }

}

?>
