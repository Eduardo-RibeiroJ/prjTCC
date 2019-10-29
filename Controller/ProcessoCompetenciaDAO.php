<?php

include_once "../Model/Conexao.php";

class ProcessoCompetenciaDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(ProcessoCompetencia $processoCompetencia) 
    {
        $idProcesso = $processoCompetencia->getIdProcesso();
        $idCompetencia = $processoCompetencia->getIdCompetencia();
        $nivel = $processoCompetencia->getNivel();

        if($nivel == 'Básico')
            $nivel = 'B';
        else if($nivel == 'Intermediário')
            $nivel = 'I';
        else if($nivel == 'Avançado')
            $nivel = 'A';

        $query = "INSERT INTO tbProcessoCompetencia (idProcesso, idCompetencia, nivel) VALUES (?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'iis', $idProcesso, $idCompetencia, $nivel);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(ProcessoCompetencia $processoCompetencia) {

        $conn = new Conexao();
        
        $query = $this->db->getConection()->query("SELECT * FROM tbProcessoCompetencia WHERE idProcesso = '".$processoCompetencia->getIdProcesso()."';");
        
        $arrayQuery = array();

        while($reg = $query->fetch_array()) {

            $processoCompetencia = new ProcessoCompetencia();
            $competencia = new Competencia();
            $competenciaDAO = new CompetenciaDAO($conn);

            $competencia->setIdComp($reg['idCompetencia']);
            $competenciaDAO->Listar($competencia);

            if($reg['nivel'] == 'B')
                $reg['nivel'] = 'Básico';
            else if($reg['nivel'] == 'I')
                $reg['nivel'] = 'Intermediário';
            else if($reg['nivel'] == 'A')
                $reg['nivel'] = 'Avançado';
            
            $processoCompetencia->inserirProcessoCompetencia(         
                $reg['idProcesso'],
                $reg['idCompetencia'],
                $reg['nivel']
            );
            $processoCompetencia->setCompetencia($competencia);
            
            $arrayQuery[] = $processoCompetencia;
        }

        return $arrayQuery;
    }

    public function UltimoRegistroComp(CandidatoCompetencia $candCompetencia) {

        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idCompetencia) as idCompetencia FROM tbCandidatoCompetencia WHERE cpf = '".$candCompetencia->getCpf()."';");

        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        return $linha["idCompetencia"];
    }

}

?>
