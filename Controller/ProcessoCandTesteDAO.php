<?php

include_once "../Model/Conexao.php";

class ProcessoCandTesteDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(ProcessoCandTeste $processoCandTeste)
    {
        $idProcesso = $processoCandTeste->getIdProcesso();
        $cpf = $processoCandTeste->getCpf();
        $idTeste = $processoCandTeste->getIdTesteOnline();
        $resultado = $processoCandTeste->getResultado();

        $query = "INSERT INTO tbProcessoCandTeste (idProcesso, cpf, idTesteOnline, resultado) VALUES (?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'isii', $idProcesso, $cpf, $idTeste, $resultado);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(ProcessoCandTeste $processoCandTeste) {

        if($processoCandTeste->getIdTesteOnline() != NULL) {
        
            $query = $this->db->getConection()->query("SELECT * FROM tbProcessoCandTeste WHERE idTesteOnline ='". $processoCandTeste->getidTesteOnline()."' AND cpf ='" . $processoCandTeste->getCpf(). "' AND idProcesso ='" . $processoCandTeste->getIdProcesso() . "';");

            $reg = $query->fetch_array();

            $processoCandTeste = new ProcessoCandTeste();
            $processoCandTeste->inserirProcCandTeste(         
                $reg['idProcesso'],
                $reg['cpf'],
                $reg['idTesteOnline'],
                $reg['resultado']
            );

            return $processoCandTeste;
        } else {
            $query = $this->db->getConection()->query("SELECT * FROM tbProcessoCandTeste WHERE cpf ='" . $processoCandTeste->getCpf(). "' AND idProcesso ='" . $processoCandTeste->getIdProcesso() . "';");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $processoCandTeste = new ProcessoCandTeste();
                $processoCandTeste->inserirProcCandTeste(         
                    $reg['idProcesso'],
                    $reg['cpf'],
                    $reg['idTesteOnline'],
                    $reg['resultado']
                );
                $arrayQuery[] = $processoCandTeste;
            }
            return $arrayQuery;
        }
    }

    public function ListarResultado(ProcessoCandTeste $processoCandTeste, ProcessoSeletivo $processoSeletivo) {

        $query = $this->db->getConection()->query("SELECT ct.resultado, count(*) as quantQuestao FROM tbprocessocandteste as ct inner join tbquestao as tq ON ct.idTesteOnline = tq.idTesteOnline WHERE ct.idProcesso = '" . $processoCandTeste->getIdProcesso() . "' AND ct.cpf = '" . $processoCandTeste->getCpf(). "' AND ct.idTesteOnline = '". $processoCandTeste->getidTesteOnline()."' AND tq.Cnpj = '". $processoSeletivo->getCnpj()."';");

        $reg = $query->fetch_array();

        if($reg['resultado'] == 0) {
            return 0;
        }
        else {
            $porcentagem = (100 * floatval($reg['resultado'])) / floatval($reg['quantQuestao']);
            return $porcentagem;
        }
    }
}

?>
