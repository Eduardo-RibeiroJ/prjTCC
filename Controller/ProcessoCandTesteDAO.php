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
    }
}

?>
