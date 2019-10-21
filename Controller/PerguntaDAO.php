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
        $cnpj = $pergunta->getCnpj();
        $idPergunta = $pergunta->getIdPergunta();
        $pergunta = $pergunta->getPergunta();

        $query = "INSERT INTO tbPergunta (cnpj, idPergunta, pergunta) VALUES (?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'sis', $cnpj, $idPergunta, $pergunta);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Alterar(Pergunta $pergunta) {

        $cnpj = $pergunta->getCnpj();
        $idPergunta = $pergunta->getIdPergunta();
        $pergunta = $pergunta->getPergunta();

        $query = "UPDATE tbPergunta SET pergunta=? WHERE idPergunta = ? AND cnpj = ?;";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'sis', $pergunta, $idPergunta, $cnpj);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(Pergunta $pergunta) {

        $cnpj = $pergunta->getCnpj();
        $idPergunta = $pergunta->getIdPergunta();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbPergunta WHERE cnpj = ? AND idPergunta = ? ;");

        $SQL->bind_param("si", $cnpj, $idPergunta);
        $SQL->execute();

        return true;
    }

    public function Listar(Pergunta $pergunta) {

          if ($pergunta->getIdPergunta() == NULL) {
        
            $query = $this->db->getConection()->query("SELECT * FROM tbPergunta WHERE cnpj ='".$pergunta->getCnpj()."';");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $pergunta = new Pergunta();            
                $pergunta->inserirPergunta(
                    
                    $reg['cnpj'],
                    $reg['idPergunta'],
                    $reg['pergunta']
        
                );

                $arrayQuery[] = $pergunta;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbPergunta WHERE idPergunta ='".$pergunta->getIdPergunta(). "' AND idPergunta ='".$pergunta->getIdPergunta()."';");

            $reg = $query->fetch_array();
            $pergunta->inserirPergunta(

                $reg['cnpj'],
                $reg['idPergunta'],
                $reg['pergunta']
            );

            return $pergunta;
        }
    }

    public function UltimoRegistroPergunta(Pergunta $pergunta) {

        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idPergunta) as idPergunta FROM tbPergunta WHERE cnpj = '".$pergunta->getCnpj()."';");

        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        return $linha["idPergunta"];
    }

}

?>