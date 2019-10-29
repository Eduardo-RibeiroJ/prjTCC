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
        
        $query = $this->db->getConection()->query("SELECT * FROM tbProcessoTeste WHERE idProcesso ='". $processoTeste->getIdProcesso()."';");
        
        $arrayQuery = array();

        while($reg = $query->fetch_array()) {

            $processoTeste = new ProcessoTeste();

            $processoTeste->inserirProcessoTeste(         
                $reg['idProcesso'],
                $reg['idTesteOnline']
            );
            $arrayQuery[] = $processoTeste;
        }

        return $arrayQuery;

    }
}

?>
