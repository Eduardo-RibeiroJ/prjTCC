<?php

include_once "../Model/Conexao.php";

class CandidatoFormacaoDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(CandidatoFormacao $formacao) 
    {
        $cpf = $formacao->getCpf();
        $idFormacao = $formacao->getIdFormacao();
        $nomeCurso = $formacao->getNomeCurso();
        $nomeInstituicao = $formacao->getNomeInstituicao();
        $dataInicio = $formacao->getDataInicio();
        $dataTermino = $formacao->getDataTermino();
        $tipo = $formacao->getTipo();
        $estado = $formacao->getEstado();

        $query = "INSERT INTO tbCandidatoFormacao (cpf, idFormacao, nomeCurso, nomeInstituicao, dataInicio, dataTermino, tipo, estado) VALUES (?,?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'sissssss', $cpf, $idFormacao, $nomeCurso, $nomeInstituicao, $dataInicio, $dataTermino, $tipo, $estado);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Alterar(CandidatoFormacao $formacao)    { 
        $cpf = $formacao->getCpf();
        $idFormacao = $formacao->getIdFormacao();
        $nomeCurso = $formacao->getNomeCurso();
        $nomeInstituicao = $formacao->getNomeInstituicao();
        $dataInicio = $formacao->getDataInicio();
        $dataTermino = $formacao->getDataTermino();
        $tipo = $formacao->getTipo();
        $estado = $formacao->getEstado();

        $query = "UPDATE tbCandidatoFormacao SET nomeCurso=?, nomeInstituicao=?, dataInicio=?, dataTermino=?, tipo=?, estado=? WHERE cpf = ? AND idFormacao = ?;";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'sssssssi', $nomeCurso, $nomeInstituicao, $dataInicio, $dataTermino, $tipo, $estado, $cpf, $idFormacao);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(CandidatoFormacao $formacao) {


        $idFormacao = $formacao->getIdFormacao();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbCandidatoFormacao WHERE idFormacao = ? ;");

        $SQL->bind_param("i", $idFormacao);
        $SQL->execute();

        //Realocar os números das questões para não ficar "buraco"
        /*$SQL = $this->db->getConection()->prepare("UPDATE tbQuestao SET idQuestao = (idQuestao - 1) WHERE idQuestao > ? AND idTesteOnline = ?;");

        $SQL->bind_param("ii", $idQuestao, $idTesteOnline);
        $SQL->execute();*/
   
        return true;
    }

    public function Listar(CandidatoFormacao $formacao) {
        
        if ($formacao->getIdFormacao() == NULL) {

            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoFormacao WHERE cpf ='".$formacao->getCpf()."' ORDER BY dataTermino desc;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $formacao = new CandidatoFormacao();
                $formacao->inserirFormacao(
                    
                    $reg['cpf'],
                    $reg['idFormacao'],
                    $reg['nomeCurso'],
                    $reg['nomeInstituicao'],
                    $reg['dataInicio'],
                    $reg['dataTermino'],
                    $reg['tipo'],
                    $reg['estado']
                );

                $arrayQuery[] = $formacao;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoFormacao WHERE idFormacao ='".$formacao->getIdFormacao()."' AND idFormacao ='".$formacao->getIdFormacao()."';");

            $reg = $query->fetch_array();
            $formacao->inserirFormacao(
                    
                    $reg['cpf'],
                    $reg['idFormacao'],
                    $reg['nomeCurso'],
                    $reg['nomeInstituicao'],
                    $reg['dataInicio'],
                    $reg['dataTermino'],
                    $reg['tipo'],
                    $reg['estado']
            );
            return $formacao;
        }
    }

        public function UltimoRegistroFormacao(CandidatoFormacao $formacao) 
    {
        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idFormacao) as idFormacao FROM tbCandidatoFormacao WHERE cpf = '".$formacao->getCpf()."';");

        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        return $linha["idFormacao"];
    }

}

?>
