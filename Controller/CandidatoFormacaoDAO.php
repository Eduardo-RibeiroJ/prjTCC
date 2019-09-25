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

    public function Apagar(Questao $questao) {


        $idTesteOnline = $questao->getIdTesteOnline();
        $idQuestao = $questao->getIdQuestao();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbQuestao WHERE idTesteOnline = ? AND idQuestao = ?;");

        $SQL->bind_param("ii", $idTesteOnline, $idQuestao);
        $SQL->execute();

        //Realocar os números das questões para não ficar "buraco"
        /*$SQL = $this->db->getConection()->prepare("UPDATE tbQuestao SET idQuestao = (idQuestao - 1) WHERE idQuestao > ? AND idTesteOnline = ?;");

        $SQL->bind_param("ii", $idQuestao, $idTesteOnline);
        $SQL->execute();*/
   
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

        public function UltimoRegistroFormacao(CandidatoFormacao $formacao) 
    {
        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idFormacao) as idFormacao FROM tbCandidatoFormacao WHERE cpf = '".$formacao->getCpf()."';");

        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        return $linha["idFormacao"];
    }

}

?>
