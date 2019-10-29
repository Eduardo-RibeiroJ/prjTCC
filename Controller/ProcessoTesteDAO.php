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

    public function Listar(ProcessoTeste $processoTeste) {

        $conn = new Conexao();
        
        $query = $this->db->getConection()->query("SELECT * FROM tbProcessoTeste WHERE idProcesso ='". $processoTeste->getIdProcesso()."';");
        
        $arrayQuery = array();

        while($reg = $query->fetch_array()) {

            $processoTeste = new ProcessoTeste();
            $testeOnline = new TesteOnline();
            $testeOnlineDAO = new TesteOnlineDAO($conn);

            $testeOnline->setIdTesteOnline($reg['idTesteOnline']);
            $testeOnlineDAO->Listar($testeOnline);
            
            $processoTeste->inserirProcessoTeste(         
                $reg['idProcesso'],
                $reg['idTesteOnline']
            );
            $processoTeste->setTesteOnline($testeOnline);

            $arrayQuery[] = $processoTeste;
        }

        return $arrayQuery;

    }
}

?>
