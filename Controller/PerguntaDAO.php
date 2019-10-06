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

        mysqli_stmt_bind_param($stmt, 'iis', $cnpj, $idPergunta, $pergunta);
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
        
        mysqli_stmt_bind_param($stmt, 'sii', $pergunta, $idPergunta, $cnpj);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(Pergunta $pergunta) {

        $cnpj = $pergunta->getCnpj();
        $idPergunta = $pergunta->getIdPergunta();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbPergunta WHERE cnpj ='" . $pergunta->getCnpj()."' ORDER BY idPergunta desc;");

        $SQL->bind_param("ii", $cnpj, $idPergunta);
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
            $pergunta->InserirPergunta(

                $reg['cnpj'],
                $reg['idPergunta'],
                $reg['pergunta']
            );
        }
    }


    public function UltimoRegistroPergunta(Pergunta $pergunta) {

        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idPergunta) as Pergunta FROM tbPergunta WHERE cnpj = '".$pergunta->getCnpj()."';");

        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        return $linha["idPergunta"];
    }

}

?>
