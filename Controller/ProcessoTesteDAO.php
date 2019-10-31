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
        $idProcesso = $processoTeste->getProcesso()->getIdProcesso();
        $idTeste = $processoTeste->getTesteOnline()->getIdTesteOnline();

        $query = "INSERT INTO tbProcessoTeste (idProcesso, idTesteOnline) VALUES (?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'ii', $idProcesso, $idTeste);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(ProcessoTeste $processoTeste) {

        $conn = new Conexao();

        $idProcesso = $processoTeste->getProcesso()->getIdProcesso();
        
        $query = $this->db->getConection()->query("SELECT * FROM tbProcessoTeste WHERE idProcesso ='". $idProcesso ."';");
        
        $arrayQuery = array();

        while($reg = $query->fetch_array()) {

            $processoTeste = new ProcessoTeste();
            $testeOnline = new TesteOnline();
            $testeOnlineDAO = new TesteOnlineDAO($conn);
            $processo = new ProcessoSeletivo();
            $processoDAO = new ProcessoSeletivoDAO($conn);

            $processo->setIdProcesso($reg['idProcesso']);
            $processoDAO->Listar($processo);

            $testeOnline->setIdTesteOnline($reg['idTesteOnline']);
            $testeOnline->setCnpj($processo->getCnpj());
            $testeOnlineDAO->Listar($testeOnline);
            
            $processoTeste->inserirProcessoTeste(
                $processo,
                $testeOnline
            );

            $arrayQuery[] = $processoTeste;
        }

        return $arrayQuery;

    }
}

?>
