<?php

include_once "../Model/Conexao.php";

class ProcessoTesteDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(ProcessoTeste $processoTeste)
    {
        $idProcesso = $processoTeste->getIdProcesso();
        $idTeste = $processoTeste->getIdTesteOnline();

        $query = "INSERT INTO tbProcessoTeste (idProcesso, idTesteOnline) VALUES (?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'ii', $idProcesso, $idTeste);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(ProcessoCompetencia $processoCompetencia) {
        
        $query = $this->db->getConection()->query("SELECT * FROM tbProcessoCompetencia WHERE cpf ='".$candCompetencia->getCpf()."' ORDER BY competencia asc;");
        $arrayQuery = array();

        while($reg = $query->fetch_array()) {

            $candCompetencia = new CandidatoCompetencia();
            
            $candCompetencia->InserirCompetencia(         
                $reg['cpf'],
                $reg['idCompetencia'],
                $reg['competencia'],
                $reg['nivel']
            );
            $arrayQuery[] = $candCompetencia;
        }

        return $arrayQuery;

    }
}

?>
